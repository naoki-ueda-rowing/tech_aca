<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 15:42
 */
require_once('MySmarty.class.php');
require_once 'connect.php';

    //MySmartyクラスのインスタンス生成
    $smarty = new MySmarty();

    session_start();

    // セッション変数のクリア
    $_SESSION = array();
    
    // セッションクリア
    @session_destroy();

    print "ログアウトしました。";
    


    $smarty->display( 'logout.tpl' );

?>
