<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/31
 * Time: 18:43
 */
require_once 'connect.php';
require_once 'Encode.php';
?>

<html>
<head>
    <title>投稿の削除</title>
</head>
<body>
削除<br>
<?php
try {
    //postデータを変数に格納
    $id = $_POST['id'];
//データベースの接続を確立
    $db = getDb();

    //データベースから本文を取得
    $sql = 'DELETE FROM post where id = :delete_id';
    $stt = $db -> prepare($sql);
    $stt -> bindParam(':delete_id', $id, PDO::PARAM_INT);
    $stt -> execute();
    // 登録完了メッセージの表示
    echo "削除完了";
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