<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="photo.css">
    <script src="jquery-3.3.1.js"></script>
    <script src="js_gallery.js"></script>
</head>
<body>
<div class="smallgroup">
    <div id='sm1'>
        <?php
        $dir = 'img/small';
        $files = array_diff(scandir($dir), array('..', '.'));
        echo("<img src='$dir/$files[2]'>");
        ?>
    </div>
    <div id='sm2'>
        <?php
        echo("<img src='$dir/$files[3]'>");
        ?>
    </div>
    <div id='sm3'>
        <?php
        echo("<img src='$dir/$files[4]'>");
        ?>
    </div>
</div>

<div id="modal_form"><!-- Сaмo oкнo -->
    <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть -->
    <!-- Тут любoе сoдержимoе -->
</div>
<div id="overlay"></div><!-- Пoдлoжкa -->
</body>
</html>