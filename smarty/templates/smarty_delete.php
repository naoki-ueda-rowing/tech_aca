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

//すべての変数をエスケープする
$smarty->escape_html = true;

try {

    //postデータを変数に格納
    $id = $_POST['id'];

//データベースの接続を確立
    $db = getDb();

    //データベースからdeleteする投稿を取得
    $sql = 'DELETE FROM post where id = :delete_id';
    $stt = $db -> prepare($sql);
    $stt -> bindParam(':delete_id', $id, PDO::PARAM_INT);
    $stt -> execute();

    // 削除メッセージの表示
    echo "削除完了";

    $db = NULL;

    
}

catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'delete.tpl' );

?>
