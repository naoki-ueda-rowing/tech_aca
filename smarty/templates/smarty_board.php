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

//Smartyクラスのインスタンス生成
$smarty = new Smarty();

//セッションの開始
session_start();

//すべての変数をエスケープする
$smarty->escape_html = true;

//セッションに値が入っていれば処理を開始
if (isset ($_SESSION['USER_NAME'])&& isset ($_SESSION['USERID'])) {
    //セッション名をテンプレートに渡す
    $smarty->assign('session_name', $_SESSION["USER_NAME"]);
    $smarty->assign('session_id', $_SESSION["USERID"]);

    try {
        //データベースの接続を確立
        $db = getDb();


        //INSERT命令にuser_id,本文の内容をセット
        if (isset ($_POST['contents'])) {
            if($_POST['contents'] != "" ) {
                $stt = $db->prepare('INSERT INTO  post( contents, user_id ) VALUES (:contents, :user_id)');
                $stt->bindValue(':contents', $_POST['contents']);
                $stt->bindValue(':user_id', $_SESSION["USERID"]);
                //INSERT命令を実行
                $stt->execute();
                $stt = NULL;
            }

            else{
            print "入力エラー：本文を入力してください";
            }

        }


        //postテーブルのid,contents,user_id, memberテーブルのnameを取得する
            $stt = $db->prepare('SELECT post.id, contents, user_id, member.name FROM post LEFT JOIN member ON post.user_id = member.id ');
            $stt->execute();

        //結果出力用の配列を定義
            $user_data = array();


            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                //データを配列に格納
                $user_data[] = $row;
            }


        //テンプレートに配列を渡す
            $smarty->assign('user_data', $user_data);

            $db = NULL;




    } catch
    (PDOException $e) {
        die("エラーメッセージ：{$e->getMessage()}");
    }

}

$smarty->display('board.tpl');


