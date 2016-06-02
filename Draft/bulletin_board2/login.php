<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/17
 * Time: 20:52
 */

require_once 'connect.php';
require_once 'Encode.php';
?>

<html>
<head>
    <title>ユーザーログイン</title>
</head>
<body>

<!--ログインフォームの作成-->
ログイン<br><br>
<form method="POST" action="login.php">
    ユーザーID：<input type="text" name="user_id" size="15" /><br>
    パスワード：<input type="text" name="password" size="15" /><br><br>

    <input type="submit" value="ログイン"　/>
</form>

<!--IDとパスワードの認証-->
<?php
//セッション開始
session_start();

try {
    //データベースの接続を確立
    $db = getDb();

    //INSERT命令にポストデータの内容をセット
    if (isset($_POST['user_id'])  && isset ($_POST['password'])) {
        //ユーザーIDとパスワードを変数に格納
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        // クエリの実行
        $stt = $db->prepare("SELECT * FROM member WHERE name = '$user_id' ");
        $stt->execute();
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            //パスワード、名前の取り出し
            $db_pass = $row['password'];
            $db_name = $row['name'];
            //print "$db_pass";
        }
        // データベースの切断
        $db = NULL;
        // パスワードの比較
        if ($password == $db_pass ) {
            // 認証成功なら、セッションIDを新規に発行する
            session_regenerate_id(true);
            $_SESSION["USERID"] = $user_id;
            $_SESSION["USER_NAME"] = $db_name;
            //print "login";
            //print $_SESSION["USER_NAME"];
            //print $_SESSION["USERID"];
            header("Location: bulletin_board2.php");
            exit;
        }

        else {
            // 認証失敗
             print "ユーザIDあるいはパスワードに誤りがあります。";
        }

    } else {
        // 未入力なら何もしない
    }



}
catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}
?>

</body>
</html>