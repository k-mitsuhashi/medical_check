<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>受診記録登録</title>
    </head>
    <body>
        <h2>受診記録登録</h2>
    @if(session()->has('record'))
        <p>登録完了
        <br>
        受診日：{{ session('record')['date'] }}
        <br>
        受診コース：{{ config('const.course')[session('record')['course']] }}
        <br>
        受診場所：{{ session('record')['place'] }}
        </p>
    @endif
    @if ($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    @endif
        {{ Form::open(['method' => 'post', 'action' => ['User\RecordController@confirm', 'id' => $id]]) }}
            受診日：{{ Form::date('date', old('date'), ['required', 'max' => date('Y-m-d')]) }}
            <br>
            受診コース：{{ Form::select('course', config('const.course'), (old('course') ?? $course), ['required']) }}
            <br>
            受診場所：<br>
            {{ Form::textarea('place', old('place'), ['required']) }}
            <br>
            <button onClick="history.back()">戻る</button>
            {{ Form::submit('確認') }}
        {{ Form::close() }}
    </body>
</html>
