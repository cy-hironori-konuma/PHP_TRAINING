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
            <!-- 以下のリストを反復的に生成 -->
            <li>boolean : 論理値</li>
            <li>integer : 整数</li>
            <li>float : 浮動小数</li>
            <li>double : 浮動小数</li>
            <li>string : 文字列</li>
            <li>array : 配列</li>
            <li>object : オブジェクト</li>
            <li>resource : リソース</li>
            <li>NULL : ヌル</li>
        </ul>
    </body>
</html>