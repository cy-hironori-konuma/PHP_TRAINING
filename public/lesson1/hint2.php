<?php
$name    = $_POST['name'];
$comment = $_POST['comment'];
?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>演習1</title>
    </head>
    <body>
        <h1>演習1</h1>

        <form action="hint2.php" method="post">
            <p>
                <label for="input-name">名前</label>
                <input id="input-name" type="text" name="name">
            </p>
            <p>
                <label for="input-comment">コメント</label>
                <input id="input-comment" type="text" name="comment">
            </p>
            <input type="submit" name="submit" value="送信">
        </form>

        <p>konuma : まずは、POSTとGETでのデータ送受信について演習です。</p>
    </body>
</html>