<?php
require_once('dbconnection.php'); //include the db

//quieries
$main_cat_sql = 'SELECT main_category_id, name FROM main_categories ORDER BY name';
$sub_cat_sql = "SELECT sub_category_id,name,main_category_id FROM sub_categories WHERE main_category_id=:mainID ORDER BY name";
$mainID = '';

?>

<html>
  <head>
    <title>Audible Daily Deal Selector</title>
    <link rel="stylesheet" type="css/txt" href="stylesheet.css">
  </head>
  <body>
    <form action="signup.php">

      <?php //This isn't super-clean - hopefully I can make it cleaner later
      //http://php.net/manual/en/pdo.query.php
      foreach ($connection->query($main_cat_sql) as $row){
        $mainID = $row['main_category_id'];
        $mainName = $row['name'];
   
        print "<input type='checkbox' name='mainCats' value='$mainID-$mainName'><strong>$mainName</strong><br>";
        
        //http://stackoverflow.com/questions/15385965/php-pdo-with-foreach-and-fetch
        //See your common sense's answer
        $subArray = $connection->prepare($sub_cat_sql);
        $subArray->bindParam(':mainID', $mainID, PDO::PARAM_INT);
        $subArray->execute();
        $subCats = $subArray->fetchAll();
          
        foreach ($subCats as $rows){
          print $rows['sub_category_id'] . " ";
          print $rows['name'] . "<br>";
        }
        print "<br>";
      }
      ?>
      <br>
      Email:<input type="email" name="email">
      <input type="submit value="Submit">
    </form>


  </body>
</html>