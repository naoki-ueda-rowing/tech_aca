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

//Smartyクラスのインスタンス生成
$smarty = new Smarty();

session_start();

//すべての変数をエスケープする
$smarty->escape_html = true;

    // セッション変数のクリア
    $_SESSION = array();
    
    // セッションクリア
    @session_destroy();

    print "ログアウトしました。";
    


$smarty->display( 'logout.tpl' );

?>
