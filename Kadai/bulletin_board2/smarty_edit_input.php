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
    $smarty->assign('contents',$row['contents']);
   
    $db = NULL;
    
}

catch
(PDOException $e) {
    $db = NULL;
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'edit_input.tpl' );

?>