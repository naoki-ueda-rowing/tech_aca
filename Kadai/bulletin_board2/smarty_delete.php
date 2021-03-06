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
    
session_start();
    
    //postデータを変数に格納
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
if($user_id == $_SESSION['user_id']) {
//データベースの接続を確立
    $db = getDb();

    //データベースからdeleteする投稿を取得
    $sql = 'DELETE FROM post where id = :delete_id';
    $stt = $db->prepare($sql);
    $stt->bindParam(':delete_id', $id, PDO::PARAM_INT);
    $stt->execute();

    // 削除メッセージの表示
    echo "削除完了";

    $db = NULL;
}
else{
    echo "ユーザー認証に失敗しました";
}


}

catch
(PDOException $e) {
    $db = NULL;
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'delete.tpl' );

?>
