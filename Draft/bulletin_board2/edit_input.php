<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/31
 * Time: 15:55
 */
require_once 'connect.php';
require_once 'Encode.php';
?>

<html>
<head>
    <title>投稿の編集</title>
</head>
<body>
編集<br>
<?php
try {
    //postデータを変数に格納
    $id = $_POST['id'];
//データベースの接続を確立
    $db = getDb();

    //データベースから本文を取得
    $stt = $db->prepare("select contents  from post where id = '$id'");
    $stt->execute();
    $row = $stt->fetch(PDO::FETCH_ASSOC);
    //print $row['contents'];

//更新フォームの作成
    echo "<form action=edit.php method=post>";
    echo "<textarea name = contents cols = 60 rows = 5 >" .$row["contents"]. "</textarea><br />";
    echo "<input type=hidden name=id value=" . $id . ">";
    echo "<input type=submit value=更新>";
    echo "</form>";

    $db = NULL;
}

catch
(PDOException $e) {
    die("エラーメッセージ：{$e->getMessage()}");
}
?>



</body>
</html>