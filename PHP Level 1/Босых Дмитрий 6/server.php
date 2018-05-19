<?php

    require_once 'sql_offer_base.php';

//    print_r($_POST);


    function translit($string)
    {
        $translit = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я' => 'ya');

        return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
    }

    function changeImage($h, $w, $src, $newsrc, $type)
    {
        $newimg = imagecreatetruecolor($h, $w);
        switch ($type) {
            case 'jpeg':
                $img = imagecreatefromjpeg($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagejpeg($newimg, $newsrc);
                break;
            case 'png':
                $img = imagecreatefrompng($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagepng($newimg, $newsrc);
                break;
            case 'gif':
                $img = imagecreatefromgif($src);
                imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
                imagegif($newimg, $newsrc);
                break;
        }
    }

    if (isset($_POST['send'])) {
        if ($_FILES['userfile']['error']) {
            $message = 'Ошибка загрузки файла!';
        } elseif ($_FILES['userfile']['size'] > 100000000) {
            $message = 'Файл слишком большой';
        } elseif (
            $_FILES['userfile']['type'] == 'image/jpeg') {
            if (move_uploaded_file($_FILES['userfile']['tmp_name'], 'img/' . translit($_FILES['userfile']['name']))) {
                $img_path = 'img/' . translit($_FILES['userfile']['name']);
                $name = $_POST['name'];
                $description = $_POST['description'];
                $small_description = $_POST['small_description'];
                $price = $_POST['price'];
                $stock = '';
    //            $type = explode('/', $_FILES['userfile']['type'])[1];
    //            changeImage(150, 150, $_FILES['userfile']['tmp_name'], $img_path, $type);
                $sql_in = "INSERT INTO Market_offer_base(name, small_description, description, img_path, price, stock) 
                              VALUES ('$name', '$small_description', '$description', '$img_path', '$price', '$stock')";
                $result = mysqli_query($link, $sql_in);

            } else {
                $message = 'Ошибка загрузки файла!';
            }
        } else {
            $message = 'Не правильный тип файла!';
        }
    }
    $images = array_slice(scandir('img'), 3);


