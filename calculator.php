<html>
<head>
<title>電卓</title>
        </head>
        <body>
        <?php
        print  "数値を入力してください<br />\n";
        ?>

<!--数値を入力するボックスを作成-->

<form method="POST" action="calculator.php">
<input type="text" name="number1" size="15" />
    <input type="radio" name="cal" value="+"/>+
    <input type="radio" name="cal" value="-"/>-
    <input type="radio" name="cal" value="×"/>×
    <input type="radio" name="cal" value="÷"/>÷
    <input type="text" name="number2" size="15" />
<input type="submit" value="="　/>
</form>


<!--入力されたデータをもとにして計算を行う-->
<?php

//ポストデータが与えられているときのみ処理を行う
if(isset($_POST['number1'])==' '&&isset($_POST['number2'])&&isset($_POST['cal'])==' ') {
//ローカル変数にポストデータを格納
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $operator = $_POST['cal'];

//計算する-----------------------------------------------
    print "計算結果<br />\n";
    switch ($operator) {
        case '+';
            $calc = $number1 + $number2;
            print"$number1 +$number2 = $calc";
            break;
        case '-';
            $calc = $number1 - $number2;
            print"$number1 - $number2 = $calc";
            break;
        case '×';
            $calc = $number1 * $number2;
            print"$number1 × $number2 = $calc";
            break;
        case '÷';
            //分母が０以外のときのみ処理を行う
            if ($number2 != 0) {
                $calc = $number1 / $number2;
                print"$number1 ÷ $number2 = $calc";
            } else {
                print "error:分母に０を入れることはできません。";
            }
            break;

    }
}

?>
</body>
</html>
