<?php

    include 'abstract_good.php';
    include 'my_trait.php';

    class digitalGood extends Good{

        function __construct($id, $name, $price, $category, $description, $image){
            parent::__construct($id, $name, $price, $category, $description, $image);
            $this->showGoods();
        }

        public function getPrice(){
            $price = parent::PRICE_CONSTANT;
            return $price;
        }

        public function showGoods(){
            echo "<h4>id</h4><br>".$this->id."<br><h4>Товар</h4><br>".$this->name."<br><h4>Категория</h4><br>".$this->category
                ."<br><h4>Фото</h4><br>".$this->image."<br><h4>Описание</h4><br>".$this->description."<br><h4>Цена</h4><br>".$this->getPrice();
        }


        use MyTrait;
    }

    new digitalGood(1 , "Тестовый товар", "", "Цифровой", "Тестовое описание","Фото");