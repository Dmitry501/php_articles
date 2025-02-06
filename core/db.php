<?php

  function dbConnect(){
    static $db;
    if($db === null)
    {
      $db = new PDO('mysql:host=localhost;dbname=php4', 'root', '',[
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      ]);
    }
    $db->exec('SET NAMES UTF8');
    return $db;
  }

  function dbQuery($sql, $params = []){
    $db = dbConnect(); // подключились к бд
    $query = $db->prepare($sql); // сформировали запрос SQL с масками
    $query->execute($params); // загрузили маски и выполнили запрос*
    dbCheckError($query);
    return $query;
  }

  function dbCheckError($query){
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE){
      echo $errInfo[2];
      exit();
    }

    return true;
  }
 ?>
