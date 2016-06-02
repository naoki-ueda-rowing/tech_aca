<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/11
 * Time: 18:27
 */
function e($str,$charset='utf-8'){
    print htmlspecialchars($str,ENT_QUOTES,$charset);
}