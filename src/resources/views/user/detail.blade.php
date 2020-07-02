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
                <th>年度年齢</th>
                <th>今年度の受診コース</th>
                <th>受診回数</th>
                <th></th>
            </tr>
            <tr>
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['age'] }}</td>
                <td>{{ $user['course'] }}</td>
                <td><a href="/users/{{ $user['id'] }}/" target="_blank">詳細</a></td>
            </tr>
        </tbody></table>
    </body>
</html>
