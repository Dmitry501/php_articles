<?php

return [
[
  'test' => '/^\/?$/',
  'controller' => 'all'
],
[
  'test' => '/^add\/?$/',
  'controller' => 'add'
],
[
  'test' => '/^article\/([1-9]+\d*)\/?$/',
  'controller' => 'article',
  'params' => ['id' => 1]
],
[
  'test' => '/^delete\/([1-9]+\d*)\/?$/',
  'controller' => 'delete',
  'params' => ['id' => 1]
],
[
  'test' => '/^edit\/([1-9]+\d*)\/?$/',
  'controller' => 'edit',
  'params' => ['id' => 1]
],
[
  'test' => '/^login\/?$/',
  'controller' => 'login'
],
[
  'test' => '/^logout\/?$/',
  'controller' => 'logout'
],
[
  'test' => '/^register\/?$/',
  'controller' => 'register'
]
];

 ?>
