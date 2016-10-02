<?php
session_start();
if (isset($_SESSION["voted"])){
  header("Location: /survey_results.php");
}
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link ref="stylsheet" type="css/txt" href="stylesheet.css">
  </head> 
  <body>
    <div id="container">
      <form action="survey_results.php" method="POST">
        <h1>Please take our quick survey:</h2>
        <br><br>
        <h2>What is your favorite pet?</h2>
        <br>
        <input type="radio" name="pet" value="0" >Dog</input>
        <br>
        <input type="radio" name="pet" value="1" >Cat</input>
        <br>
        <input type="radio" name="pet" value="2" >None</input>
        <br><br>
        <h2>What is your favorite car?</h2>
        <br>
        <input type="radio" name="car" value="3" >Lambo</input>
        <br>
        <input type="radio" name="car" value="4" >Honda</input>
        <br>
        <input type="radio" name="car" value="5" >Bike</input>
        <br><br>
        <h2>What is your favorite place?</h2>
        <br>
        <input type="radio" name="place" value="6" >Beach</input>
        <br>
        <input type="radio" name="place" value="7" >House</input>
        <br>
        <input type="radio" name="place" value="8" >Mountain</input>
        <br><br>
        <h2>What is your favorite dessert?</h2>
        <br>
        <input type="radio" name="dessert" value="9" >Cake</input>
        <br>
        <input type="radio" name="dessert" value="10" >Pie</input>
        <br>
        <input type="radio" name="dessert" value="11" >Donut</input>
        <br><br>
        <input type="submit" name="submit" value = "Submit Survey">
        <br>
        <a href="/survey_results.php">Just take me to the Voting Results</a>
      </form>
    </div>
  </body>
</html>