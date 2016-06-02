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
    <title>ユーザー登録</title>
</head>
<body>

<!--ユーザー登録フォームの作成-->
ユーザー登録<br>
<form method="POST" action="touroku.php">
    ユーザーID：<input type="text" name="user_id" size="15" /><br>
          名前：<input type="text" name="user_name" size="15" /><br>
    パスワード：<input type="text" name="password" size="15" /><br><br>

    <input type="submit" value="投稿"　/>
</form>

<!--POSTデータをデータベースに登録-->
<?php
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
        header("Location: bulletin_board2.php");
    }




}
catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}
?>

</body>
</html>