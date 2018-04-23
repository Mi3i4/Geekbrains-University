<?php

//Задание 1

echo "Задание 1 <br><br>";

	$a=rand();
	$b=rand();

	if($a>=0 && $b>=0){
      echo $a-$b;
	}
	elseif($a<0 && $b<0){
      echo $a*$b;
	}
	else{
      echo $a+$b;
	}

	echo '<br><br>';

// Задание 2

echo "Задание 2 <br><br>";

    $a=rand(0,15);
    echo "a=  $a <br>";
    switch($a){
        case 0:
            echo $a++;
        case 1:
            echo $a++;
        case 2:
            echo $a++;
        case 3:
            echo $a++;
        case 4:
            echo $a++;
        case 5:
            echo $a++;
        case 6:
            echo $a++;
        case 7:
            echo $a++;
        case 8:
            echo $a++;
        case 9:
            echo $a++;
        case 10:
            echo $a++;
        case 11:
            echo $a++;
        case 12:
            echo $a++;
        case 13:
            echo $a++;
        case 14:
            echo $a++;
        case 15:
            echo $a++;
}

echo '<br><br>';

// Задание 3

echo "Задание 3 <br><br>";

 function sum($a,$b){
    $z=$a+$b;
    return $z;
 }
	echo sum(5,8);

	echo '<br>';

 function res($a,$b){
    $z=$a-$b;
    return $z;
 }
	echo res(2,3);

	echo '<br>';

 function mult($a,$b){
    $z=$a*$b;
    return $z;
 }
	echo mult(7,2);

	echo '<br>';

 function seg($a,$b){
    $z=$a/$b;
    return $z;
 }
	echo seg(10,5);

	echo '<br><br>';

	// Задание 4

echo "Задание 4 <br><br>";

  function mathOperation($arg1,$arg2,$operation){

		switch($operation){
			case 1:
				$result=$arg1+$arg2;
				break;

			case 2:
				$result=$arg1-$arg2;
				break;

			case 3:
				$result=$arg1*$arg2;
				break;

			case 4:
				$result=$arg1/$arg2;
				break;
		}

		return $result;
  }
	echo mathOperation(10,15,3);

	echo '<br><br>';

// Задание 6

echo "Задание 6 <br><br>";

    function power ($val,$pow) {
        if ($val == 0) {
            return 0;
        } else {
            if ($pow == 0) {
                return 1;
            } elseif ($pow == 1) {
                return $val;
            } elseif ($pow == -1) {
                return 1 / $val;
            } else {
                if ($pow > 1) {
                    return $val * power($val, $pow - 1);
                } else {
                    return 1 / $val * power($val, $pow * (-1) - 1);
                }
            }
        }
    }

   echo power(3,3);

echo '<br><br>';

// Задание 7

echo "Задание 7 <br><br>";

    $a=date("G");
        echo $a;
    if (($a%10)==1 && $a!=11){
        echo " час ";
    }
        elseif (($a%10)>=2 && ($a%10)<=4 && (($a>12 && $a>14) || ($a>=2 && $a<=4))){
            echo " часа ";
    }
        else echo " часов ";
    $b=date("i");
        echo $b;
    if (($b%10)==1 && $b!=11){
            echo " минута";
    }
        else if (($b%10)>=2 && ($b%10)<=4 && (($b>12 && $b>14) || ($b>=2 && $b<=4))){
            echo " минуты";
    }
        else echo " минут";
?>


































