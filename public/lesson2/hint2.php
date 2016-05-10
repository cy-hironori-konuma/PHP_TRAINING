<?php
// DBに接続する
// IP:localhost, USER:root, PASSWORD:root, DATABASE:training
$connection = mysqli_connect('localhost', 'root', 'root', 'training');

// DBの掲示板テーブルを参照して投稿一覧を取得する
// 投稿一覧を取得するSQLを作成する
// 掲示板テーブル（bbs）から名前（name）とコメント（comment）をID（id）の降順で取得する
// $query = '';

// SQLを実行して結果を配列形式で取得する
$result = mysqli_query($connection, $query);
$posts  = mysqli_fetch_all($result, MYSQLI_ASSOC);

// DB接続を閉じる
mysqli_close($connection);

?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>演習2</title>
    </head>
    <body>
        <h1>演習2</h1>

        <form name="lesson" action="lesson2.php" method="post">
            <p>
                <label for="input-name">名前</label>
                <input id="input-name" type="text" name="name" maxlength="50">
            </p>
            <p>
                <label for="input-comment">コメント</label>
                <input id="input-comment" type="text" name="comment" maxlength="50">
            </p>
            <input type="submit" name="submit" value="送信">
        </form>

        <ul>
            <li>名前 : コメント</li>
        </ul>
    </body>
</html>