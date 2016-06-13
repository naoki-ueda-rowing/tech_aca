<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/06/03
 * Time: 20:04
 */
require_once('Smarty.class.php');

class MySmarty extends Smarty {
    /**
     *  MySmarty Constructor
     *
     *
     */

    public function __construct() {
        parent::__construct(); //親クラス初期化
        $this->escape_html     = true;

    }
}
