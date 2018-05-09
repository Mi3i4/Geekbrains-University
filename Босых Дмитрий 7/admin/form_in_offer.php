<?php
    require_once '../models/server.php';
//    require_once '../models/functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление товара в базу</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="header">
    <div class="logo"></div>
    <div class="menu"></div>
</div>
<div class="add_offer_page">
    <div class="add_foto">

        <form class="form" name="add_offer" action="../models/server.php" method="POST" enctype="multipart/form-data">
                <span class="desc"> Добавить Имя: </span><br>
                <input placeholder="Введите имя товара" class="form_input"  type="text" name="name"> <br>
                <span class="desc"> Добавить малое описание: </span><br>
                <input placeholder="Введите малое описание" class="form_input"  type="text" name="small_description"> <br>
                <span class="desc"> Добавить полное описание: </span><br>
                <textarea placeholder="Введите полное описание" class="form_input"  type="text" name="description"></textarea> <br>
                <span class="desc"> Добавить цену: </span><br>
                <input placeholder="Введите цену" class="form_input"  type="text" name="price"> <br>
                <span class="desc"> Добавить фото: </span><br>
                <input class="foto_input" type="file" name="userfile"> <br>
                <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
                <span class="desc"><?=$message?></span>
        </form>

    </div>
</div>
</body>
</html>
