<?php
$name    = $_GET['name'];
$comment = $_GET['comment'];

var_dump($name, $comment);
?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>演習1</title>
    </head>
    <body>
        <h1>演習1</h1>

        <form name="lesson" action="index.html" method="get">
            <p>
                <label for="input-name">名前</label>
                <input id="input-name" type="text" name="name">
            </p>
            <p>
                <label for="input-comment">ひとこと</label>
                <input id="input-comment" type="text" name="comment">
            </p>
            <input type="submit" name="submit" value="送信">
        </form>

        <ul>
            <li>konuma : 動的なコンテンツを配信する仕組みを覚えて下さい。 [2016/05/02 13:27:00]</li>
            <li>konuma : まずは、POSTとGETでのデータ送受信について演習です。  [2016/05/02 13:26:00]</li>
        </ul>
    </body>
</html>