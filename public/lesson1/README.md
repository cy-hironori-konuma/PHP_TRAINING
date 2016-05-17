# PHPで作る動的コンテンツ

# 静的なコンテンツと動的なコンテンツ  

Webページには**静的コンテンツ**と**動的コンテンツ**があります。  
**静的コンテンツ**とは、サーバにあらかじめ用意されたHTMLなどのファイルをそのままレスポンスデータとして返すページのことです。英語では、static contentと表現されます。  

**動的コンテンツ**とは、ユーザからリクエストや、ユーザーの操作などが生じた際に、動的に生成されるページのことです。英語では、dynamic contentと表現されます。  
動的コンテンツには、「クライアントサイド」タイプと、「サーバサイド」タイプがあります。  
クライアントサイドタイプは、ブラウザなどのクライアント側で、主にJavaScriptによって動的にページが生成されます。  
サーバサイドタイプは、サーバ側のPHPなどのプログラムによって動的にページが生成されます。  

# 基本的な動的コンテンツの仕組み

## サーバサイドタイプの例  

- サーバ側でHTMLデータを生成してレスポンスを返す  
- リクエストパラメーターでDBを参照してHTMLを生成する  
- 簡易掲示板  

↑↑ここらへんはホワイトボードで説明します。

# HTTPリクエストメソッド

HTTPリクエストメソッドとは、サーバにリクエストを送る際のリクエストの種類のこと。  
POSTやGET, PUT, DELETEなどがあり、主にGETとPOSTがよく使われる。  
http://wa3.i-3-i.info/word11405.html  

# リクエストパラメーターの送り方

htmlからリクエストパラメーターを送るには、下記の属性をform要素にする必要があります。

- action属性 : 送信先URL  
- method属性 : HTTPリクエストメソッド（POST or GET）  
 - GET : パラメーターがURLに付随して渡される
 - POST : パラメーターが本文（本体）として送信される

GETの例
```html
<a href="sample.php?msg=hoge">リンク</a>
```

POSTの例
```html
<form action="sample.php" method="post">
    <input type="text" name="msg" value="hoge">
    <input type="submit" value="送信">
</form>
```

# PHPでリクエストパラメーターを扱う

PHPからmsgパラメーターの値を取得

## GETの場合

$_GET

```php
$msg = $_GET['msg'];
echo $msg;
```

## POSTの場合

$_POST

```php
$msg = $_POST['msg'];
echo $msg;
```

## isset() 関数

http://php.net/manual/ja/function.isset.php  
変数がセットされていること、そして NULL でないことを検査する  

※変数に値が入っていない場合に、エラーが出力されてしまうのを防げる！

```php
// $msg = $_GET['msg'];

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

echo $msg;
```

# 演習1

問題 : form要素を完成させて、名前とコメントをPOSTメソッドで送信すること  
　　   名前とコメントが両方入力された場合、p要素に指定された形式で受け取った名前とコメントを表示させること  
時間 : 10~15分  
ファイル : lesson1.html
