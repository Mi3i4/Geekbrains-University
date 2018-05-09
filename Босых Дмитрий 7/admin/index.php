<?php
    require_once '../config/sql_offer_base.php';
    require_once '../models/functions.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Администрирование товаров</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/normalize.css">
</head>
<main>

    <div class="container">
        <div class="header">
            <div class="logo"></div>
            <div class="menu"></div>
        </div>
        <div class="center">
            <div class="special_offers">
                <h2>RECENT OPEN</h2>
            </div>
            <div class="content">
                <?php
                    $offers = offers_all($link);
                    if($offers){
                        foreach ($offers as $offer){?>
                            <div>
                                <div class="offers">
                                    <h2><?=$offer['name']?></h2>
                                    <img src="<?="../public/".$offer['img_path']?>" width="260px" height="170px">
                                    <h3>Цена <br> <?=$offer['price']?> руб.</h3>
                                </div>
                                   <a href=edit_offer.php?id=<?=$offer['id']?><target="_blank"><button class="red_del"> Редактировать</button></a>
                                   <a href=delete_offer.php?id=<?=$offer['id']?><target="_blank"><button class="red_del">Удалить</button></a>
                            </div>
                        <?}
                    }
                    ?>
            </div>
            <br>
            <div class="basket">
                <h2></h2>
            </div>
        </div>
        <div class="offers_admin">
            <a href="form_in_offer.php" class="add_offer_button">Добавить новый товар</a>
        </div>
        <div class="footer">

        </div>
    </div>
    <footer></footer>
</main>
</html>
