<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 15:40
 */
require_once 'connect.php';
require_once 'Encode.php';

require_once('Smarty.class.php');

//Smartyクラスのインスタンス生成
$smarty = new Smarty();

//すべての変数をエスケープする
$smarty->escape_html = true;

try {
    //データベースの接続を確立
    $db = getDb();

    //INSERT命令にユーザーの内容をセット
    if (isset($_POST['user_id']) && isset($_POST['user_name']) && isset ($_POST['password'])) {

        //空白の場合は取り除く
        if($_POST['user_id'] != "" &&  $_POST['user_name'] != "" && $_POST['password'] != "" ) {
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
            print "入力エラー：漏れがあります";
        }

    }


}
catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'touroku.tpl' );

?>