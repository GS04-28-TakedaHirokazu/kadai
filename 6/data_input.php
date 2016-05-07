<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>フォーム：input</title>
</head>
<body>

<form method="post" action="fputs.php">
<p>お名前:<input type="text" name="name" size="50"></p>
<p>MAIL:<input type="text" name="mail" size="50"></p>
<p>パスワード:<input type="password" name="password" size="50"></p>
<p>性別:<input type="radio" name="sex" size="50" value="男性">男性<input type="radio" name="sex" size="50" value="女性">女性<input type="radio" name="sex" size="50" value="？？">回答しない</p>
<p><input type="submit" value="送信"></p>
</form>

</body>
</html>
