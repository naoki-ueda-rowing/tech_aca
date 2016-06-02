<html>
<head>
    <title>ユーザーログイン</title>
</head>
<body>

<!--ログインフォームの作成-->
<br><br>ログイン<br><br>
<form method="POST" action="smarty_login.php">
    ユーザーID：<input type="text" name="user_id" size="15" /><br>
    パスワード：<input type="text" name="password" size="15" /><br><br>
    <input type="submit" value="ログイン"　/>
</form>

<form action="smarty_board.php">
    <br><input type="submit" value="戻る"　/><br>
</form>

</body>
</html>