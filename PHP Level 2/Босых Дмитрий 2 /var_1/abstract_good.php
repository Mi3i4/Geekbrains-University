<?php

    abstract class Good{
        var $id;
        var $name;
        var $price;
        var $category;
        var $description;
        var $image;

        const PRICE_CONSTANT = 1000;

        public function __construct($id, $name, $price, $category, $description, $image){
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->category = $category;
            $this->description = $description;
            $this->image = $image;
        }

        abstract function getGoods();
        abstract function getPrice();
        abstract function showGoods();
        abstract function sortGoods();
        abstract function newGoods();
    }
