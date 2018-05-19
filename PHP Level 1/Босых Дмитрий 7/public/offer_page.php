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
    <title>Товар</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>

<?php
    if(isset($_GET[id])){$id= $_GET[id];}
    $offer = offers_get($link, $id);?>
         <div class="offers_page">
         <h1><?=$offer['small_description']?></h1>
         <img class="img" src="<?=$offer['img_path']?>" width="100%" height="100%">
         <h2><?=$offer['description']?></h2>
         <h3>Цена <br><?=$offer['price']?> </h3>
         <button type="submit" name="offer_to_basket">КУПИТЬ</button>
         </a></div></div>;
         <a class="back" href=index.php>Вернуться на главную</a>

<footer></footer>
</body>
</html>
