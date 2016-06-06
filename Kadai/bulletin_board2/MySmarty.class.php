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
     * @param string $dir  テンプレート ディレクトリ
     *
     */

    function MySmarty() {
        $this->Smarty();
        $this->escape_html     = true;

    }
}
