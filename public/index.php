<?php
// 入力値を取得する
$name    = isset($_POST['name']) ? $_POST['name'] : '';
$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$ticket  = isset($_POST['ticket']) ? $_POST['ticket'] : '';

// DBに接続する
$connection = mysqli_connect('localhost', 'root', 'root', 'training');

// DB接続エラーハンドリング
if (!$connection) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// MYSQLクライアントの文字コードをUTF8にセットする
mysqli_set_charset($connection, "utf8");

// セッションを開始する
session_start();

// リロードされていないか、名前とコメントの両方が入力されているか判定
if ($ticket === $_SESSION['ticket'] && !empty($name) && !empty($comment)) {
    // 入力値を安全な文字列に直す
    // htmlタグを文字列として扱うように変換
    $name    = htmlspecialchars($name);
    $comment = htmlspecialchars($comment);
    
    // 前後のスペース（全角と半角）を削除
    $name    = trim(mb_convert_kana($name, 's', 'UTF-8'));
    $comment = trim(mb_convert_kana($comment, 's', 'UTF-8'));
    
    // 改行を削除
    $name    = str_replace(array('\r\n', '\r', '\n'), '', $name);
    $comment = str_replace(array('\r\n', '\r', '\n'), '', $comment);
    
    // 文字数を50文字に制限する
    $name    = mb_strlen($name) > 50 ? mb_substr($name, 0, 50) : $name;
    $comment = mb_strlen($comment) > 50 ? mb_substr($comment, 0, 50) : $comment;

    // DBに登録するためのSQLクエリを準備する
    $query = 'INSERT INTO bbs (name, comment) values(?, ?)';
    $stmt  = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $name, $comment);

    // SQLを実行してDBに登録する
    mysqli_stmt_execute($stmt);

    // 準備したクエリを解放する
    mysqli_stmt_close($stmt);
}

// DBの掲示板テーブルを参照して投稿一覧を取得する
// 投稿一覧を取得するSQLを作成する
// 掲示板テーブル（bbs）から名前（name）とコメント（comment）をID（id）の降順で取得する
$query = 'SELECT id, name, comment FROM bbs ORDER BY id desc';

// SQLを実行して結果を配列形式で取得する
$result = mysqli_query($connection, $query);
$posts  = mysqli_fetch_all($result, MYSQLI_ASSOC);

// DB接続を閉じる
mysqli_close($connection);

// リロード対策のため、ランダム文字列をセッションに持たせる
unset($_SESSION['ticket']);
$_SESSION['ticket'] = md5(uniqid().mt_rand());

?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>簡易掲示板</title>
    </head>
    <body>
        <h1>簡易掲示板</h1>

        <form name="lesson" action="index.php" method="post">
            <p>
                <label for="input-name">名前</label>
                <input id="input-name" type="text" name="name" maxlength="50">
            </p>
            <p>
                <label for="input-comment">コメント</label>
                <input id="input-comment" type="text" name="comment" maxlength="50">
            </p>
            <input type="hidden" name="ticket" value="<?= $_SESSION['ticket'] ?>">
            <input type="submit" name="submit" value="送信">
        </form>

        <?php if (!is_null($posts)) { ?>
        <ul>
            <?php foreach ($posts as $post) { ?>
            <li><a href="detail.php?id=<?= $post['id'] ?>"><?= $post['name'].' : '.$post['comment'] ?></li>
            <?php } ?>
        </ul>
        <?php } ?>
    </body>
</html>