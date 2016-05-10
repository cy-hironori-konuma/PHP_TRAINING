# スポット研修 PHP

3時間

# 目的  

* 動的なコンテンツを配信する仕組みを学ぶ
* DBの参照・追加・更新を体験して理解する

# 当日の流れ  

環境構築は事前に行ってもらう？  
その前の研修で実施済み？

- 静的なコンテンツと動的なコンテンツの違い
- 
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
**静的コンテンツ**とは、サーバサイドにあらかじめ用意されたHTMLなどのファイルをそのままレスポンスデータとして返すページのことです。英語では、static contentと表現されます。  

**動的コンテンツ**とは、ユーザからリクエストがあってから、サーバサイドでデータを成形して表示するページのことを指します。  
search.php?q=hogehoge などのように、クエリと呼ばれるパラメータがリクエストデータとして送信され、これを受信したWebサーバがプログラム上でパラメータに合わせた処理を実行して、レスポンスデータを生成し返却する方式のWebページのことです。  
英語では、dynamic contentと表現されます。

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

