<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/23
 * Time: 16:31
 */
require_once('Smarty.class.php');

$smarty = new Smarty();

$smarty->assign('msg','Hello World!');
$smarty->display('board.tpl');
