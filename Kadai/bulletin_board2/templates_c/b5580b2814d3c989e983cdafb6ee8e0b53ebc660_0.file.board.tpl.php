<?php
/* Smarty version 3.1.28, created on 2016-06-04 13:04:35
  from "C:\xampp\htdocs\tech_aca\Kadai\bulletin_board2\templates\board.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.28',
  'unifunc' => 'content_5752d1e3b03ab9_44071586',
  'file_dependency' => 
  array (
    'b5580b2814d3c989e983cdafb6ee8e0b53ebc660' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tech_aca\\Kadai\\bulletin_board2\\templates\\board.tpl',
      1 => 1465045467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5752d1e3b03ab9_44071586 ($_smarty_tpl) {
?>
<html>
<head>
    <title>掲示板２</title>
</head>
<body>


<?php if (isset($_smarty_tpl->tpl_vars['session_name']->value)) {?>
    <br><br>ようこそ<?php echo $_smarty_tpl->tpl_vars['session_name']->value;?>
さん！
<!--ログインしているときのみログアウトボタンの作成-->
<form action="smarty_logout.php">
    <br><input type="submit" value="ログアウト" 　/><br>
</form>
<!--ログイン時のみ投稿フォームの作成-->
本文<br>
<form method="POST" action="smarty_board.php">
    <textarea name = "contents" cols = "60" rows="5"></textarea><br>
    <input type="submit" value="投稿"　/>
</form>


<?php } else { ?>
    ユーザー登録またはログインしてください<br><br>
<!--ログインしていないときのみユーザー登録ボタンの作成-->
<form action= "smarty_registration.php">
    <input type="submit" value="ユーザー登録"　/><br>
</form>
<!--ログインしていないときのみ、ログインボタンの作成-->
<form action="smarty_login.php">
    <input type="submit" value="ログイン"　/><br>
</form>


<?php }?>




<?php if (isset($_smarty_tpl->tpl_vars['session_id']->value)) {?>


    <?php
$_from = $_smarty_tpl->tpl_vars['result']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_results_0_saved_item = isset($_smarty_tpl->tpl_vars['results']) ? $_smarty_tpl->tpl_vars['results'] : false;
$_smarty_tpl->tpl_vars['results'] = new Smarty_Variable();
$__foreach_results_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_results_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['results']->value) {
$__foreach_results_0_saved_local_item = $_smarty_tpl->tpl_vars['results'];
?>

<table border="1" width="300" height="300">
    <td height="30" width="50">[<?php echo $_smarty_tpl->tpl_vars['results']->value['id'];?>
]</td>
    <td height="30">

　　　　
        <?php if ($_smarty_tpl->tpl_vars['results']->value['user_id'] == $_smarty_tpl->tpl_vars['session_id']->value) {?>
        <table>
        <td>
            <form  method = "post" action=smarty_edit_input.php>
            <input type = hidden name = id value = <?php echo $_smarty_tpl->tpl_vars['results']->value['id'];?>
>
            <input type="submit" value="編集 "/>
            </form>
        </td>
            <td>
            <form  method = "post" action= smarty_delete.php>
            <input type = hidden name = id value = <?php echo $_smarty_tpl->tpl_vars['results']->value['id'];?>
>
            <input type="submit" value="削除 "/><br>
            </form>
            </td>
        </table>

        <?php }?>


    </td>
    <tr>
        <td height="30" width="50"> 名前</td>
        <td height="30"><?php echo $_smarty_tpl->tpl_vars['results']->value['name'];?>
</td>
    </tr>
    <tr>
        <td height="240" width="50"> 本文</td>
        <td height="240"><?php echo $_smarty_tpl->tpl_vars['results']->value['contents'];?>
</td>
    </tr>
</table>
<br><br>
    <?php
$_smarty_tpl->tpl_vars['results'] = $__foreach_results_0_saved_local_item;
}
}
if ($__foreach_results_0_saved_item) {
$_smarty_tpl->tpl_vars['results'] = $__foreach_results_0_saved_item;
}
}?>

</body>
</html><?php }
}
