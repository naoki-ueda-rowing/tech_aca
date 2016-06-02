<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 14:59
 */
require_once('Smarty.class.php');
require_once 'connect.php';
require_once 'Encode.php';

$smarty = new Smarty();

//セッションの開始
session_start();

$smarty->assign('session_name', $_SESSION["USER_NAME"]);
$smarty->assign('session_id', $_SESSION["USERID"]);

try {
    //データベースの接続を確立
    $db = getDb();
    //INSERT命令にポストデータの内容をセット
    if (isset ($_POST['contents'])) {
        $stt = $db->prepare('INSERT INTO  post( contents, user_id ) VALUES (:contents, :user_id)');
        $stt->bindValue(':contents', $_POST['contents']);
        $stt->bindValue(':user_id', $_SESSION["USERID"]);
//INSERT命令を実行
        $stt->execute();
        $stt = NULL;
    }

//ログイン時のみ掲示板の内容を表示する
    if (isset($_SESSION["USERID"])) {
        $stt = $db->prepare('SELECT * FROM post');
        $stt->execute();

        
        //php側で値を取得し、配列に格納する。それを、tpl側に渡して出力する。編集のときは
        //配列に格納されているidを受け取り、edit,deleteに渡す。
//結果を出力
        //id,contents,user
        $user_data = array();
        $user_name = array();
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
//ユーザーID,idを配列に格納
            $user_data[] = $row;
            //$user_id = $row["user_id"];
            //$id= $row['id'];
//                            echo "<input type = hidden name = id value = ".$id.">";
//                                
//                            echo "<input type = hidden name = id value = ".$id.">";

                        // user_idから名前を検索する
//                        $stt2 = $db->prepare("SELECT * FROM member WHERE name = '$user_id' ");
//                        $stt2->execute();
//                        while ($row2 = $stt2->fetch(PDO::FETCH_ASSOC)) {
//                            //名前の取り出し
//                            $db_name = $row2['name'];
//                            $user_name[] = $row2;
//                        }
//                        print "$db_name"; 

        }
        $smarty->assign('user_data',$user_data);
        $db = NULL;
    }
}
catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}








$smarty->display('board.tpl');