<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <script src="js/js_gallery.js"></script>
    <link rel="stylesheet" href="css/photo.css">
</head>

<div class="main">
    <div class="photo">
<!--        <div id="bp" class="bigphoto">-->
<!--        </div>-->
        <div class="smallgroup">
            <div id='sm1' class="smallleft smallphoto">
                <?php
                $dir = 'img/small/';
                $files = array_diff(scandir($dir), array('..', '.'));
                echo("<img src='$dir/$files[2]'>");
                ?>
            </div>
            <div id='sm2' class="smallcenter smallphoto">
                <?php
                echo("<img src='$dir/$files[3]'>");
                ?>
            </div>
            <div id='sm3' class="smallright smallphoto">
                <?php
                echo("<img src='$dir/$files[4]'>");
                ?>
            </div>
        </div>
    </div>

</html>
