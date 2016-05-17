<?php
/*
演習0
問題 : HTMLのli要素をPHPの連想配列を使って反復的にリストを生成してください。
時間 : 5~10分

■ヒント1 連想配列
$types = [
    'boolean'  => '論理値',
    'integer'  => '整数',
    'float'    => '浮動小数点',
    'double'   => '浮動小数点',
    'string'   => '文字列',
    'array'    => '配列',
    'object'   => 'オブジェクト',
    'resource' => 'リソース',
    'NULL'     => 'ヌル'
];

■ヒント2 制御構造
foreachを使う
*/

// PHPの型データ配列 英語表記 => 日本語表記
$types = [
    'boolean'  => '論理値',
    'integer'  => '整数',
    'float'    => '浮動小数点',
    'double'   => '浮動小数点',
    'string'   => '文字列',
    'array'    => '配列',
    'object'   => 'オブジェクト',
    'resource' => 'リソース',
    'NULL'     => 'ヌル'
];
?>

<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>演習0</title>
    </head>
    <body>
        <h1>演習0</h1>
        <h2>PHPのデータ型一覧</h2>
        <ul>
            <?php foreach ($types as $en => $ja) { ?>
            <li><?php echo $en; ?> : <?php echo $ja ?></li>
            <?php } ?>
        </ul>
    </body>
</html>