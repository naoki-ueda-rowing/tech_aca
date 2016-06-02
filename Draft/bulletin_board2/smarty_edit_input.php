<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/01
 * Time: 15:42
 */
require_once 'connect.php';
require_once 'Encode.php';

require_once('Smarty.class.php');

//Smartyというクラスのインスタンスを生成しています。このインスタンスを用いることで、
//PHPからSmartyテンプレートに変数を受け渡したり、
//テンプレートの内容を表示することが出来るようになる
$smarty = new Smarty();