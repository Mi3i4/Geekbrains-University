<?php
function sum($a,$b){
    $z=$a+$b;
    return $z;
}
echo sum(5,8);

echo '<br>';

function res($a,$b){
    $z=$a-$b;
    return $z;
}
echo res(2,3);

echo '<br>';

function mult($a,$b){
    $z=$a*$b;
    return $z;
}
echo mult(7,2);

echo '<br>';

function seg($a,$b){
    $z=$a/$b;
    return $z;
}
echo seg(10,5);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление товара в базу</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="calculator">
    <h2>Калькулятор</h2><br>
    <form class="form" action="server.php" method="POST" enctype="multipart/form-data">
        <input placeholder="Введите число a" class="form_input"  type="text" name="a"> <br>
        <input placeholder="Введите число b" class="form_input"  type="text" name="b"> <br>
        <h3>Выберите операцию</h3>
        <select>
            <option form >Сложение</option>
            <option form>Вычитание</option>
            <option form>Умножение</option>
            <option form>Деление</option>
        </select>
        <button type="submit" name="answer">Ответ</button> <br>
    </form>

</div>
</body>
</html>
