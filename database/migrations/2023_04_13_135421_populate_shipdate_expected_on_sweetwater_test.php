<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        /**
         * Updates `sweetwater_test.shipdate_expected` based on the 'Expected Ship Date:' in the comments column.
         * Chunking is used to avoid memory issues
         */
        DB::table('sweetwater_test')->select("*")->chunkById(100, function ($results) {
            $pattern = '/Expected Ship Date:\s*(\d{2}\/\d{2}\/\d{2})/';
            $bulkUpdate = null;

            /* Concatenate multiple UPDATE statements to improve performance. */
            foreach ($results as $result) {
                if (preg_match($pattern, $result->comments, $matches)) {
                    $id = $result->orderid;
                    $bulkUpdate .= <<<SQL
                        UPDATE sweetwater_test
                        SET
                            shipdate_expected = '$matches[1]'
                        WHERE orderid = $id;\n
                    SQL;
                }
            }

            /* Execute the UPDATE statements. */
            if ($bulkUpdate !== null) {
                DB::transaction(static function () use ($bulkUpdate) {
                    DB::unprepared($bulkUpdate);
                });
            }
        }, column: 'orderid');
    }
};
