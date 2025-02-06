<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);

    $errors = validateRegistrationData($login, $password, $email, $name);
    if(empty($errors))
    {
      registerUser($login, $password, $email, $name);
      $_SESSION['register'] = true;
      header('Location: ' . BASE_URL);
    }
  }
else {
		$errors = [];
	}

  $pageTitle = "register";
  $pageContent = template("auth/v_register",[
		'errors' => $errors
	]);



 ?>
