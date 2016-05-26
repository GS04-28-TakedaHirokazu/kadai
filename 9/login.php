<?php
//1. HTML_STARTをインクルード
$title = "LOGIN"; //html_start.phpのtitleタグに表示
include("html_start.php");
?>

<!--FB認証用PHP-->
<?php
    // アップロードしたFacebook SDKのfacebook.phpまでのパス
    require_once("src/facebook.php");
    // appIdとsecretを入力。appIdとsecretはDashboardで確認できます。
    $config = array(
        'appId' => '132218487185249', 
        'secret' => '2c5cd8e9ad81b8e31b84e4392ac98cbe'
    );
    // 下記の様に$configを引数に持たせて、インスタンス化させます
    $facebook = new Facebook($config);
	// ユーザIDの取得
    $user = $facebook->getUser();
     
    if($user){
    // ユーザの情報を取得
        $userStatus = $facebook->api("/me?fields=name,email","GET");
        var_dump($userStatus);
    }
?>
<p>
<?php // $facebook->getLoginUrl()でログインのURLを生成します。?>
<a href="<?php echo $facebook->getLoginUrl();?>">フェイスブックログイン</a>
</p>

<!-- login_act.php は認証処理用のPHPです。 -->
<header>
  <nav class="navbar navbar-default">LOGIN</nav>
</header>
<form name="form1" action="login_act.php" method="post">
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
<input type="submit" value="LOGIN" />
</form>

<?php
//2. HTML_ENDをインクルード
include("html_end.php");
?>
