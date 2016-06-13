<html>
<head>
    <title>ユーザー登録</title>
</head>
<body>

<!--ユーザー登録フォームの作成-->
<br><br>ユーザー登録<br><br>
<form method="POST" action="smarty_register.php">
    <table>
        <td>ユーザーID：</td><td><input type="text" name="user_id" size="15" /></td>
        <tr><td>名前：</td><td><input type="text" name="user_name" size="15" /></td></tr>
        <tr><td>パスワード：</td><td><input type="password" name="password" size="15" /></td></tr>
    </table>
    <input type="submit" value="登録"　/>
</form>

<form action="smarty_board.php">
    <br><input type="submit" value="戻る"　/><br>
</form>

</body>
</html>