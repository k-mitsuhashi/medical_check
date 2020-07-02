<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>受診記録登録</title>
    </head>
    <body>
        <h2>入力確認</h2>
        {{ Form::open(['method' => 'post', 'action' => ['User\RecordController@store', 'id' => $id]]) }}
            受診日：{{ $date }}
            {{ Form::hidden('date', $date) }}
            <br>
            受診コース：{{ config('const.course')[$course] }}
            {{ Form::hidden('course', $course) }}
            <br>
            受診場所：{{ $place }}
            {{ Form::hidden('place', $place) }}
            <br>
            <button onClick="history.back()">戻る</button>
            {{ Form::submit('登録') }}
        {{ Form::close() }}
    </body>
</html>
