<?php
    require_once 'server.php';
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
<div class="add_foto">

    <form class="form" action="server.php" method="POST" enctype="multipart/form-data">
            <span class="desc"> <b>Добавить Имя: </b> </span><br>
            <input placeholder="Введите имя товара" class="form_input"  type="text" name="name"> <br>
            <span class="desc"> <b>Добавить малое описание: </b> </span><br>
            <input placeholder="Введите малое описание" class="form_input"  type="text" name="small_description"> <br>
            <span class="desc"> <b>Добавить полное описание: </b> </span><br>
        <textarea placeholder="Введите полное описание" class="form_input"  type="text" name="description"></textarea> <br>
            <span class="desc"> <b>Добавить цену: </b> </span><br>
            <input placeholder="Введите цену" class="form_input"  type="text" name="price"> <br>
            <span class="desc"> <b>Добавить фото: </b> </span><br>
            <input class="foto_input" type="file" name="userfile"> <br>
            <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
            <span lass="desc"><?=$message?></span>
    </form>

</div>
</body>
</html>
