<?php

    include '../models/function.php';
    include '../Twig/Autoloader.php';
    Twig_Autoloader::register();

    try {

        $loader = new Twig_Loader_Filesystem('../templates');

        $twig = new Twig_Environment($loader);

        $template = $twig->loadTemplate('img.tmpl');

        echo $template->render(array(
            'offers'=> $offers
        ));

    }   catch (Exception $e) {
        die ('ERROR: ' . $e->getMessage());
    }


