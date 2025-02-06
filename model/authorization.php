<?php
function validateUserData(&$login, &$password)
{
  $errors = [];
  if($login === '' || $password === ''){
    $errors [] = 'Заполните все поля!';
  }
  if(mb_strlen($login, 'UTF-8') < 5)
  {
    $errors [] = 'Логин не короче 5 символов';
  }
  $login = htmlspecialchars($login);
  $password = htmlspecialchars($password);
  return $errors;
}

function validateRegistrationData(&$login, &$password, &$email, &$name)
{
  $errors = [];
  if($login === '' || $password === '' || $email === '' || $name === ''){
    $errors [] = 'Заполните все поля!';
    return $errors;
  }
  if(mb_strlen($login, 'UTF-8') < 5)
  {
    $errors [] = 'Логин не короче 5 символов';
  }
  if(mb_strlen($password, 'UTF-8') < 6)
  {
    $errors [] = 'пароль не короче 6 символов';
  }
  if(!preg_match('/^[a-zA-Z]+$/' ,$name))
  {
    $errors [] = 'В имени только буквы';
  }
  if(!isLoginFree($login))
  {
    $errors [] = 'Данный логин уже занят';
  }

  $login = htmlspecialchars($login);
  $password = htmlspecialchars($password);
  $email = htmlspecialchars($email);
  $name = htmlspecialchars($name);
  return $errors;
}

function getUserByLogin(string $login){
  $params = ['login' => $login];
  $sql = "SELECT id_user, password FROM users WHERE login = :login";
  $query = dbQuery($sql, $params);
  $user = $query->fetch();
  if($user !== false)
  {
    return $user;
  }
  else {
    return null;
  }
}

function getUserById(int $id_user){
  $params = ['id_user' => $id_user];
  $sql = "SELECT id_user, login, email, name FROM users WHERE id_user = :id_user";
  $query = dbQuery($sql, $params);
  $user = $query->fetch();
  if($user !== false)
  {
    return $user;
  }
  else {
    return null;
  }
}

function isLoginFree($login)
{
  $params = ['login' => $login];
  $sql = "SELECT * FROM users WHERE login = :login";
  $query = dbQuery($sql, $params);
  $user = $query->fetch();
  if($user !== false)
  {
    return false;
  }
  else {
    return true;
  }
}

function registerUser($login, $password, $email, $name)
{
  $params = ['login' => $login, 'password' => password_hash($password, PASSWORD_BCRYPT), 'email' => $email, 'name' => $name];
  $sql = "INSERT INTO users (`login`, `password`, `email`, `name`)
  VALUES (:login, :password, :email, :name)";
  $query = dbQuery($sql, $params);
  $user = $query->fetch();

}

 ?>
