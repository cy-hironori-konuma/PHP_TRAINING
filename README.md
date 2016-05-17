# スポット研修 PHP

時間 : 2時間

# 目的  

- PHPとは、PHPで何かできるのか初歩的なところを理解してもらう
- 動的なコンテンツを配信する仕組みを理解する

# 事前事項

LAMP環境構築は中村さんのLinux研修で実施済み  

## 事前のスキルセット

### 非エンジニア

PHP何も知らない。  
MySQL何も知らない(SQLもわからない)。  
XAMPP, LAMP環境なし  
HTML, CSS書ける  
JavaScriptちょっとだけ書ける。  
SublimeText使ってる。

### エンジニア

PHP書ける  
(Vagrantが開発環境, VagrantにPHP, MySQLとかinstallしている)

# 当日の流れ  

- PHPとは
 - PHPとは
 - PHPの特徴
 - PHPの言語仕様の説明
 - 演習0

- PHPで作る動的コンテンツ
 - 静的なコンテンツと動的なコンテンツ
 - 基本的な動的コンテンツの仕組み
 - HTTPリクエストメソッド
 - リクエストパラメーターの送り方
 - PHPでリクエストパラメーターを扱う
 - 演習1

- PHPでDBからデータを取得する
 - DBの用意
 - MySQL接続時のソース説明
 - 演習2

- PHPでDBにデータを登録する
 - 演習3

# 資料

/distribution/  
以下のファイルを研修受講者に配布  
内容はpublic以下から答えとなるファイルを除いたもの

# 環境構築

※ 研修ではすでにLAMP環境があるので構築は不要

PHPで動的コンテンツを配信できるLAMP環境を構築  
publicディレクトリ以下で作業してもらう  

```
# vagrantを立ち上げる
vagrant up

# vagrant環境に入る
vagrant ssh

# 日付と時刻を NTP サーバーと同期する（←いらない）
ntpdate -s ntp.nc.u-tokyo.ac.jp
```