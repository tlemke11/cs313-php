<?php
require_once('dbconnection.php'); //include the db


//loop for querying and then displaying all of the subjects housed in the database.

//this is gonna be a trip

  $main_cat_sql = 'SELECT main_category_id, name FROM main_categories ORDER BY name';
  $sub_cat_sql = "SELECT sub_category_id,name,main_category_id FROM sub_categories WHERE main_category_id=$mainID ORDER BY name";
  $mainID = '';
  $mainCats = $connection->query($sql);
  //http://php.net/manual/en/pdo.query.php
  foreach ($connection->query($main_cat_sql) as $row){
    print $row['main_category_id'] . " ";
    print $row['name'] . "<br>";
    $mainID = $row['main_category_id'];
    
  foreach ($connection->query($sub_cat_sql) as $row){
      print $row['sub_category_id'] . " ";
      print $row['name'] . "<br>";
    }
  }

?>