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

//Smartyというクラスのインスタンスを生成しています。このインスタンスを用いることで、
//PHPからSmartyテンプレートに変数を受け渡したり、
//テンプレートの内容を表示することが出来るようになる
$smarty = new Smarty();

$params = array(
    'user_id' => $_POST['user_id'],
    'user_name' => $_POST['user_name'],
    'password' => $_POST['password'],
);

//POSTデータをデータベースに登録
try {
    //データベースの接続を確立
    $db = getDb();

    //INSERT命令にポストデータの内容をセット
    if (isset($_POST['user_id']) && isset($_POST['user_name']) && isset ($_POST['password'])) {
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




}
catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}

$smarty->display( 'register.tpl' );
?>