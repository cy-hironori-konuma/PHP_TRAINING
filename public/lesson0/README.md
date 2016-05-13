# PHPとは

PHP (PHP: Hypertext Preprocessor を再帰的に略したものです)は、広く使われているオープンソースの汎用スクリプト言語です。 
PHPはサーバサイド・スクリプト言語として利用されており、Webサーバ上で動作し、Webサーバ上でPHPスクリプトの文書が要求されるたびに、そのPHPスクリプトが実行され、結果をウェブブラウザに対して送信する。

# PHPの特徴

- データベースとの連携やファイル操作が簡単
- Webアプリケーションの開発に特化している
 - **HTMLと混在して書くことができる**

（※PHPファイルの拡張子は「.html」ではなく「.php」）


# 演習

## sample.php

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Sample</title>
    </head>
    <body>

    <?php
    $string = 'Hello World';
    echo $string;
    echo $_SERVER['HTTP_USER_AGENT'];
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

> echo $_SERVER['HTTP_USER_AGENT'];

$_SERVER['HTTP_USER_AGENT'] にユーザーエージェント文字列が格納されているので、それを出力します  
**$_SERVER** は、サーバ変数と呼ばれる、スーパーグローバル変数の一つ

## スーパーグローバル変数とは  

PHPがあらかじめ用意してくれたグローバル変数のことです。

```php
// 例
$GLOBALS
$_SERVER
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_REQUEST
$_ENV
```



