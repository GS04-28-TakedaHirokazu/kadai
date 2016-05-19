<?php
//1. POSTデータ取得
$id = $_POST["id"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3. データ登録SQL作成
$delete = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:a1");
//WHERE id=変更するidを指定
$delete ->bindValue(':a1', $id);
//SQL実行
$flag = $delete ->execute();

//４．データ登録処理後
if($delete==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $delete->errorInfo();
  exit("QueryError:".$error[2]);
}else{
//５．select.phpへリダイレクト
  header("Location: select.php");
  exit;
}
?>
