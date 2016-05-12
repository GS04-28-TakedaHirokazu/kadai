<?php
//1.  DB接続します
  $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM an_table order by id desc limit 1"); //最終行のみ取得

//３．SQL実行
$flag = $stmt->execute();

//４データ表示
$view="";
if($flag==false){
  $view = "SQLエラー";
  
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //5.表示文字列を作成→変数に追記で代入  $viewを複数表示可能
    $view .= $result['pratio'];
  }
}

	//$pr = $result['profit'] / $result['sales'] * 100 ;
	//return $pr;
	//echo $pr;

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>診断結果</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">だれでも観れる結果ページ</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron">利益率は<?=$view?>%です。
      <p><?php
	  if ($view <= 10){ //利益率によってコメント変える
	    echo "一般的な水準です。";
	  }elseif ($view <= 20){
		echo "高い収益性です！";
	  }else{
		echo "素晴らしい会社ですね！！";
	  }
	  ?></p>
    </div>
    <div>
      <p><a href="login.php">ログインして詳しく見る</a></p>
      <p><a href="register.php">新規会員登録をする</a></p>
      <p><a href="logout.php">ログアウトする</a></p>
    </div>
</div>
</div>
<!-- Main[End] -->

</body>
</html>
