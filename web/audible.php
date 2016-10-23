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
    <div id="container">
      <h1>Audible Daily Deal Selector</h1>
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
            $subID = $rows['sub_category_id'];
            $subName = $rows['name'];
            print "<input type='checkbox' name='subCats' value='$subID-$subName'><strong>$subName</strong><br>";
          }
          print "<br>";
        }
        ?>
        <br>
        Email:<input type="email" name="email">
        <br>
        <input type="submit" value="Submit">
      </form>
    </div>

  <div id="footer">
    Copyright Tyler Lemke 2016
  <div>
  </body>
</html>