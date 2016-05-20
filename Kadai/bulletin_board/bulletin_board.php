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
    try {
        //データベースの接続を確立
        $db = getDb();

        //INSERT命令にポストデータの内容をセット
    if (isset($_POST['user_name']) && isset($_POST['title']) && isset ($_POST['contents'])) {
        $stt = $db->prepare('INSERT INTO  bulletinboard( user_name, title , contents ) VALUES (:user_name, :title, :contents)');
        $stt->bindValue(':user_name', $_POST['user_name']);
        $stt->bindValue(':title', $_POST['title']);
        $stt->bindValue(':contents', $_POST['contents']);
        //INSERT命令を実行
        $stt->execute();
        $stt = NULL;
    }

        $stt = $db->prepare('SELECT * FROM bulletinboard');
        $stt->execute();

            //結果を出力
            while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
                ?>

                <table border="1" width="300" height="300">
                    <td height="30" width="50"> 名前</td>
                    <td height="30"> <?php e($row['user_name']); ?></td>
                    <tr>
                        <td height="30" width="50"> 題名</td>
                        <td height="30"><?php e($row['title']); ?></td>
                    </tr>
                    <tr>
                        <td height="240" width="50"> 本文</td>
                        <td height="240"><?php e($row['contents']); ?></td>
                    </tr>
                </table>
                <br><br>
                <?php
            }
            $db = NULL;

    }
    catch
        (PDOException $e) {
            die("エラーメッセージ：{$e->getMessage()}");
        }
    ?>
</body>
</html>
