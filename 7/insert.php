<?php
  //1. POSTデータ取得（）
  $sales = $_POST["sales"];
  $profit = $_POST["profit"];
  $asset = $_POST["asset"];
  $capital = $_POST["capital"];
  
  //2. DB接続します
  $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');

  //３．データ登録SQL作成
  $stmt = $pdo->prepare("INSERT INTO an_table (id, sales, profit, asset, capital, pratio )VALUES(NULL, :sales, :profit, :asset, :capital, :profit/sales*100 )");
  $stmt->bindValue(':sales', $sales);
  $stmt->bindValue(':profit', $profit);
  $stmt->bindValue(':asset', $asset);
  $stmt->bindValue(':capital', $capital);

  $status = $stmt->execute();

  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;
    
  }else{
    //５．select.phpへリダイレクト
	header("Location: select.php");
    exit();

    //登録完了を表示
	//echo "登録完了";

  }
?>
