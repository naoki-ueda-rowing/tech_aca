<html>
<head>
<title>ポストデータ</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Naoki
 * Date: 2016/05/09
 * Time: 12:09
 */

//postデータをvar_dump
var_dump($_POST);

//ローカル変数にポストデータを格納
$number1=$_POST['number1'];
$number2=$_POST['number2'];
print $number1;
print $number2;

//計算
switch($_POST['cal']){
 case '+';
     $calc=$number1+$number2;
     print $calc;
        break;
    case '-';
        $calc=$number1-$number2;
        print $calc;
        break;
    case '×';
        $calc=$number1*$number2;
        print $calc;
        break;
    case '÷';
        $calc=$number1/$number2;
        print $calc;
        break;

}

?>
</body>
</html>
