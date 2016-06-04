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

//セッション開始
session_start();

try {
    
    //データベースの接続を確立
    $db = getDb();
    
    if (isset($_POST['user_id'])  && isset ($_POST['password'])) {
        //空白の場合は取り除く
        if($_POST['user_id'] != "" && $_POST['password'] != "" ) {
            //ユーザーIDとパスワードを変数に格納
            $user_id  = $_POST['user_id'];
            $password = $_POST['password'];
            // user_idがmemberに存在するか？trueならname,passwordを特定
            $stt = $db->prepare("SELECT * FROM member WHERE id = '$user_id' ");
            $stt->execute();
            //nameが取り出されたかどうか確認
            $number = $stt->rowCount();
            if($number != 0) {
                //select成功の場合
                while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                    //パスワード、名前の取り出し
                    $db_pass = $row['password'];
                    $db_name = $row['name'];
                }

                // データベースの切断
                $db = NULL;

                // パスワードの比較
                if ($password == $db_pass) {
                    // 認証成功なら、セッションID,nameを新規に発行する
                    session_regenerate_id(true);
                    $_SESSION['user_id']   = $user_id;
                    $_SESSION['user_name'] = $db_name;

                    header("Location: smarty_board.php");
                    exit;

                } else {
                    // 認証失敗
                    print "ユーザIDあるいはパスワードに誤りがあります。";
                }

            }


            //失敗の場合
              else{
                  // 認証失敗
                  print "ユーザIDあるいはパスワードに誤りがあります。";
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

$smarty->display( 'login.tpl' );

?>