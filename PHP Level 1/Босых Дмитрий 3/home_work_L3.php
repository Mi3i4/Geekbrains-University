<?php

//Задание 1

echo "Задание 1 <br><br>";

    $i = 0;

    while ($i <= 100) {
        if ($i % 3 == 0) {
            echo $i;
        }
        $i++;
    }

echo "<br><br>";

//Задание 2

echo "Задание 2 <br><br>";

    $i = 0;
    echo "$i - это ноль <br>";
    $i = 1;
    do {
        if ($i % 2 == 0) {
            echo "$i - это четное число <br>";
        } else {
            echo "$i - это нечетное число <br>";
        }
        $i++;
    } while ($i <= 10);

echo "<br><br>";

//Задание 3

    echo "Задание 3 <br><br>";


    $area['Московская обл.'] = [
        'city 1' => 'Москва',
        'city 2' => 'Зеленоград',
        'city 3' => 'Клин',
    ];
    $area['Ленинградская обл.'] = [
        'city 1' => 'Санкт-Петербург',
        'city 2' => 'Великий Новгород',
        'city 3' => 'Кингисепп',
    ];
    $area['Краснодарский край'] = [
        'city 1' => 'Краснодар',
        'city 2' => 'Сочи',
        'city 3' => 'Новороссийск',
    ];
    var_dump($area);

echo "<br><br>";

//Задание 4 и 9

echo "Задание 4,5 и 9 <br><br>";

function translit($str)
{
    $str = (string)$str;
    $str = preg_replace("/\s+/", '_', $str);
    $str = mb_strtolower($str, 'UTF-8');
    $letter = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ж' => 'j', 'з' => 'z',
        'и' => 'i', 'й' => 'ii', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ce', 'ч' => 'ch', 'ш' => 'sh',
        'щ' => 'sch', 'ъ' => '\'', 'ы' => 'y', 'ь' => '6', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya'];
    $str = strtr($str, $letter);
    return $str;
}

    echo translit('Добро пожаловать в объектив нашей камеры');

echo "<br><br>";

//Задание 6

echo "Задание 6 <br><br>";
//        $array_menu = ['home', 'archive', 'contact'];
//        $array_sub_menu = ['about', 'news', 'map'];
//        for ($i = 0; $i < count($array_menu); $i++) {
//            echo "<ul>";
//            echo("<li><a href='#'>$array_menu[$i]</a></li>");
//            echo "</ul>";
//        }

//        $array_sub_menu['home'] = ['sub 1' => 'about'];
//        $array_sub_menu['archive'] = ['sub 1' => 'news'];
//        $array_sub_menu['contact'] = ['sub 1' => 'map'];

//        foreach ($array_sub_menu as $index => $val) {
//            echo "<ul><li><a href='#'>" . $index . "</a>";
//            foreach ($val as $value){
//                    echo "<ul><li><a href='#'>" . $value . "</a></li></ul>";
//            }
//            echo "</ul></li>";
//        }


echo "<br><br>";

//Задание 7

echo "Задание 7 <br><br>";

    for ($i = 0; $i <= 9; $i++) echo $i;

echo "<br><br>";

//Задание 8

echo "Задание 8 <br><br>";

    $key = 'К';

    foreach ($area as $index => $val) {
        echo "<h4>" . $index . "</h4>";
        foreach ($val as $value){
            if ($value[0] . $value[1] == $key){
                echo $value;
            }
        }
    }

echo "<br><br>";






































