<?php

    include 'function.php';
    include '../config/db_config.php';

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

