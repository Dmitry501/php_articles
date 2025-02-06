<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $login = trim($_POST['login']);
      $password = trim($_POST['password']);
      $remember = isset($_POST['remember']);

      $errors = validateUserData($login, $password);

      if(empty($errors))
  		{
  		    $user = getUserByLogin($login);
          if($user != false && password_verify($password, $user['password']))
          {
            $token = substr(bin2hex(random_bytes(128)), 0, 128);
            sessionsAdd($user['id_user'], $token);
            $_SESSION['token'] = $token;
            if($remember)
            {
              setcookie('token',$token, time() + 3600 * 24 * 30, BASE_URL);
            }
            header('Location: ' . BASE_URL);
            exit();
          }
          else {
            $errors [] = "Неправильный логин или пароль";
            $user = null;
          }
  		}


  }
else {
		$errors = [];
	}

  $pageTitle = "login";
  $pageContent = template("auth/v_login",[
		'errors' => $errors
	]);

?>
