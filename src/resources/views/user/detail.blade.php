<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ユーザー詳細</title>
    </head>
    <body>
        <h2>ユーザー詳細</h2>
        <table border="1" style="border-collapse: collapse"><tbody>
            <tr>
                <th>ユーザーID</th>
                <th>名前</th>
                <th>生年月日</th>
                <th>年度年齢</th>
                <th>今年度の受診コース</th>
            </tr>
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['birth_date'] }}</td>
                <td>{{ $user['age'] }}</td>
                <td>{{ config('const.course')[$user['course']] }}</td>
            </tr>
        </tbody></table>
        <br>
        <table border="1" style="border-collapse: collapse"><tbody>
            <tr>
                <th>受診年度</th>
                <th>受診日</th>
                <th>受診コース</th>
                <th>受診場所</th>
            </tr>
        @foreach($user['records'] as $record)
            <tr>
                <td>{{ $record['year'] }}</td>
                <td>{{ $record['date'] }}</td>
                <td>{{ config('const.course')[$record['course']] }}</td>
                <td>{{ $record['place'] }}</td>
            </tr>
        @endforeach
        </tbody></table>
        <br>
        <a href="/users/{{ $user['id'] }}/record"><button>受診記録登録</button></a>
    </body>
</html>
