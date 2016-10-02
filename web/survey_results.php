<?php
  session_start();
  //set file name
  $fileToOpen = "voting.txt";
  $newData = "";

if (isset($_POST) && !empty($_POST)) //http://stackoverflow.com/questions/13045279/if-isset-post
{

  $_SESSION["voted"] = 1;

  //http://www.w3schools.com/php/php_ajax_poll.asp
  $data = file($fileToOpen); //load file contents
  
  $newData = explode(" ", $data[0]);
  
  //iterate through the array to inject new answers --http://stackoverflow.com/questions/14245588/php-iterate-through-post-and-use-values-by-name
  
  foreach ($_POST as $item => $itemValue)
  {
    if($item && $item != "submit")
    {
      $newData[$itemValue]++; //increment that selected item
    }
  }
  
  //implode - http://stackoverflow.com/questions/8557774/what-is-the-opposite-of-explode-function
  $finalData = implode(" ", $newData);
  
  //write back to file
  $fileToChange  = fopen($fileToOpen,'w');//tells it which to open and that we are writting to it.
  fputs($fileToChange, $finalData); //now writes it
  fclose($fileToChange);//closes the file write
  
}
  $dataLoad = file($fileToOpen); //load file contents
  
  $data = explode(" ", $dataLoad[0]);
?>
<!DOCTYPE HTML>
<html>
  <head>
  <link ref="stylsheet" type="css/txt" href="stylesheet.css">
  </head>
  <body>
    <div id="container">
      <h1>Survey Results:</h2>
      <br><br>
      <h2>What is your favorite pet?</h2>
      <br>
      <p>
        Dog:<?php echo $data[0]; print_r($newData); ?>
        Cat:<?php echo $data[1]; ?>
        None:<?php echo $data[2]; ?>
      </p>
      <br><br>
      <h2>What is your favorite car?</h2>
      <br>
      <p>
        Lambo:<?php echo $data[3]; ?>
        Honda:<?php echo $data[4]; ?>
        Bike:<?php echo $data[5]; ?>
      </p>
      <br><br>
      <h2>What is your favorite place?</h2>
      <p>
        Beach:<?php echo $data[6]; ?>
        House:<?php echo $data[7]; ?>
        Mountain:<?php echo $data[8]; ?>
      </p>
      <br><br>
      <h2>What is your favorite dessert?</h2>
      <p>
        Cake:<?php echo $data[9]; ?>
        Pie:<?php echo $data[10]; ?>
        Donut:<?php echo $data[11]; ?>
      </p>
    </div>
  </body>
</html>