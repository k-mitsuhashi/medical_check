<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>受診記録一覧</title>
    </head>
    <body>
        <h2>受診記録一覧</h2>
        {{ Form::open(['method' => 'get']) }}
            年度：{{ Form::select('year', $years, $year, ['required']) }}
            {{ Form::submit('表示') }}
        {{ Form::close() }}
        <br>
        <table border="1" style="border-collapse: collapse"><tbody>
            <tr>
                <th>受診日</th>
                <th>受診ユーザー</th>
                <th>受診コース</th>
                <th>受診場所</th>
            </tr>
        @foreach($records as $record)
            <tr>
                <td>{{ $record['date'] }}</td>
                <td>{{ $record['name'] }}</td>
                <td>{{ config('const.course')[$record['course']] }}</td>
                <td>{{ $record['place'] }}</td>
            </tr>
        @endforeach
        </tbody></table>
        <br>
        <a href="/"><button>戻る</button></a>
    </body>
</html>
