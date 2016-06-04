<html>
<head>
    <title>ユーザーログイン</title>
</head>
<body>

<!--ログインフォームの作成-->
<br><br>ログイン<br><br>
<form method="POST" action="smarty_login.php">
    <table>
    <td>ユーザーID：</td><td><input type="text" name="user_id" size="15" /></td>
    <tr><td>パスワード：</td><td><input type="password" name="password" size="15" /></td></tr>
    </table>
    <input type="submit" value="ログイン"　/>
</form>

<form action="smarty_board.php">
    <br><input type="submit" value="戻る"　/><br>
</form>

</body>
</html>