<?php

    require_once '../config/db_config.php';

    function goods($link){
        $sql = "select * from Market_offer_base";
        $res = mysqli_query($link, $sql);

        $row_cut = mysqli_num_rows($res);
        $offers = array();

        for ($i = 0; $i < $row_cut; $i++) {
            $row = mysqli_fetch_assoc($res);
            $offers [] = $row;
        }
        return $offers;
    }

    $offers = goods($link);
//    print_r($offers);

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

