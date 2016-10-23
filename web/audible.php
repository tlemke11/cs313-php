<?php
require_once('dbconnection.php'); //include the db


//loop for querying and then displaying all of the subjects housed in the database.

//this is gonna be a trip

  $main_cat_sql = 'SELECT main_category_id, name FROM main_categories ORDER BY name';
  $sub_cat_sql = "SELECT sub_category_id,name,main_category_id FROM sub_categories WHERE main_category_id=117 ORDER BY name";
  $mainID = '';
 
  //http://php.net/manual/en/pdo.query.php
  foreach ($connection->query($main_cat_sql) as $row){
    print $row['main_category_id'] . " ";
    print $row['name'] . "<br>";
    $mainID = $row['main_category_id'];
    
    //http://stackoverflow.com/questions/15385965/php-pdo-with-foreach-and-fetch
    //See your common sense's answer
    $subArray = $connection->prepare($sub_cat_sql);
    $subArray->execute();
    $subCats = $subArray->fetchAll();
    
    foreach ($subCats as $rows){
        print $rows['sub_category_id'] . " ";
        print $rows['name'] . "<br>";
      } 
  }
?>