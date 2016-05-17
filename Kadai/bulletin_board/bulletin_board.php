<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/17
 * Time: 20:52
 */

require_once 'connect.php';
require_once 'Encode.php';
?>

<html>
<head>
    <title>掲示板１</title>
</head>
<body>

<!--フォームの作成-->
<form method="POST" action="bulletin_board.php">
    名前：<input type="text" name="user_name" size="15" /><br>
    題名：<input type="text" name="title" size="15" /><br><br>
    <textarea name = "contents" cols = "60" rows="5"></textarea><br>
    <input type="submit" value="投稿"　/>
</form>

<!--POSTデータをデータベースに登録-->
    <?php
    try{
        //データベースの接続を確立
        $db = getDb();
        //すでにデータベースにデータが入っている場合はそれを表示する
//        $stt = $db->prepare('SELECT * FROM bulletinboard /*ORDER BY text DESC*/');
//        if($db!=NULL) {
//            $stt->execute();
//            //結果を出力
//            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
//                ?>
<!--                <tr>-->
<!--                    <td>--><?php //e($row['user_name']); ?><!--</td>-->
<!--                    <br>-->
<!--                    <td>--><?php //e($row['title']); ?><!--</td>-->
<!--                    <br>-->
<!--                    <td>--><?php //e($row['contents']); ?><!--</td>-->
<!--                    <br><br>-->
<!--                </tr>-->
<!--                --><?php
//            }
//        }
        //INSERT命令の準備
        $stt = $db->prepare('INSERT INTO  bulletinboard( user_name, title , contents ) VALUES (:user_name, :title, :contents)');
        //INSERT命令にポストデータの内容をセット
        $stt -> bindValue(':user_name', $_POST['user_name']);
        $stt -> bindValue(':title', $_POST['title']);
        $stt -> bindValue(':contents', $_POST['contents']);
        //INSERT命令を実行
        $stt -> execute();
        $stt=NULL;
        $stt = $db->prepare('SELECT * FROM bulletinboard /*ORDER BY text DESC*/');
        $stt->execute();
        //結果を出力
        while($row = $stt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <table style="width: 200px; border: 1px;solid #ff00ff;">

                <tr><td>名前：　<?php e($row['user_name']); ?><br></td></tr>
                <tr><td>題名：　<?php e($row['title']); ?><br></td></tr>
                <tr><td>内容：　<?php e($row['contents']); ?></td></tr><br><br>

                </table>
            <?php
        }
        $db = NULL;
   } catch(PDOException $e) {
        die("エラーメッセージ：{$e->getMessage()}");
    }
    ?>
</body>
</html>
