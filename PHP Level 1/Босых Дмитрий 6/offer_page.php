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
    <title>Товар</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/normalize.css">
</head>
<body>

<?php
    $id = $_GET["id"];
    $sql_offer = "Select * from market_offer_base where id=$id";
    $res = mysqli_query($link, $sql_offer);
    $sql_popular = "Update market_offer_base SET popular=popular + 1 where id=$id";
    $sql_popular_res = mysqli_query($link, $sql_popular);
        $data = mysqli_fetch_assoc($res);
        $small_description = $data["small_description"];
        $description = $data["description"];
        $img_link = $data["img_path"];
        echo '<div class="offers_page">';
        echo '<h1>' . $small_description . '</h1>';
        echo '<img class="img" src="' . $img_link . '" width="100%" height="100%">';
        echo '<h2>' . $description . '</h2>';
        echo '<h3>Цена <br> ' . $data["price"] . '</h3>';
        echo '<button type="submit" name="offer_to_basket">КУПИТЬ</button>';
        echo '</a></div></div>';
        echo '<a class="back" href=index.php>Вернуться на главную</a>';
?>


</body>
</html>
