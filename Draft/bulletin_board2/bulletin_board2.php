<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/25
 * Time: 20:52
 */

require_once 'connect.php';
require_once 'Encode.php';
?>

<html>
<head>
    <title>掲示板2</title>
</head>
<body>

<?php
//セッションの開始
session_start();

// ログイン状態のチェック
if (isset($_SESSION["USER_NAME"])) {
    print "ようこそ";
    print $_SESSION["USER_NAME"];
    print "さん！";

    ?>

    <!--ログインしているときのみログアウトボタンの作成-->
    <form action="logout.php">
        <br><input type="submit" value="ログアウト" 　/><br>
    </form>

    <!--ログイン時のみ投稿フォームの作成-->
    本文<br>
    <form method="POST" action="bulletin_board2.php">
        <textarea name = "contents" cols = "60" rows="5"></textarea><br>
        <input type="submit" value="投稿"　/>
    </form>

    <?php
}
else{
    ?>
    <!--ログインしていないときのみユーザー登録ボタンの作成-->
<form action="touroku.php">
    <input type="submit" value="ユーザー登録"　/><br>
</form>
    <!--ログインしていないときのみ、ログインボタンの作成-->
<form action="login.php">
    <input type="submit" value="ログイン"　/><br>
</form>

<?php
}
?>


<?php




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

    //結果を出力
    while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
        //ユーザーIDを変数に格納
        $user_id = $row["user_id"];
        $id= $row['id'];

        ?>

        <table border="1" width="300" height="300">
            <td height="30" width="50"> </td>
            <td height="30">
                <?php
                if( $user_id == $_SESSION["USERID"]){
                ?>
                <form  method = post action=edit_input.php>
                    <?php
                   echo "<input type = hidden name = id value = ".$id.">"
                    ?>
                    <br><input type="submit" value="編集 "/>
                </form>
                <form  method = post action= delete.php>
                    <?php
                    echo "<input type = hidden name = id value = ".$id.">"
                    ?>
                    <input type="submit" value="削除 "/><br>
                </form>
                <?php }
                ?>
            </td>
            <tr>
            <td height="30" width="50"> 名前</td>
            <td height="30"> <?php
                // user_idから名前を検索する
                $stt2 = $db->prepare("SELECT * FROM member WHERE name = '$user_id' ");
                $stt2->execute();
                while ($row2 = $stt2->fetch(PDO::FETCH_ASSOC)) {
                    //名前の取り出し
                    $db_name = $row2['name'];
                }
                print "$db_name"; ?></td>
            </tr>
            <tr>
                <td height="240" width="50"> 本文</td>
                <td height="240"><?php e($row['contents']); ?></td>
            </tr>
        </table>
        <br><br>
        <?php

    }
    $db = NULL;
}
}
catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}
?>
</body>
</html>