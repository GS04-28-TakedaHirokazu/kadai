<?php
//1.  DB接続します
  $pdo = new PDO('mysql:dbname=an;charset=utf8;host=localhost', 'root', '');

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM an_table order by id desc limit 1"); //最終行のみ取得
$stmt2 = $pdo->prepare("SELECT AVG(pratio) FROM an_table"); 

//３．SQL実行
$flag = $stmt->execute();
$flag2 = $stmt2->execute();

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

$view2="";
if($flag2==false){
  $view2 = "SQLエラー";
  
}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $result2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
    //5.表示文字列を作成→変数に追記で代入  $viewを複数表示可能
    $view2 .= floor($result2 ['AVG(pratio)']);
  }
}

$view3 = $view - $view2;

?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>診断結果（ログインした人）</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}
.navbar-default {
    background-color:#1CB200;
    border-color: #1CB200;
}</style>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "利益率", { role: "style" } ],
        ["あなた", <?=$view?>, "#b87333"],
        ["みんな", <?=$view2?>, "gold"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "あなたとみんなの利益率比較",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
  
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ログインした人が観れるページ</a>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron jumbotron2">あなたの利益率は<?=$view?>%なのに対し、みんなの利益率は<?=$view2?>%です。<br><?=$view3?>%の差があります。
    <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
    </div>
    <div>
      <p><a href="logout.php">ログアウトする</a></p>
    </div>
</div>
</div>
<!-- Main[End] -->

</body>
</html>
