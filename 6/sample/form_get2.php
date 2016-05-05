<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
$tel = $_POST["tel"];

if($name==""){
	$name = '<span style="color:red">未入力</style>';
	}
if($mail==""){
	$mail = '<span style="color:red">未入力</style>';
	}
if($tel==""){
	$tel = '<span style="color:red">未入力</style>';
	}

echo date("Y年m月d日 H時i分s秒");

//function htmlenc($str){
	//return htmlchars($str, ENT_QOOTES);}

?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<div>名前:<?php echo $name; ?></div>
	<div>MAIL:<?php echo $mail; ?></div>
	<div>電話:<?php echo $tel; ?></div>
    
</body>
</html>

