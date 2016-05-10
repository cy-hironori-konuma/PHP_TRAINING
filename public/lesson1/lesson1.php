<?php
$name    = isset($_POST['name']) ? $_POST['name'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>演習1</title>
    </head>
    <body>
        <h1>演習1</h1>

        <form name="lesson" action="lesson1.php" method="post">
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

        <?php if (!empty($name) && !empty($comment)) { ?>
        <p><?= $name ?> : <?= $comment ?></p>
        <?php } ?>
    </body>
</html>