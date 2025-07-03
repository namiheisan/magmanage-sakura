# さくらレンタルサーバ版の記事制作管理システム
雑誌や書籍の制作管理するシステム（magmanage）のさくらレンタルサーバ版です。  
MySQLでデータベースを作成して次の手順でその中にテーブルを作成します。  
さくらレンタルサーバの「www」ディレクトリ内に任意のディレクトリを作成し、このソースコードと[PHPMailer](https://github.com/Synchro/PHPMailer.git)を配置してconfig.phpを書き換えれば動作します。  
セキュリティ対策のため、少なくともトップディレクトリにはベーシック認証を設定してください。

## テーブルの作成
テーブル作成のSQL文。さくらのレンタルサーバの管理画面にある「phpMyAdmin」からデータベース（magmanage_db）を指定して実行します。
```
create table article (
pkey int auto_increment primary key,
valid int,
number int not null,
issue text,
status int,
charge int,
place int,
page int
); 
```
