<?php
    include '../models/function.php';
    include '../Twig/Autoloader.php';
    Twig_Autoloader::register();

    try {

        $loader = new Twig_Loader_Filesystem('../templates');

        $twig = new Twig_Environment($loader);

        $template = $twig->loadTemplate('big_img.tmpl');

        echo $template->render(array(
            'offer'=> $offer
        ));

    }   catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
    }
