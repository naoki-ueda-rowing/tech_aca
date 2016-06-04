<?php
/* Smarty version 3.1.28, created on 2016-06-04 12:52:33
  from "C:\xampp\htdocs\tech_aca\Kadai\bulletin_board2\templates\registration.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5752cf11b4cbc9_75438003',
  'file_dependency' => 
  array (
    'af18e37f29d36a35c2e27293f5e0b81999b0e9ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech_aca\\Kadai\\bulletin_board2\\templates\\registration.tpl',
      1 => 1465044752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5752cf11b4cbc9_75438003 ($_smarty_tpl) {
?>
<html>
<head>
    <title>ユーザー登録</title>
</head>
<body>

<!--ユーザー登録フォームの作成-->
<br><br>ユーザー登録<br><br>
<form method="POST" action="smarty_registration.php">
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
</html><?php }
}
