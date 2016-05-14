<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>かんたん企業診断</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}
  .jumbotron{padding-left:30px;}</style>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">だれでも観れる入力ページ</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>かんたん企業診断</legend>
     <label>売上：<input type="text" name="sales">百万円</label><br>
     <label>利益：<input type="text" name="profit">百万円</label><br>
     <label>資産：<input type="text" name="asset">百万円</label><br>
     <label>資本：<input type="text" name="capital">百万円</label><br>
     <input type="submit" value="診断">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
