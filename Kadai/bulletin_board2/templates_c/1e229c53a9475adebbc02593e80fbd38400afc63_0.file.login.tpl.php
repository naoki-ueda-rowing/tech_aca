<?php
/* Smarty version 3.1.28, created on 2016-06-04 12:54:37
  from "C:\xampp\htdocs\tech_aca\Kadai\bulletin_board2\templates\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5752cf8d1bbbd0_04527345',
  'file_dependency' => 
  array (
    '1e229c53a9475adebbc02593e80fbd38400afc63' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech_aca\\Kadai\\bulletin_board2\\templates\\login.tpl',
      1 => 1465044872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5752cf8d1bbbd0_04527345 ($_smarty_tpl) {
?>
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
</html><?php }
}
