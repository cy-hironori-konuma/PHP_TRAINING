# DBからデータを取得する

# DBの用意

IP : localhost  
USER : root  
PASSWORD : root  
DATABASE : training （<-これから作る）

## MYSQLにデータベースを作成

```sql
# trainingデータベースを作成
CREATE DATABASE training DEFAULT CHARACTER SET utf8;

# データベースが作成されたか確認
show databases;
```

## データベースにテーブルを作成

```sql
# これから使うデータベースを指定
use training

# bbs掲示板テーブルを作成
CREATE TABLE training.bbs (id int(11) NOT NULL AUTO_INCREMENT, name varchar(255) NOT NULL, comment varchar(255) NOT NULL, PRIMARY KEY (id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# テーブルが作成されたか確認
show tables;
```

## テーブルにデータを登録

```sql
# 名前とコメントが入ったレコードを2件登録
INSERT INTO bbs (name, comment) values('konuma', 'これがコメント欄に表示されれば成功です。');
INSERT INTO bbs (name, comment) values('hironori', 'これもコメント欄に表示されるはずです。');

# レコードが2件登録されたか確認
SELECT name, comment FROM bbs;
```

# PHPとMySQL

```php
// DBに接続する
// IP:localhost, USER:root, PASSWORD:root, DATABASE:training
$connection = mysqli_connect('localhost', 'root', 'root', 'training');

// DBの掲示板テーブルを参照して投稿一覧を取得する
// 投稿一覧を取得するSQLを作成する
// 掲示板テーブル（bbs）から名前（name）とコメント（comment）をID（id）の降順で取得する
$query = 'SELECT name, comment FROM bbs ORDER BY id DESC';

// SQLを実行して結果を取得する
$result = mysqli_query($connection, $query);

// 結果を配列形式で取得する
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

// DB接続を閉じる
mysqli_close($connection);
```

# 演習2

問題 : 上の「PHPとMySQL」の章を利用して、掲示板の投稿一覧をリスト形式で表示させること  
時間 : 5~10分  
ファイル : lesson2.php  