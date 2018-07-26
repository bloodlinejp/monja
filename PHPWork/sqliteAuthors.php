<?php
$database = new SQLite3("./library.sqlite");
$sql = "CREATE TABLE authors (authorid INTEGER PRIMARY KEY, name TEXT)";

if(!$database->query($sql)){
    echo "Authorsテーブルの作成に失敗しました<br />";
}
else{
    echo "Authorsテーブルを作成しました<br />";
}

$sql = <<<SQL
INSERT INTO 'authors' ('name') VALUES ('J.R.R. トルーキン');
INSERT INTO 'authors' ('name') VALUES ('アレックス・ヘイリー');
INSERT INTO 'authors' ('name') VALUES ('トム・クランシー');
INSERT INTO 'authors' ('name') VALUES ('アイザック・アシモフ');
SQL;

if(!$database->query($sql)){
    echo "追跡に失敗<br />";
}
else{
    echo "AuthorsへのINSERT - OK<br />"; 
}
?>
