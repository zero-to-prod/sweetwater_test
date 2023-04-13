<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web Programmer Test Project</title>
</head>
<body>
<h1>Web Programmer Test Project</h1>
<h2>Candy</h2>
<table>
    <tr>
        <th>Comment</th>
    </tr>
    @foreach($comments->filter(fn($comment) => $comment->type === 'candy') as $comment)
        <tr>
            <td>{{$comment->comments}}</td>
        </tr>
    @endforeach
</table>

<h2>Call</h2>
<table>
    <tr>
        <th>Comment</th>
    </tr>
    @foreach($comments->filter(fn($comment) => $comment->type === 'call') as $comment)
        <tr>
            <td>{{$comment->comments}}</td>
        </tr>
    @endforeach
</table>
<h2>Refer</h2>
<table>
    <tr>
        <th>Comment</th>
    </tr>
    @foreach($comments->filter(fn($comment) => $comment->type === 'refer') as $comment)
        <tr>
            <td>{{$comment->comments}}</td>
        </tr>
    @endforeach
</table>
<h2>Signature</h2>
<table>
    <tr>
        <th>Comment</th>
    </tr>
    @foreach($comments->filter(fn($comment) => $comment->type === 'signature') as $comment)
        <tr>
            <td>{{$comment->comments}}</td>
        </tr>
    @endforeach
</table>
<h2>Other</h2>
<table>
    <tr>
        <th>Comment</th>
    </tr>
    @foreach($comments->filter(fn($comment) => $comment->type === null) as $comment)
        <tr>
            <td>{{$comment->comments}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
