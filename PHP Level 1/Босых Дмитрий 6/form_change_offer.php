<?php
    require_once 'server_change_offer.php';
    require_once 'sql_offer_base.php';
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

    <div>"'<?php
            $id = $_GET["id"];
            $sql_offer = "Select * from market_offer_base";
            $res = mysqli_query($link, $sql_offer);
            while ($data = mysqli_fetch_assoc($res)){

                print_r($data['name']);
            }
            ?>'"</div>

    <form class="form" action="server.php" method="POST" enctype="multipart/form-data">
        <span class="desc"> <b>Изменить Имя: </b> </span><br>
        <input placeholder="Введите имя товара" class="form_input"  type="text" name="name"> <br>
        <span class="desc"> <b>Изменить малое описание: </b> </span><br>
        <input placeholder="Введите малое описание" class="form_input"  type="text" name="small_description"> <br>
        <span class="desc"> <b>Изменить полное описание: </b> </span><br>
        <textarea placeholder="Введите полное описание" class="form_input"  type="text" name="description"></textarea> <br>
        <span class="desc"> <b>Изменить цену: </b> </span><br>
        <input placeholder="Введите цену" class="form_input"  type="text" name="price"> <br>
        <span class="desc"> <b>Изменить фото: </b> </span><br>
        <input class="foto_input" type="file" name="userfile"> <br>
        <button type="submit" name="send">ЗАГРУЗИТЬ</button> <br>
        <span lass="desc"><?=$message?></span>
    </form>

</div>
</body>
</html>
