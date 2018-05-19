<?php
    require_once 'sql_offer_base.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Интернет-магазин</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/normalize.css">
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
                    $sql_offer = "Select * from market_offer_base order by popular desc";
                    $res = mysqli_query($link, $sql_offer);
                    if(mysqli_num_rows($res)>0){
                        while ($data = mysqli_fetch_assoc($res)){
                            $res_popular = mysqli_query($link, $sql_popular);
                            $img_link = $data["img_path"];
                            echo '<div class="offers_popular">';
                            echo '<h3>'.$data['name'].'</h3>';
                            echo '<a href=offer_page.php?id='.$data["id"].' target="_blank"><img src="'.$img_link.'" width="160px" height="100px">';
                            echo '<h4>Цена <br> '.$data["price"].' руб.'.'</h4>';
                            echo '<button type="submit" name="offer_to_basket">КУПИТЬ</button>';
                            echo '</a></div>';
                        }
                    }
                ?>

            </div>
            <div class="content">

                <?php
                    $sql_offer = "Select * from market_offer_base";
                    $res = mysqli_query($link, $sql_offer);
                    if(mysqli_num_rows($res)>0) {
                        while ($data = mysqli_fetch_assoc($res)) {
                            $img_link = $data["img_path"];
                            echo '<div class="offers">';
                            echo '<h2>'.$data['name'].'</h2>';
                            echo '<a href=offer_page.php?id='.$data["id"].' target="_blank"><img src="'.$img_link.'" width="260px" height="170px">';
                            echo '<h3>Цена <br> '.$data["price"].' руб.'.'</h3>';
                            echo '<button type="submit" name="offer_to_basket">КУПИТЬ</button>';
                            echo '</a></div>';
                        }
                    }else {
                        echo "Изображений не найдено";
                    }
                ?>
            </div>
            <div class="basket">
                <h2>Корзина</h2>
            </div>
        </div>
        <div class="footer">

        </div>
    </div>

</main>
</html>
