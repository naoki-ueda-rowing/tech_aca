<html>
<head>
    <title>ユーザー登録</title>
</head>
<body>

<!--ユーザー登録フォームの作成-->
<br><br>ユーザー登録<br>
<form method="POST" action="smarty_touroku.php">
    ユーザーID：<input type="text" name="user_id" size="15" /><br>
    名前：　　　　<input type="text" name="user_name" size="15" /><br>
    パスワード：<input type="text" name="password" size="15" /><br><br>
    <input type="submit" value="登録"　/>
</form>

<form action="smarty_board.php">
    <br><input type="submit" value="戻る"　/><br>
</form>

</body>
</html>