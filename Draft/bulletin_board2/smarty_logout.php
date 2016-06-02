<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 15:42
 */
require_once 'connect.php';
require_once 'Encode.php';

require_once('Smarty.class.php');

//Smartyというクラスのインスタンスを生成しています。このインスタンスを用いることで、
//PHPからSmartyテンプレートに変数を受け渡したり、
//テンプレートの内容を表示することが出来るようになる
$smarty = new Smarty();

session_start();

if (isset($_SESSION["USERID"])) {
    $errorMessage = "ログアウトしました。";
    header("Location: smarty_board.php");
}
else {
    $errorMessage = "セッションがタイムアウトしました。";
}
// セッション変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>
