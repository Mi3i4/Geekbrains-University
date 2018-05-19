<?php
    $dir = '../img/big';
    $big_files = array_diff(scandir($dir), array('..', '.'));
    echo("<img src='$dir/$big_files[4]'>");
?>