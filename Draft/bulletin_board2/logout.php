<html>
<head>
    <title>ログアウト</title>
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/31
 * Time: 14:51
 */
session_start();

if (isset($_SESSION["USERID"])) {
    $errorMessage = "ログアウトしました。";
    header("Location: bulletin_board2.php");
}
else {
    $errorMessage = "セッションがタイムアウトしました。";
}
// セッション変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();
?>

</body>
</html>
