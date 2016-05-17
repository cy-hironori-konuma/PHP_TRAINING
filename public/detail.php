<?php
// 関数定義
/**
 * htmlspecialcharsのエイリアス
 * @param  string $string htmlspecialcharsを適用する文字列
 * @return string         htmlspecialchars適用後の文字列（シングル・ダブルクォーテーションも変換, UTF-8に変換）
 */
function h($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

// 入力値を取得する
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

// IDが指定されていない場合はリダイレクトする
if (empty($id)) {
    header('Location: ./index.php');
    exit();
}

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
mysqli_set_charset($connection, 'utf8');

// DBに登録するためのSQLクエリを準備する
$query = 'SELECT name, comment FROM bbs WHERE id = ?';
$stmt  = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);

// SQLを実行してDBにから投稿データを取得する
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $name, $comment);
mysqli_stmt_fetch($stmt);

// 準備したクエリを解放する
mysqli_stmt_close($stmt);

// DB接続を閉じる
mysqli_close($connection);

$name    = is_null($name) ? '' : $name;
$comment = is_null($comment) ? '' : $comment;
?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>簡易掲示板 投稿詳細</title>
    </head>
    <body>
        <h1>簡易掲示板 投稿詳細</h1>
        <p>名前 : <?= h($name); ?></p>
        <p>コメント : <?= h($comment); ?></p>
        <a href="/">トップ</a>
    </body>
</html>