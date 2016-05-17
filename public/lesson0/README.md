# PHPとは

PHP (PHP: Hypertext Preprocessor を再帰的に略したものです)は、広く使われているオープンソースの汎用スクリプト言語です。 
PHPはサーバサイド・スクリプト言語として利用されており、Webサーバ上で動作し、Webサーバ上でPHPスクリプトの文書が要求されるたびに、そのPHPスクリプトが実行され、結果をウェブブラウザに対して送信する。

# PHPの特徴

- データベースとの連携やファイル操作が簡単
- Webアプリケーションの開発に特化している
 - 配列や文字列を扱う定義済み関数が多い
 - **HTMLと混在して書くことができる**

（※PHPファイルの拡張子は「.html」ではなく「.php」）

PHPの公式サイト
http://www.php.net/

# とりあえずPHPを動かしてみる

## sample.php

```php
<!DOCTYPE HTML>
<html lang="ja-JP">
    <head>
        <meta charset="UTF-8">
        <title>sample</title>
    </head>
    <body>

    <?php
    $string = 'Hello World';
    echo $string;
    ?>

    </body>
</html>
```

> <?php  
> ?>  

PHP処理の開始と終了を表す  
開始から終了までは、複数行に渡ってもOK  
PHPの処理部分は複数あってもOK  


> $string = 'Hello World';  

文字列"Hello World"を$string変数に代入する  
PHP では、変数名は常にドル記号で始まります  

JavaScriptでは、
```JavaScript
var string = 'Hello World';
```
と表現できます。


> echo $string;

echo は、後ろに続く文字列を出力するPHPの言語構造（関数みたいなもの）  
$string変数に格納されている文字列を出力します

# PHP言語仕様

## 基本的な構文

### コメント

```php
// 単一行用のコメント（こちらを使用することが多い）

# 単一行用のコメント

/*
複数行用のコメント
複数行用のコメント
複数行用のコメント
複数行用のコメント
*/
```

### 出力する範囲の条件分け

```php
<?php if ($expression) { ?>
<p>条件式が真の場合にこれが表示されます。</p>
<?php } else { ?>
<p>それ以外の場合にこちらが表示されます。</p>
<?php } ?>
```

## データ型

PHP は 8 種類の基本型をサポートします。

### 4 種類のスカラー型

論理値 (boolean)
整数 (integer)
浮動小数点数 (float, double)
文字列 (string)

JavaScriptとの違いは？

### 2 種類の複合型

配列 (array)
オブジェクト (object)

### 2 種類の特別な型

リソース (resource)
ヌル (NULL)

## 変数のスコープ

PHPの場合、ユーザー定義の関数の中では変数の有効範囲はローカル関数の中となります。  
関数の中で使用された変数は、デフォルトで有効範囲が関数内部に制限されます。  
関数の外で定義された変数は、デフォルトではユーザー定義関数の中から直接参照することはできません。  

JavaScriptのスコープ
```javascript
var a = 1; /* グローバル変数 */

function test()
{
    console.log(a); /* グローバル変数の参照 */
}

test();
```

PHPのスコープ
```php
<?php
$a = 1; /* グローバル変数 */ 

function test()
{ 
    echo $a; /* ローカル変数の参照 */ 
} 

test();
?>
```

## 定義済み変数

PHPには、あらかじめ定義されている変数があるよ。

- $GLOBALS : [スーパーグローバル] グローバルスコープで使用可能なすべての変数への参照
- $_SERVER : [スーパーグローバル] サーバー情報および実行時の環境情報
- $_GET : [スーパーグローバル] HTTP GET 変数
- $_POST : [スーパーグローバル] HTTP POST 変数
- $_FILES : [スーパーグローバル] HTTP ファイルアップロード変数
- $_REQUEST : [スーパーグローバル] HTTP リクエスト変数
- $_SESSION : [スーパーグローバル] セッション変数
- $_ENV : [スーパーグローバル] 環境変数
- $_COOKIE : [スーパーグローバル] HTTP クッキー
- $php_errormsg : 直近のエラーメッセージ
- $HTTP_RAW_POST_DATA : 生の POST データ
- $http_response_header : HTTP レスポンスヘッダ
- $argc : スクリプトに渡された引数の数
- $argv : スクリプトに渡された引数の配列

UserAgentを表示してみる
```php
<?php
echo $_SERVER['HTTP_USER_AGENT'];
?>
```

## スーパーグローバルな変数とは  

スクリプト全体を通してすべてのスコープで使用可能な変数のことです。関数の内部からでも直接参照できます。

```php
<?php
$GLOBALS['message'] = 'hello world!';

function test()
{
    echo $GLOBALS['message'];
}

test();
?>
```

## 演算子

### 文字列演算子

PHPの場合、文字列の結合は '.' で行う

JavaScriptの場合
```javascript
var a = 'HELLO';
var b = ' WORLD';
console.log(a+' GREAT'+b);
```

PHPの場合
```php
$a = 'HELLO';
$b = ' WORLD';
echo $a.' GREAT'.$b;
```

## 制御構造

```php
// if / else if / else
if ($i === 'a') {
    echo 'hoge';
} else if ($i === 'b') {
    echo 'fuga'
} else {
    echo 'piyo';
}

// switch
switch ($i) {
    case 'a':
        echo 'hoge';
        break;
    case 'b':
        echo 'fuga';
        break;
    default:
        echo 'piyo';
}


// while / do-while
$i = 1;
while ($i < 5) {
    echo $i;  // 1~4が出力される
    $i++;
}

do {
    echo $i;  // 5~1が出力される
    $i--;
} while ($i > 0);

// for
for ($i = 0; $i < 3; $i++) {
    echo $i;  // 0~2が出力される
}

// foreach
// 配列を反復処理するための制御構造
$arr = array('a', 'b', 'c');

foreach ($arr as $value) {
    echo $value;  // abcが出力される
}
foreach ($arr as $key => $value) {
    echo $key.' : '.$value.PHP_EOL;
}
```

# 演習0

問題 : HTMLのli要素をPHPの連想配列を使って反復的にリストを生成してください。  
時間 : 5~10分  
ファイル : lesson0.php
