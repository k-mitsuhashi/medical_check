<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー登録</title>
    </head>
    <body>
        <h2>ユーザー登録</h2>
    @if(session()->has('user'))
        <p>登録完了
        <br>
        ユーザーID：{{ session('user')['id'] }}
        <br>
        名前：{{ session('user')['name'] }}
        <br>
        生年月日：{{ session('user')['birth_date'] }}
        </p>
    @endif
    @if ($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
        {{ Form::open(['method' => 'post', 'action' => 'User\RegisterController@confirm']) }}
            名前：{{ Form::text('name', old('name'), ['required']) }}
            <br>
            生年月日：{{ Form::date('birth_date', old('birth_date'), ['required', 'max' => date('Y-m-d')]) }}
            <br>
            {{ Form::submit('確認') }}
        {{ Form::close() }}
    </body>
</html>
