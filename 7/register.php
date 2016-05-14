<?php

//ハッシュ化に使用する定数
$salt = "mwefCMEP28DjwdW3lwdS239vVS";

$mysqli = new mysqli('localhost', 'root', '', 'an');

$status = "none";

if(!empty($_POST["username"]) && !empty($_POST["password"])){
  //パスワードはハッシュ化する
  $password = md5($_POST["password"] . $salt);

  //ユーザ入力を使用するのでプリペアドステートメントを使用
  $stmt = $mysqli->prepare("INSERT INTO users VALUES (?, ?)");
  $stmt->bind_param('ss', $_POST["username"], $password);

  if($stmt->execute())
    $status = "ok";
  else
    //既に存在するユーザ名だった場合INSERTに失敗する
    $status = "failed";
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>新規登録</title>
  </head>
  <body>
    <h1>新規登録</h1>
    <?php if($status == "ok"):?>
		<SCRIPT language="JavaScript">
        <!--
        // 一定時間経過後に指定ページにジャンプする
        mnt = 3; // 何秒後に移動するか？
        url = "login.php"; // 移動するアドレス
        function jumpPage() {
          location.href = url;
        }
        setTimeout("jumpPage()",mnt*1000)
        //-->
        </SCRIPT>
      <p>登録完了しました。3秒後に<a href="login.php">ログインページ</a>へ移動します。</p>
    <?php elseif($status == "failed"): ?>
      <p>エラー：既に存在するユーザ名です。</p>
    <?php else: ?>
      <form method="POST" action="register.php">
        ユーザ名：<input type="text" name="username" />
        パスワード：<input type="password" name="password" />
        <input type="submit" value="登録" />
      </form>
    <?php endif; ?>
  </body>
</html>