<?php
include_once "../models/functions.php";
if($_GET[id]){
    $id= $_GET[id];
    offer_delete($link, $id);
    header("Location: ../admin/index.php");
}