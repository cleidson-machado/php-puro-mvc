<?php

//CRIA-FILTRA-REDIRECIONA URLS...
require_once 'app/Util/UrlRouterUtil.php';

//VIEW CONTROLLERS...
require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErrorController.php';

//FOR USING TWIG TEMPLATE FOR VIEW HTML PAGES
require_once 'vendor/autoload.php';

$template = file_get_contents('app/ViewTemplate/basicWebDesign.html');

ob_start();

    $urlDefault = new UrlRouterUtil;
    $urlDefault->redirectAndResolver($_GET);

    $saida = ob_get_contents();

ob_end_clean();

$template_pronto = str_replace('{{area_dinamica}}', $saida, $template );

// var_dump($saida); 

// echo $template;

echo $template_pronto;

?>