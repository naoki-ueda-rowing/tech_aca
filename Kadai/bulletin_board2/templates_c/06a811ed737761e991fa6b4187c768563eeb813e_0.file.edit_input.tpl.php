<?php
/* Smarty version 3.1.28, created on 2016-06-04 13:02:15
  from "C:\xampp\htdocs\tech_aca\Kadai\bulletin_board2\templates\edit_input.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5752d157258c30_73353686',
  'file_dependency' => 
  array (
    '06a811ed737761e991fa6b4187c768563eeb813e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech_aca\\Kadai\\bulletin_board2\\templates\\edit_input.tpl',
      1 => 1464935811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5752d157258c30_73353686 ($_smarty_tpl) {
?>
<html>
<head>
    <title>投稿の編集</title>
</head>
<body>
編集<br>

 <form action=smarty_edit.php method=post>
     <textarea name = contents cols = 60 rows = 5 ><?php echo $_smarty_tpl->tpl_vars['contents']->value;?>
</textarea><br />
     <input type=hidden name=id value=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
>
     <input type=submit value=更新>
 </form>

<form action="smarty_board.php">
    <br><input type="submit" value="戻る"　/><br>
</form>


</body>
</html><?php }
}
