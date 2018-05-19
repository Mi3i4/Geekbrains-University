<?php
    require_once '../config/sql_offer_base.php';
    require_once '../models/functions.php';
//    require_once 'js/basket_js.js';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<main>
    <div class="container">
        <div class="header">
            <div class="logo"></div>
            <div class="menu"></div>
        </div>
        <div class="center">
            <div class="special_offers">
                <h2>Популярные товары</h2>
                <?php
                    $offers = offers_popular($link);
                    if($offers){
                        foreach ($offers as $offer){?>
                <div class="offers_popular">
                    <h3><?=$offer['name']?></h3>
                    <a href=offer_page.php?id=<?=$offer['id']?> target="_blank"><img src="<?=$offer['img_path']?>" width="190px" height="130px">
                        <h4>Цена <br> <?=$offer['price']?> руб.</h4>
                        <button type="submit" name="offer_to_basket">КУПИТЬ</button>
                    </a></div>
                <?}
                }
                ?>
            </div>
            <div class="content">
                <?php
                    $offers = offers_all($link);
                    if($offers){
                        foreach ($offers as $offer){?>
                            <div>
                                <div class="offers">
                                <h2><?=$offer['name']?></h2>
                                <a href=offer_page.php?id=<?=$offer['id']?> target="_blank"><img src="<?=$offer['img_path']?>" width="260px" height="170px">
                                <h3>Цена <br> <?=$offer['price']?> руб.</h3>
                                </a>
                            </div>
                                    <form action="index.php" method="post">
                                        <button type="submit" name="to_basket" class="buyme">КУПИТЬ</button>
                                    </form>
                            </div>
                        <?}
                    }
                ?>
            </div>
            <div class="basket">
                <h2>Корзина</h2>
                <?php
//                    if (isset($_POST['to_basket'])){
//                                $offers_basket = offers_all($link);
//                                foreach ($offers_basket as $offer) {
//                                    $name_offers = $offer['name'];
//                                    $price_basket = $offer['price'];
//                                    $id_offer_basket = $offer['id'];
//                                    $x = "INSERT INTO basket_tab(name_offers, price_basket) VALUES ('%s','%s')";
//                                    $sql = sprintf($x, $name_offers, $price_basket);
//                                    $res = mysqli_query($link, $sql);
//                                }
//                                $x = "Select * from basket_tab";
//                                $res = mysqli_query($link, $sql);
//                                $data = mysqli_fetch_assoc($res);
//                                echo json_encode($data);

//                    }
                ?>
        </div>
    </div>
    <footer></footer>
</main>
</html>
