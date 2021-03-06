<?php

    require_once "../config/sql_offer_base.php";

    function offer_new($link, $name, $small_description, $description, $img_path, $price, $stock, $popular){

        $t = "INSERT INTO Market_offer_base (name, small_description, description, img_path, price, stock, popular) VALUES ('%s','%s','%s','%s','%s','%s','%s')";

        $sql = sprintf($t, $name, $small_description, $description, $img_path, $price, $stock, $popular);

        $result = mysqli_query($link, $sql);

        if(!$result){
            die(mysqli_error($link));
        }

        return true;
    }

    function offers_all($link){
        $sql_all = "SELECT * FROM Market_offer_base";
        $res = mysqli_query($link, $sql_all);

        if(!$res)
            die(mysqli_error($link));

        $row_cut = mysqli_num_rows($res);
        $offers = array();

        for($i = 0; $i < $row_cut; $i++){
            $row = mysqli_fetch_assoc($res);
            $offers [] = $row;
        }

        return $offers;
    }

    function offers_popular($link){
        $sql_popular = "Select * from Market_offer_base order by popular desc";
        $res = mysqli_query($link, $sql_popular);

        if(!$res)
            die(mysqli_error($link));

        $row_cut = mysqli_num_rows($res);
        $offers = array();

        for($i = 0; $i < $row_cut; $i++){
            $row = mysqli_fetch_assoc($res);
            $offers [] = $row;
        }

        return $offers;
    }


    function offers_get($link, $id){
        $sql_one = sprintf("SELECT * FROM Market_offer_base where id='%d'", (int)$id);
        $res = mysqli_query($link, $sql_one);
        $sql_popular = "Update market_offer_base SET popular=popular + 1 where id=$id";
        $res_pop = mysqli_query($link, $sql_popular);

        if(!$res)
            die(mysqli_error($link));

        $offer = mysqli_fetch_assoc($res);

        return $offer;
    }



//    function addToBasket($link) {
//
//            $b = "INSERT INTO basket_tab (names, qty, sum ) VALUES ('%s','%s','%s')";
//
//            $sql_basket = sprintf($b, $names, $qty, $sum);
//
//            $res = mysqli_query($link, $sql_basket);
//
//            $basket_tab = mysqli_fetch_assoc($res);
//
//        return $basket_tab;
//    }

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
