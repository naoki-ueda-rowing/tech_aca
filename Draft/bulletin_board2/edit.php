<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 13:02
 */
require_once 'connect.php';
require_once 'Encode.php';
?>

<html>
<head>
    <title>投稿の編集</title>
</head>
<body>

<?php
try {
    //postデータを変数に格納
    $id = $_POST['id'];
    $contents = $_POST['contents'];
//データベースの接続を確立
    $db = getDb();

    //データベースから本文を取得
    //$stt = $db->prepare("update post set contents =: contents   where id ='$id'");
    $sql = 'update post set contents = :contents where id = :id';
    $stt = $db -> prepare($sql);
    $stt->bindParam(':contents', $contents, PDO::PARAM_STR);
    $stt->bindParam(':id', $id, PDO::PARAM_STR);
    $stt->execute();
    //$d = "update post set contents = '$contents'  where id = $id";

// 登録完了メッセージの表示
echo "更新完了";
    $db = NULL;

}

catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");

}
?>

<form action="bulletin_board2.php">
    <br><input type="submit" value="戻る"　/><br>
</form>


</body>
</html>