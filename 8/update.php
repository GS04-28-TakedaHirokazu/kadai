<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["email"]) || $_POST["email"]=="" ||
  !isset($_POST["age"]) || $_POST["age"]=="" ||
  !isset($_POST["naiyou"]) || $_POST["naiyou"]=="" //必須でない項目は削除する
){
  exit('ParamError');
}

//1. POSTデータ取得
$name   = $_POST["name"];
$email  = $_POST["email"];
$age  = $_POST["age"];
$naiyou = $_POST["naiyou"];
$id = $_POST["id"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．アップデート
$stmt = $pdo->prepare("UPDATE gs_an_table SET name=:a1, email=:a2, age=:a3, naiyou=:a4, indate=sysdate() where id=:a5");
$stmt->bindValue(':a1', $name);
$stmt->bindValue(':a2', $email);
$stmt->bindValue(':a3', $age);
$stmt->bindValue(':a4', $naiyou);
$stmt->bindValue(':a5', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．select.phpへリダイレクト
  header("Location: select.php");
  exit;
}
?>
