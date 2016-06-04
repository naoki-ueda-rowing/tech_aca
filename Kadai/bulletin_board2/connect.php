<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/11
 * Time: 17:56
 */
function getDb()
{
    $dsn = 'mysql:dbname=techaca; host=127.0.0.1';
    $usr = 'root';
    $passwd = 'hksyones33';

    try {
        $db = new PDO($dsn, $usr, $passwd);
        $db->exec('SET NAMES utf8');
        //print 'データベースに接続成功';
    } catch (PDOException $e) {
        $db = NULL;
        die("接続エラー：{$e->getMessage()}");
    }
    return $db;
}
