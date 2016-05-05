<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>fputs</title>
</head>
<body>
<?php
/* ------------------------------------------------------------------------
■例 ファイル読み込み
fputs.php

■実例；
$name = $_POST["name"];
$mail = $_POST["mail"];
$age  = $_POST["age"];
$comment = $_POST["comment"];
$str = $name.",".$mail.",".$age.",".$comment."\n";

$file = fopen("data/data.txt","a");
flock($file, LOCK_EX);
fputs($file,$str);
flock($file, LOCK_UN);
fclose($file);

------------------------------------------------------------------------ */

//以下に記述してみましょう
$name = $_POST["name"];
$mail = $_POST["mail"];
$password  = $_POST["password"];
$sex  = $_POST["sex"];

//文字列を作成
$str = $name.",".$mail.",".$password.",".$sex."\n";

//File操作
$file = fopen("data/data.csv","a");
flock($file, LOCK_EX);
fputs($file,$str);
flock($file, LOCK_UN);
fclose($file);





?>
<p>CSVファイルの中を確認してください。</p>
<p><a href="data_output.php">「登録されてるデータ」はこちらで表示</a></p>


</body>
</html>
