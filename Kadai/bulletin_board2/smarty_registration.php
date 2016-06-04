<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 15:40
 */
require_once('MySmarty.class.php');
require_once 'connect.php';

//MySmartyクラスのインスタンス生成
$smarty = new MySmarty();

try {
    //データベースの接続を確立
    $db = getDb();

    if (isset($_POST['user_id']) && isset($_POST['user_name']) && isset ($_POST['password'])) {

        //空白の場合は取り除く
        if($_POST['user_id'] != "" &&  $_POST['user_name'] != "" && $_POST['password'] != "" ) {

            //ユーザーIDの重複を確認
            $stt = $db->prepare("SELECT * FROM member WHERE id = '$_POST[user_id]' ");
            $stt->execute();
            //user_idが取り出されたかどうか確認
            $user_id = $stt->rowCount();

            //重複の場合は除く
            if($user_id == 0) {
                $stt = $db->prepare('INSERT INTO  member( id , name , password ) VALUES (:user_id, :user_name, :password )');
                $stt->bindValue(':user_id', $_POST['user_id']);
                $stt->bindValue(':user_name', $_POST['user_name']);
                $stt->bindValue(':password', $_POST['password']);
                //INSERT命令を実行
                $stt->execute();
                $stt = NULL;
                $db = NULL;
                header("Location: smarty_board.php");
            }
            else{
                print "入力エラー：ユーザーIDが重複しています";
            }

        }
        else{
            print "入力エラー：漏れがあります";
        }

        
    }


}
catch
(PDOException $e) {
    $db = NULL;
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'registration.tpl' );

?>