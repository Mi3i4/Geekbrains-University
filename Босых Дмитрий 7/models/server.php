<?php

    require_once '../config/sql_offer_base.php';
    require_once '../models/functions.php';

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

    if(isset($_POST['send'])){
        $id = $_POST['id'];
        $img_path = 'img/' . translit($_FILES['userfile']['name']);
        $name = trim(strip_tags($_POST['name']));
        $description = trim(strip_tags($_POST['description']));
        $small_description = trim(strip_tags($_POST['small_description']));
        $price = (int)trim(strip_tags($_POST['price']));
        $stock = (bool)$_POST['stock'];

        $filePath  = $_FILES['userfile']['tmp_name'];
        $fileName  = translit($_FILES['userfile']['name']);
        $type = $_FILES['userfile']['type'];
        $size = $_FILES['userfile']['size'];

        if($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif'){
            if($size>0 and $size<100000000){
                if(move_uploaded_file($filePath,"../public/img/" . $fileName)){
//                    changeImage(260, 170, $_FILES['userfile']['tmp_name'], $img_path, $type);
                    if(isset($_POST['edit'])){
                        $id = (int)trim(strip_tags($_POST['edit']));
                        offer_change($link, $id, $name, $small_description, $description, $img_path, $price, $stock);
                        header("Location: ../admin/index.php");
                    }else{
                        $popular = 0;
                        offer_new($link, $name, $small_description, $description, $img_path, $price, $stock, $popular);
                        header("Location: ../admin/index.php");
                    }

                    $message = "<h3>Файл успешно загружен на сервер</h3>";
                }else{
                    $message = "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>";
                    exit;
                }
            }else{
                $message = "<b>Ошибка - картинка превышает 1 Мб.</b>";
            }
        }else{
            $message = "<b>Картинка не подходит по типу! Картинка должна быть в формате JPEG, PNG или GIF</b>";
        }
    }

//    if (isset($_POST['send'])) {
//        if ($_FILES['userfile']['error']) {
//            $message = 'Ошибка загрузки файла!';
//        } elseif ($_FILES['userfile']['size'] > 100000000) {
//            $message = 'Файл слишком большой';
//        } elseif (
//            $_FILES['userfile']['type'] == 'image/jpeg') {
//            if (move_uploaded_file($_FILES['userfile']['tmp_name'], '../public/img/' . translit($_FILES['userfile']['name']))) {
//                $img_path = 'img/' . translit($_FILES['userfile']['name']);
//                $name = $_POST['name'];
//                $description = $_POST['description'];
//                $small_description = $_POST['small_description'];
//                $price = $_POST['price'];
//                $stock = '';
//    //            $type = explode('/', $_FILES['userfile']['type'])[1];
//    //            changeImage(150, 150, $_FILES['userfile']['tmp_name'], $img_path, $type);
//                $sql_in = "INSERT INTO Market_offer_base(name, small_description, description, img_path, price, stock)
//                              VALUES ('$name', '$small_description', '$description', '$img_path', '$price', '$stock')";
//                $result = mysqli_query($link, $sql_in);
//
//            } else {
//                $message = 'Ошибка загрузки файла!';
//            }
//        } else {
//            $message = 'Не правильный тип файла!';
//        }
//    }
//    $images = array_slice(scandir('img'), 3);


