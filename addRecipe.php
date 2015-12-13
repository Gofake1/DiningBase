<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>New Tray</title>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/site.css">

  <link rel="stylesheet" type="text/css" href="../dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="../dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../dist/components/icon.css">
  

  <style type="text/css">
  body {
    background-color: #acd7d0;
  }
  .main.container {
    margin-top: 15em;
  }
  .very.relaxed.list {
    margin-top: 3em;
    margin-left: 2em;
  }
  .wireframe {
    margin-top: 2em;
  }
  .ui.footer.segment {
    margin: 5em 0em 0em;
    padding: 5em 0em;
  }
  table, th, td{
	border: 1px solid black;
	border-collapse: collapse;
  }
  table {
	margin-top: 10em;
	margin-left: 2em;
}
  .query {
	margin-top: 3em;
	margin-left: 2em;
}
  .ui.raised.segment {
	padding: 5em 5em 5em 5em;
}  
  </style>

</head>

<body>

  <!-- Top Menu -->
  <div class="ui fixed inverted menu">
    <div class="ui container">
      <a href="./index.html" class="item">
        Dining Base
      </a>
      <a href="./foods.php" class="item">Search for Food</a>
      <a href="./addRecipe.php" class="item">Create Tray</a>
<!--      <a href="#" class="ui simple dropdown item">
        Navigate <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item">Add New Recipe</div>
          <div class="item"><a href="./submit.html">Add New Review</a></div>
        </div>
      </a> 
      <div class="ui dropdown">
        <div class="text">Navigate</div>
        <i class="dropdown icon"></i>
        <div class="menu">
          <a href="./foods.php">Search for Foods</a>
          <a href=".">Submit new Recipe</a>
        </div>
      </div>-->
    </div>
  </div>

<?php

$round = 0;
if(isset($_POST["round"])){
 $round=$_POST["round"];
}
if( $round == "0" ){

echo "<br><br><div class=\"query\">\n";
echo "<div class=\"ui rasied segment\">";
echo "<h3>Choose a Dining Hall:</h3>\n<br>\n";
echo "<form action=\"addRecipe.php\" method=\"post\" class=\"ui form\">\n";
echo "Dining Hall: <select name=\"DH\" class=\"ui dropdown\">
<option value=\"\">---</option>
<option value=\"North Dining Hall\">NDH</option>
<option value=\"South Dining Hall\">SDH</option>
</select><br>\n";
echo "<input type=\"hidden\" name=\"round\" value=\"1\">";
echo "<input type=\"submit\" value=\"Next Step\" class=\"ui button\">";
echo "</div>";
echo "</div>";
}

else if( $round == "1" ){
if(isset($_POST["DH"])) $DH = $_POST["DH"];
$query = "SELECT distinct name FROM Food where DiningHall='$DH'";
$link = mysqli_connect('localhost','smike','balloon')
        or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'smike') or die('Could not select database.');
$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
echo "<br><br><div class=\"query\">\n";
echo "<h3>Choose the items you ate:</h3>\n<br>\n";
echo "<form action=\"addRecipe.php\" method=\"post\" class=\"ui form\">";
echo "Item #1: <select name=\"item1\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #2: <select name=\"item2\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #3: <select name=\"item3\" class=\"ui dropdown\">";
echo "<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #4: <select name=\"item4\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #5: <select name=\"item5\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #6: <select name=\"item6\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #7: <select name=\"item7\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #8: <select name=\"item8\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #9: <select name=\"item9\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #10: <select name=\"item10\" class=\"ui dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
echo "<input type=\"hidden\" name=\"round\" value=\"2\">";
echo "<input type=\"hidden\" name=\"DH\" value='$DH'>";
echo "<input type=\"submit\" value=\"Next Step\" class=\"ui button\">";
echo "</div>";

mysqli_free_result($result);
mysqli_close($link);
}

else if($round = "2"){
if(isset($_POST["DH"])) $DH = $_POST["DH"];
if(isset($_POST["item1"])) $item1 = $_POST["item1"];
if(isset($_POST["item2"])) $item2 = $_POST["item2"];
if(isset($_POST["item3"])) $item3 = $_POST["item3"];
if(isset($_POST["item4"])) $item4 = $_POST["item4"];
if(isset($_POST["item5"])) $item5 = $_POST["item5"];
if(isset($_POST["item6"])) $item6 = $_POST["item6"];
if(isset($_POST["item7"])) $item7 = $_POST["item7"];
if(isset($_POST["item8"])) $item8 = $_POST["item8"];
if(isset($_POST["item9"])) $item9 = $_POST["item9"];
if(isset($_POST["item10"])) $item10 = $_POST["item10"];

$link = mysqli_connect('localhost','smike','balloon')
   or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'smike') or die('Could not select database.');

echo "<br><br><div class=\"query\">\n";
echo "<h3>Choose the portion sizes and number of servings:</h3>\n<br>\n";
echo "<form action=\"recipeResults.php\" method=\"post\" class=\"ui form\">\n";
if($item1 != ""){
        $query = "select portionSize from Food where name='$item1' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item1:</h4>
	portion size:  <select name=\"portion1\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve1\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item2 != ""){
        $query = "select portionSize from Food where name='$item2' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item2:</h4>
	portion size:  <select name=\"portion2\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve2\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item3 != ""){
        $query = "select portionSize from Food where name='$item3' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item3:</h4>
	portion size:  <select name=\"portion3\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve3\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item4 != ""){
        $query = "select portionSize from Food where name='$item4' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item4:</h4>
	portion size:  <select name=\"portion4\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve4\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item5 != ""){
        $query = "select portionSize from Food where name='$item5' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item5:</h4>
	portion size:  <select name=\"portion5\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve5\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item6 != ""){
        $query = "select portionSize from Food where name='$item6' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item6:</h4>
	portion size:  <select name=\"portion6\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve6\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item7 != ""){
        $query = "select portionSize from Food where name='$item7' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item7:</h4>
	portion size:  <select name=\"portion7\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve7\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item8 != ""){
        $query = "select portionSize from Food where name='$item8' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item8:</h4>
	portion size:  <select name=\"portion8\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve8\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item9 != ""){
        $query = "select portionSize from Food where name='$item9' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item9:</h4>
	portion size:  <select name=\"portion9\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve9\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}

if($item10 != ""){
        $query = "select portionSize from Food where name='$item10' and DiningHall='$DH'";
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());
	echo "<h4>$item10:</h4>
	portion size:  <select name=\"portion10\" class=\"ui dropdown\">";
	while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
	  $portionSize = $tuple["portionSize"];
	  echo "<option value='$portionSize'>$portionSize</option>";
	}
	echo "</select><br>\n";
	mysqli_free_result($result);
        echo "servings:  <input type=\"number\" name=\"serve10\" value=\"1\" min=\"0\">";
	echo "<br><br>";
}
mysqli_close($link);
echo "<input type=\"hidden\" name=\"DH\" value='$DH'>";
echo "<input type=\"hidden\" name=\"item1\" value='$item1'>";
echo "<input type=\"hidden\" name=\"item2\" value='$item2'>";
echo "<input type=\"hidden\" name=\"item3\" value='$item3'>";
echo "<input type=\"hidden\" name=\"item4\" value='$item4'>";
echo "<input type=\"hidden\" name=\"item5\" value='$item5'>";
echo "<input type=\"hidden\" name=\"item6\" value='$item6'>";
echo "<input type=\"hidden\" name=\"item7\" value='$item7'>";
echo "<input type=\"hidden\" name=\"item8\" value='$item8'>";
echo "<input type=\"hidden\" name=\"item9\" value='$item9'>";
echo "<input type=\"hidden\" name=\"item10\" value='$item10'>";
echo "<input type=\"submit\">";
echo "</div>";
}
?>

</body>

</html>
