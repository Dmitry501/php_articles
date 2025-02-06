<?php

function extractField(array $target, array $fields) : array{
$result = [];

 foreach ($fields as $field) {
   $result[$field] = trim($target[$field]);
 }

 return $result;
}

?>
