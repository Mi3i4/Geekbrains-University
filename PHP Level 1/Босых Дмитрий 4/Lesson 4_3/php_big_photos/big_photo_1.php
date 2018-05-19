<?php
    $dir = '../img/big';
    $big_files = array_diff(scandir($dir), array('..', '.'));
    echo("<img style='width: 1200px; height: 500px' src='$dir/$big_files[2]'>");
?>