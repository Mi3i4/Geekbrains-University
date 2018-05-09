<?php
    require_once '../models/server.php';
    require_once '../models/functions.php';
    if($_GET['id']){
        $id = (int)($_GET['id']);
        $offer = offers_get($link, $id);
    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Изменение товара</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<div class="header">
    <div class="logo"></div>
    <div class="menu"></div>
</div>
<div class="add_offer_page">
    <div class="add_foto">

        <form class="form" action="../models/server.php" method="POST" enctype="multipart/form-data">
                <span class="desc"> Изменить Имя: </span><br>
                <input  class="form_input"  type="text" name="name" value="<?=$offer["name"]?>"> <br>
                <span class="desc"> Изменить малое описание: </span><br>
                <input class="form_input"  type="text" name="small_description" value="<?=$offer["small_description"]?>"> <br>
                <span class="desc"> Изменить полное описание: </span><br>
                <textarea class="form_input"  type="text" name="description"><?=$offer["description"]?></textarea> <br>
                <span class="desc"> Изменить цену: </span><br>
                <input class="form_input"  type="number" name="price" value="<?=$offer["price"]?>"> <br>
                <span class="desc"> Изменить фото: </span><br>
                <img src="<?="../public/".$offer['img_path']?>" width="260px" height="180px"><br>
                <input class="foto_input" type="file" name="userfile"> <br>
                <input type="hidden" name="edit" value="<?=$offer['id']?>">
                <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
                <span lass="desc"><?=$message?></span>
        </form>

    </div>
</div>
</body>
</html>
