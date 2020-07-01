<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー登録</title>
    </head>
    <body>
        <h2>入力確認</h2>
        {{ Form::open(['method' => 'post', 'action' => 'User\RegisterController@store']) }}
            名前：{{ $name }}
            {{ Form::hidden('name', $name) }}
            <br>
            生年月日：{{ $birth_date }}
            {{ Form::hidden('birth_date', $birth_date) }}
            <br>
            <button onClick="history.back()">戻る</button>
            {{ Form::submit('登録') }}
        {{ Form::close() }}
    </body>
</html>
