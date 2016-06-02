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

//Smartyクラスのインスタンスを生成
$smarty = new Smarty();

//すべての変数をエスケープする
$smarty->escape_html = true;

try {
    
    //postデータを変数に格納
    $id = $_POST['id'];
    
    //データベースの接続を確立
    $db = getDb();

    //データベースから本文を取得
    $stt = $db->prepare("select contents  from post where id = '$id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_ASSOC);
    
    //テンプレートにid,本文を渡す
    $smarty->assign('id',$id);
    $smarty->assign('contents',$row["contents"]);
   
    $db = NULL;
    
}

catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'edit_input.tpl' );

?>