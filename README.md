# スポット研修 PHP

時間 : 3時間

# 目的  

* 動的なコンテンツを配信する仕組みを理解する

# 方法

* DBの参照・追加プログラムを作成し、動的コンテンツの仕組みを理解する

# 当日の流れ  

環境構築は事前に行ってもらう？  
その前の研修で実施済み？

- 静的なコンテンツと動的なコンテンツの違い
- 基本的な動的コンテンツの仕組み
- 環境構築
- LESSON-1 POST/GETでデータのやりとり
 - HTMLでフォーム部分作成
 - POST/GETで受け取ったデータを表示
 - 解説
- LESSON-2 簡易掲示板のデータ参照
 - 既存データ参照
 - 解説
- LESSON-3 簡易掲示板のデータ登録
 - データ登録
 - 解説

# 静的なコンテンツと動的なコンテンツの違い  

Webページには**静的コンテンツ**と**動的コンテンツ**があります。  
**静的コンテンツ**とは、サーバにあらかじめ用意されたHTMLなどのファイルをそのままレスポンスデータとして返すページのことです。英語では、static contentと表現されます。  

**動的コンテンツ**とは、ユーザからリクエストや、ユーザーの操作などが生じた際に、動的に生成されるページのことです。英語では、dynamic contentと表現されます。  
動的コンテンツには、「クライアントサイド」タイプと、「サーバサイド」タイプがあります。  
クライアントサイドタイプは、ブラウザなどのクライアント側で、主にJavaScriptによって動的にページが生成されます。  
サーバサイドタイプは、サーバ側のPHPなどのプログラムによって動的にページが生成されます。  

# 基本的な動的コンテンツの仕組み

## サーバサイドタイプの例  

![動的コンテンツ生成の仕組み](https://raw.githubusercontent.com/cy-hironori-konuma/PHP_TRAINING/master/img/dynamic_content.jpg)

```
https://php-training.jp/lesson.php?id=1
```



# HTTPリクエストメソッド

HTTPリクエストメソッドとは、サーバにリクエストを送る際のリクエストの種類のこと。  
POSTやGET, PUT, DELETEなどがあり、主にGETとPOSTがよく使われる。  
http://wa3.i-3-i.info/word11405.html  

# 環境構築

PHPで動的コンテンツを配信できるLAMP環境を構築  
publicディレクトリ以下で作業してもらう  

* vagrant環境を作る
```
vagrant up
```

* 日付と時刻を NTP サーバーと同期する
```
vagrant ssh
ntpdate -s ntp.nc.u-tokyo.ac.jp
```

# LESSON-1 POST/GETでデータのやりとり

## HTMLでフォーム部分作成

まずは入力フォームを作成してもらう
入力フォームで入力されたデータが送信されていることを確認する

## POST/GETで受け取ったデータを表示

PHPでPOSTパラメーターとGETパラメーターを受け取れるようにする
受け取ったデータをHTML内に表示する

# LESSON-2 簡易掲示板のデータ参照

## テーブル作成

```
$ vagrant ssh
$ mysql

mysql> CREATE DATABASE training DEFAULT CHARACTER SET utf8;
Query OK, 1 row affected (0.00 sec)

mysql> use training;
Database changed

mysql> CREATE TABLE training.bbs (id int(11) NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, comment varchar(255) NOT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
Query OK, 0 rows affected (0.00 sec)
```

## レコード作成

```
mysql> INSERT INTO bbs (name, comment) values('konuma', 'これがコメント欄に表示されれば成功です。');
mysql> INSERT INTO bbs (name, comment) values('hironori', 'これもコメント欄に表示してくださいね。');
```

# LESSON-3 簡易掲示板のデータ登録

