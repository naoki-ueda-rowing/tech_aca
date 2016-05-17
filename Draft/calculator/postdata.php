<html>
<head>
<title>ポストデータ</title>
        </head>
        <body>

<!---->
<form method="POST" action="postdata.php">
<input type="text" name="number1" size="15" />
    <input type="checkbox" name="cal" value="+"/>+
    <input type="checkbox" name="cal" value="-"/>-
    <input type="checkbox" name="cal" value="×"/>×
    <input type="checkbox" name="cal" value="÷"/>÷
    <input type="text" name="number2" size="15" />
<input type="submit" value="="　/>
</form>
<?php
if(isset($_POST['number1'])==' '&&isset($_POST['cal'])==' ') {
//postデータをvar_dump
print "postデータをvar_dump<br />\n";
var_dump($_POST);

print "<br  />\n";
print "<br  />\n";

//ローカル変数にポストデータを格納
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
//print $number1;
//print $number2;

    print "計算結果<br />\n";
    print "var_dump=\n";
}
//計算
if(isset($_POST['cal'])==' ') {
    switch ($_POST['cal']) {
        case '+';
            $calc = $number1 + $number2;
            var_dump($calc);
            print "<br  />\n";
            print"$number1+$number2=$calc";
            break;
        case '-';
            $calc = $number1 - $number2;
            var_dump($calc);
            print "<br  />\n";
            print"$number1-$number2=$calc";
            break;
        case '×';
            $calc = $number1 * $number2;
            var_dump($calc);
            print "<br  />\n";
            print"$number1×$number2=$calc";
            break;
        case '÷';
            if ($number2 != 0) {
                $calc = $number1 / $number2;
                var_dump($calc);
                print "<br  />\n";
                print"$number1÷$number2=$calc";
            } else {
                print "<br  />\n";
                print "error";
            }
            break;

    }
}

/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/09
 * Time: 11:38
 */
?>
</body>
</html>
