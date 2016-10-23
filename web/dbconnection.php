<?php
//PDO connection to the Audible DB


//Example of how to do the connection - https://devcenter.heroku.com/articles/cleardb#using-cleardb-with-php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];

try {
  $connection = new PDO("mysql:host=$server;dbname=heroku_bdda429b65ee5d8", $username, $password);
  }
  
  catch (PDOException $ex){
    echo "Error connecting to the Database: " . $ex->getMessage();
  }
?>
