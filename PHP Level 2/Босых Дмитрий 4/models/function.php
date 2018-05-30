<?php

    require_once '../config/db_config.php';

    function translit($string){
        $translit = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я' => 'ya');

        return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
    }

    function changeImage($h, $w, $src, $newsrc, $type){
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

    function goodsLimit($link){

        $start = ($_POST['start'])?$_POST['start']:0;
        $end = ($_POST['end'])?$_POST['end']:0;

        $sql = "select * from Market_offer_base limit $start offset $end";
        $res = mysqli_query($link, $sql);

        $row_cut = mysqli_num_rows($res);
        $offers = array();

        for ($i = 0; $i < $row_cut; $i++) {
            $row = mysqli_fetch_assoc($res);
            $offers [] = $row;
        }
        return $offers;
    }

    $offers = goodsLimit($link);


//    function goods($link){
//        $sql = "select * from Market_offer_base";
//        $res = mysqli_query($link, $sql);
//
//        $row_cut = mysqli_num_rows($res);
//        $offers = array();
//
//        for ($i = 0; $i < $row_cut; $i++) {
//            $row = mysqli_fetch_assoc($res);
//            $offers [] = $row;
//        }
//        return $offers;
//    }
//
//    $offers = goods($link);
////    print_r($offers);

    function offers_get($link, $id){
        $sql_one = sprintf("SELECT * FROM Market_offer_base where id='%d'", (int)$id);
        $res = mysqli_query($link, $sql_one);
//        $sql_popular = "Update Market_offer_base SET popular=popular + 1 where id=$id";
//        $res_pop = mysqli_query($link, $sql_popular);

        if(!$res)
            die(mysqli_error($link));

        $offer = mysqli_fetch_assoc($res);

        return $offer;
    }

    if(isset($_GET['id'])){$id= $_GET['id'];}
    $offer = offers_get($link, $id);
//    print_r($offer);


    function offer_new($link, $name, $small_description, $description, $img_path, $price, $stock, $popular){

        $t = "INSERT INTO Market_offer_base (name, small_description, description, img_path, price, stock, popular) VALUES ('%s','%s','%s','%s','%s','%s','%s')";

        $sql = sprintf($t, $name, $small_description, $description, $img_path, $price, $stock, $popular);

        $result = mysqli_query($link, $sql);

        if(!$result){
            die(mysqli_error($link));
        }

        return true;
    }

    function offer_delete($link, $id){
        $id = (int)$id;

        if($id == 0)
            return false;

        $sql_del = sprintf("DELETE FROM Market_offer_base where id='%d'", (int)$id);
        $res = mysqli_query($link, $sql_del);

        if(!$res)
            die(mysqli_error($link));

        return mysqli_affected_rows($link);
    }

    function offer_change($link, $id, $name, $small_description, $description, $img_path, $price, $stock){
        $id = (int)$id;

        $s = "UPDATE Market_offer_base SET name='%s', small_description='%s',description='%s',img_path='%s', price='%s', stock='%s' WHERE id='%d'";

        $sql_change  = sprintf($s, $name, $small_description, $description, $img_path, $price, $stock, $id);

        $res = mysqli_query($link, $sql_change);

        if(!$res)
            die(mysqli_error($link));

        return mysqli_affected_rows($link);
    }
