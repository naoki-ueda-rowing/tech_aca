<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 14:59
 */
require_once('MySmarty.class.php');
require_once 'connect.php';

//MySmartyクラスのインスタンス生成
$smarty = new MySmarty();

//セッションの開始
session_start();

//セッションに値が入っていれば処理を開始
if (isset ($_SESSION['user_name']) && isset ($_SESSION['user_id'])) {
    //セッション名をテンプレートに渡す
    $smarty->assign('session_name', $_SESSION['user_name']);
    $smarty->assign('session_id'  , $_SESSION['user_id']);

    try {
        //データベースの接続を確立
        $db = getDb();
        
        //INSERT命令にuser_id,本文の内容をセット
        if (isset ($_POST['contents'])) {
            if($_POST['contents'] != "" ) {
                $stt = $db->prepare('INSERT INTO  post( contents, user_id ) VALUES (:contents, :user_id)');
                $stt->bindValue(':contents', $_POST['contents']);
                $stt->bindValue(':user_id', $_SESSION['user_id']);
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
            $result = array();


            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                //データを配列に格納
                $result[] = $row;
            }
        
        //idの値でソートする
        //ソート用の配列を用意
        foreach ((array) $result as $key => $value){
            $sort[$key] = $value['id'];
        }
        //ソート実行
        array_multisort($sort, SORT_ASC, $result);

        //テンプレートに配列を渡す
            $smarty->assign('result', $result);

            $db = NULL;




    } catch
    (PDOException $e) {
        $db = NULL;
        die("エラーメッセージ：{$e->getMessage()}");
    }

}

$smarty->display('board.tpl');


