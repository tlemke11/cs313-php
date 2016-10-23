<?php
require_once('dbconnection.php'); //include the db


//loop for querying and then displaying all of the subjects housed in the database.

//this is gonna be a trip

  $sql = 'SELECT main_category_id, name FROM main_categories ORDER BY name';
  $mainCats = $connection->query($sql);
  print_r($mainCats);
?>