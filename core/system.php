<?php
function checkControllerName (string $name) : bool{
  return !!preg_match('/^[a-z0-9-]+$/' ,$name);
}

function template(string $path, array $vars = []) : string{
  $templateFullPath = "views/$path.php";
  extract($vars);
  ob_start();
  include($templateFullPath);
  return ob_get_clean();
}

function parseUrl(string $url, array $routes) : array{
  $res = [
    'controller' => 'e404',
    'params' => []
  ];

  foreach ($routes as $route) {
    $matches = [];

    if(preg_match($route['test'], $url, $matches))
    {
      $res['controller'] = $route['controller'];

      if(isset($route['params']))
      {
      foreach ($route['params'] as $name => $number) {
        $res['params'][$name] = $matches[$number];
        }
      }
      break;
    }
  }
  return $res;
}

function getCannonUrl($url) : string{
  $urlLen = strlen($url);
  if($urlLen > 0 && $url[$urlLen - 1] == '/')
  {
      $url = substr($url, 0, $urlLen - 1);
  }
  return HOST.BASE_URL.$url;
}

 ?>
