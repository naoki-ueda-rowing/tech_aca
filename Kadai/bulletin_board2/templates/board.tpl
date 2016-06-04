<html>
<head>
    <title>掲示板２</title>
</head>
<body>

{*ログイン状態のチェック*}
{if isset($session_name)}
    <br><br>ようこそ{$session_name}さん！
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


{else}
    ユーザー登録またはログインしてください<br><br>
<!--ログインしていないときのみユーザー登録ボタンの作成-->
<form action= "smarty_registration.php">
    <input type="submit" value="ユーザー登録"　/><br>
</form>
<!--ログインしていないときのみ、ログインボタンの作成-->
<form action="smarty_login.php">
    <input type="submit" value="ログイン"　/><br>
</form>


{/if}



{*ログイン時のみ掲示板の内容を表示する*}
{if isset($session_id)}

{*掲示板の内容の表示*}
    {foreach $result as $results}

<table border="1" width="300" height="300">
    <td height="30" width="50">[{$results.id}]</td>
    <td height="30">

　　　　{*ログイン者のみが編集・削除可能*}
        {if $results.user_id == $session_id}
        <table>
        <td>
            <form  method = "post" action=smarty_edit_input.php>
            <input type = hidden name = id value = {$results.id}>
            <input type="submit" value="編集 "/>
            </form>
        </td>
            <td>
            <form  method = "post" action= smarty_delete.php>
            <input type = hidden name = id value = {$results.id}>
            <input type="submit" value="削除 "/><br>
            </form>
            </td>
        </table>

        {/if}


    </td>
    <tr>
        <td height="30" width="50"> 名前</td>
        <td height="30">{$results.name}</td>
    </tr>
    <tr>
        <td height="240" width="50"> 本文</td>
        <td height="240">{$results.contents}</td>
    </tr>
</table>
<br><br>
    {/foreach}
{/if}

</body>
</html>