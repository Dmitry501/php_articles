<?php

session_start();
include_once('init.php');
$user = authGetUser();


$routes = include('routes.php');
$url = $_GET['querySystemUrl'] ?? ''; // считали юрл
$routerRes = parseUrl($url, $routes); // разделили контроллер и параметры
$pageTitle = "404 NOT FOUND";
$pageContent = "";


define('URL_PARAMS', $routerRes['params']);

$controllerName = $routerRes['controller']; // получение имени контроллера
$controllerPath = "controllers/$controllerName.php";

if(strpos($_SERVER['REQUEST_URI'], BASE_URL.'index.php') === 0)
{
    $controllerPath = "controllers/e404.php";
}

$urlCanonical = getCannonUrl($url);

include_once($controllerPath);


$html = template('base/v_main', [
	'title' => $pageTitle,
	'content' => $pageContent,
  'urlCanonical' => $urlCanonical,
  'user' => $user
]);

echo $html;



?>
