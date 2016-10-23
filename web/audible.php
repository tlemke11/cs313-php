<?php
require_once('dbconnection.php'); //include the db


//loop for querying and then displaying all of the subjects housed in the database.

//this is gonna be a trip

  $sql = 'SELECT main_category_id, name FROM main_categories ORDER BY name';
  $mainCats = $connection->query($sql);
  //http://php.net/manual/en/pdo.query.php
  foreach ($connection->query($sql) as $row) {
    print $row['main_category_id'] . " ";
    print $row['name'] . "<br>";
  }
  print_r($mainCats);
?>