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

if($_POST['contents'] != "" ) {
    //postデータを変数に格納
    $id = $_POST['id'];
    $contents = $_POST['contents'];

//データベースの接続を確立
    $db = getDb();

    //データベースの本文を更新
    $sql = 'update post set contents = :contents where id = :id';
    $stt = $db->prepare($sql);
    $stt->bindParam(':contents', $contents, PDO::PARAM_STR);
    $stt->bindParam(':id', $id, PDO::PARAM_STR);
    $stt->execute();

// 更新完了メッセージの表示
    echo "更新完了";


    $db = NULL;

}

    else{
      print "入力エラー：本文を入力してください";  
    }
    
}

catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");

}

$smarty->display( 'edit.tpl' );

?>
