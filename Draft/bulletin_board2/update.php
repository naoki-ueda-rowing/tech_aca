<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 13:51
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
    $id = "1";
    $contents = "one";
    //print "$contents";
    print "$id";
//データベースの接続を確立
    $db = getDb();

    //データベースから本文を取得
    //$stt = $db->prepare("update post set contents =: contents   where id ='$id'");
    $sql = 'update post set contents = :contents where id = :value';
    $stt = $db -> prepare($sql);
    $stt->bindParam(':contents', $contents, PDO::PARAM_STR);
    $stt->bindValue(':value', 1, PDO::PARAM_INT);
    //$stt->bindValue(':contents', $contents);
    //$stt->bindValue(':value', $id);
    $stt->execute();
}

catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
    header("Location: bulletin_board2.php");
}
?>



</body>
</html>