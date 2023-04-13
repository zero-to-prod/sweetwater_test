<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class WelcomeController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $comments = collect(DB::select(
            <<<SQL
                SELECT
                    orderid,
                    comments,
                    CASE
                        WHEN comments like '%candy%' THEN 'candy'
                        WHEN comments like '%honey%' THEN 'candy'
                        WHEN comments like '%smarties%' THEN 'candy'
                        WHEN comments like '%taffy%' THEN 'candy'
                        WHEN comments like '%call%' THEN 'call'
                        WHEN comments like '%refer%' THEN 'refer'
                        WHEN comments like '%signature%' THEN 'signature'
                    END as type
                FROM
                    sweetwater_test;
                SQL
        ));

        return view('welcome')->with('comments', $comments);
    }
}
