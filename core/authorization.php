<?php

function authGetUser(){
  $token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
  if($token !== null)
  {
    $session = sessionsGet($token);
    if($session !== null)
    {
      $user = getUserById($session['id_user']);
    }

    if($user === null)
    {
      unset($_SESSION['token']);
      setcookie('token','', time() - 1, BASE_URL);
    }
    return $user;
  }
  else {
    return null;
  }
}


 ?>
