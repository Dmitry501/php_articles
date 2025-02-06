<?php

function sessionsAdd(int $idUser, string $token) : bool
{
  $params = ['id_user' => $idUser, 'token' => $token];
  $sql = "INSERT sessions (id_user, token) VALUES (:id_user, :token)";
  dbQuery($sql, $params);
  return true;
}

function sessionsGet(string $token){
  $params = ['token' => $token];
  $sql = "SELECT * FROM sessions WHERE token = :token";
  $query = dbQuery($sql, $params);
  $session = $query->fetch();
  if($session !== false)
  {
    return $session;
  }
  else {
    return null;
  }
}

 ?>
