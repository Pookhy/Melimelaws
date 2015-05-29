<?php

require_once "php/dB/connectDb.php";
require_once 'php/functions/AutoLoader.php';
$loader = new AutoLoader;
$loader->register();

session_start();
$response = new Controller\Response();
$request = new Controller\Request($_GET, $_POST, $_FILES);
$controller = new Controller\FrontController($db, $request);


$infos = $controller->run($request, $response);

if ($request->isXhr()) {
    echo $infos->getPart('content');
} else {
    ob_start();
    require_once ($infos->getPart("squelette"));
    $contents = ob_get_contents();
    ob_end_clean();
    echo $contents;
}
?>