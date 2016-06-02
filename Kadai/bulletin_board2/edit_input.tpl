<html>
<head>
    <title>投稿の編集</title>
</head>
<body>
編集<br>
{*更新フォームの作成*}
 <form action=smarty_edit.php method=post>
     <textarea name = contents cols = 60 rows = 5 >{$contents}</textarea><br />
     <input type=hidden name=id value={$id}>
     <input type=submit value=更新>
 </form>

<form action="smarty_board.php">
    <br><input type="submit" value="戻る"　/><br>
</form>


</body>
</html>