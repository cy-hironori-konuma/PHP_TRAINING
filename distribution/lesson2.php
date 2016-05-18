<?php
/*
演習2
問題 : 上の「PHPとMySQL」の章を利用して、掲示板の投稿一覧をリスト形式で表示させること
時間 : 5~10分
ファイル : lesson2.php
*/

// DBに接続する
// IP:localhost, USER:root, PASSWORD:root, DATABASE:training
$connection = mysqli_connect('localhost', 'root', 'root', 'training');

// DBの掲示板テーブルを参照して投稿一覧を取得する
// 投稿一覧を取得するSQLを作成する
// 掲示板テーブル（bbs）から名前（name）とコメント（comment）をID（id）の降順で取得する
$query = 'SELECT name, comment FROM bbs ORDER BY id DESC';

// SQLを実行して結果を取得する
$result = mysqli_query($connection, $query);

// 結果を配列形式で取得する
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
        <h2>DBに保存されている掲示板の投稿データ一覧を表示する</h2>

        <ul>
            <li>名前 : コメント</li>
            <li>名前2 : コメント2</li>
        </ul>
    </body>
</html>