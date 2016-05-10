# スポット研修 PHP

3時間

# 目的  

* 動的なコンテンツを配信する仕組みを学ぶ
* DBの参照・追加・更新を体験して理解する

# 当日の流れ  

環境構築は事前に行ってもらう？  
その前の研修で実施済み？

- 静的なコンテンツと動的なコンテンツの違い
- 環境構築
- 実習1.POST/GETでデータのやりとり
 - HTMLでフォーム部分作成
 - POST/GETで受け取ったデータを表示
- 実習2.簡易掲示板を作成
 - テーブル設計(?)
 - テーブル作成(?)
 - 既存データ参照
 - データ登録
 - データ更新
- 解説

# 静的なコンテンツと動的なコンテンツの違い  

Webページには**静的コンテンツ**と**動的コンテンツ**があります。  
**静的コンテンツ**とは、どのユーザがいつアクセスしても同じ内容が表示され続けるページのことです。  
index.html などのように、リクエストURLに指定されたhtmlなどのデータが、そのままレスポンスデータとして返る方式のWebページのことです。   
**動的コンテンツ**とは、ユーザーからリクエストがあってから初めてページを作り表示するページのことを指します。  
search.php?q=hogehoge などのように、クエリと呼ばれるパラメータがリクエストデータとして送信され、これを受信したWebサーバがプログラム上でパラメータに合わせた処理を実行して、レスポンスデータを生成し返却する方式のWebページのことです。  

動的コンテンツでは、POSTメソッドやGETメソッドでパラメーターをやりとりすることで動的な表現を実現しています。

# 環境構築

PHPで動的コンテンツを配信できるLAMP環境を構築
publicディレクトリ以下で作業してもらう

* 日付と時刻を NTP サーバーと同期する
```
 ntpdate -s ntp.nc.u-tokyo.ac.jp
```

# 演習1.POST/GETでデータのやりとり

## HTMLでフォーム部分作成

まずは入力フォームを作成してもらう
入力フォームで入力されたデータが送信されていることを確認する

## POST/GETで受け取ったデータを表示

PHPでPOSTパラメーターとGETパラメーターを受け取れるようにする
受け取ったデータをHTML内に表示する

# 演習2.簡易掲示板を作成

## テーブル作成

```
$ vagrant ssh
$ mysql

mysql> CREATE DATABASE training DEFAULT CHARACTER SET utf8;
Query OK, 1 row affected (0.00 sec)

mysql> use training;
Database changed

mysql> CREATE TABLE training.bbs (id int(11) NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, comment varchar(255) NOT NULL, PRIMARY KEY (id));
Query OK, 0 rows affected (0.00 sec)
```

## レコード作成

```
mysql> INSERT INTO bbs (name, comment) values('konuma', 'これがコメント欄に表示されれば成功です。');
```
