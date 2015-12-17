<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Tray Results</title>
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
    background-color: #e3e3e3;
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
	border: 1px;
	border-collapse: collapse;
  }
  table {
	margin-top: 10em;
	margin-left: 5em;

}
  .ui.piled.segment {
	margin-top: 3em;
	margin-left: 2em;
}

.ui.button {
        background-color: #c9c9c9;
}

  .ui.raised.segment {
	margin-right: 2em;
  background-color: #ffffff;
}

  .ui.segment {
    margin-left: 2em;
    margin-right: 2em;
}

  .ui.header {
    margin-left: 1em;
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
      <a href="./randomTray.php" class="item">Feed Me</a>
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
//Connecting, selecting database
$link = mysqli_connect('localhost','smike','balloon')
        or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'smike') or die('Could not select database.');
$query = "SELECT * from Food where ";
$DH = "";
$item1 = "";
$portion1 = "";
$serve1 = "";
$item2 = "";
$portion2 = "";
$serve2 = "";
$item3 = "";
$portion3 = "";
$serve3 = "";
$item4 = "";
$portion4 = "";
$serve4 = "";
$item5 = "";
$portion5 = "";
$serve5 = "";
$item6 = "";
$portion6 = "";
$serve6 = "";
$item7 = "";
$portion7 = "";
$serve7 = "";
$item8 = "";
$portion8 = "";
$serve8 = "";
$item9 = "";
$portion9 = "";
$serve9 = "";
$item10 = "";
$portion10 = "";
$serve10 = "";

$cal = 0;
$fat = 0;
$pro = 0;
$carb = 0;
$fib = 0;
$chol = 0;
$sfat = 0;
$sod = 0;

if (isset($_POST["DH"])) $DH = $_POST["DH"];

echo "<div class=\"ui grid\">
<div class=\"six wide centered column\">
<div class=\"ui piled segment\">";
echo "<h3 class=\"ui header\">Meal:</h3>";
if (isset($_POST["item1"])) $item1 = $_POST["item1"];

if($item1 != ""){     
	$portion1 = $_POST["portion1"];
	$serve1 = $_POST["serve1"];
        $query = $query . "(DiningHall='$DH' and name='$item1' and portionSize='$portion1') or ";
        echo "<p>$item1\t$portion1\tx$serve1\n</p>";
}
if (isset($_POST["item2"])) $item2 = $_POST["item2"];
if($item2 != ""){     
	$portion2 = $_POST["portion2"];
	$serve2 = $_POST["serve2"];
        $query = $query . "(DiningHall='$DH' and name='$item2' and portionSize='$portion2') or ";
        echo "<p>$item2\t$portion2\tx$serve2\n</p>";
}
if (isset($_POST["item3"])) $item3 = $_POST["item3"];
if($item3 != ""){     
	$portion3 = $_POST["portion3"];
	$serve3 = $_POST["serve3"];
        $query = $query . "(DiningHall='$DH' and name='$item3' and portionSize='$portion3') or ";
        echo "<p>$item3\t$portion3\tx$serve3\n</p>";
}
if (isset($_POST["item4"])) $item4 = $_POST["item4"];
if($item4 != ""){     
	$portion4 = $_POST["portion4"];
	$serve4 = $_POST["serve4"];
        $query = $query . "(DiningHall='$DH' and name='$item4' and portionSize='$portion4') or ";
        echo "<p>$item4\t$portion4\tx$serve4\n</p>";
}
if (isset($_POST["item5"])) $item5 = $_POST["item5"];
if($item5 != ""){     
	$portion5 = $_POST["portion5"];
	$serve5 = $_POST["serve5"];
        $query = $query . "(DiningHall='$DH' and name='$item5' and portionSize='$portion5') or ";
        echo "<p>$item5\t$portion5\tx$serve5\n</p>";
}
if (isset($_POST["item6"])) $item6 = $_POST["item6"];
if($item6 != ""){     
	$portion6 = $_POST["portion6"];
	$serve6 = $_POST["serve6"];
        $query = $query . "(DiningHall='$DH' and name='$item6' and portionSize='$portion6') or ";
        echo "<p>$item6\t$portion6\tx$serve6\n</p>";
}
if (isset($_POST["item7"])) $item7 = $_POST["item7"];
if($item7 != ""){     
	$portion7 = $_POST["portion7"];
	$serve7 = $_POST["serve7"];
        $query = $query . "(DiningHall='$DH' and name='$item7' and portionSize='$portion7') or ";
        echo "<p>$item7\t$portion7\tx$serve7\n</p>";
}
if (isset($_POST["item8"])) $item8 = $_POST["item8"];
if($item8 != ""){     
	$portion8 = $_POST["portion8"];
	$serve8 = $_POST["serve8"];
        $query = $query . "(DiningHall='$DH' and name='$item8' and portionSize='$portion8') or ";
        echo "<p>$item8\t$portion8\tx$serve8\n</p>";
}
if (isset($_POST["item9"])) $item9 = $_POST["item9"];
if($item9 != ""){     
	$portion9 = $_POST["portion9"];
	$serve9 = $_POST["serve9"];
        $query = $query . "(DiningHall='$DH' and name='$item9' and portionSize='$portion9') or ";
        echo "<p>$item9\t$portion9\tx$serve9\n</p>";
}
if (isset($_POST["item10"])) $item10 = $_POST["item10"];
if($item10 != ""){     
	$portion10 = $_POST["portion10"];
	$serve10 = $_POST["serve10"];
        $query = $query . "(DiningHall='$DH' and name='$item10' and portionSize='$portion10') or ";
        echo "<p>$item10\t$portion10\tx$serve10\n</p>
        </div>";
}

echo "</div></div></div>";

$query = substr($query,0,-4);

if (strlen($query) > 25){
  $result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());

        //Printing results in HTML
//echo "<br><div class=\"ui segment\">";
echo "<br><h3 class=\"ui header\">Individual Nutrition:</h3>\n";
echo "<div class=\"ui grid\">
<div class=\"fourteen wide centered column\">";
echo "<table class=\"ui striped table\">\n";
        echo "\t<tr>\n";
        echo "\t<th>Dining Hall</th>\n";
        echo "\t<th>Food</th>\n";
        echo "\t<th>Allergens</th>\n";
        echo "\t<th>Portion Size</th>\n";
        echo "\t<th>Calories</th>\n";
        echo "\t<th>Fat (g)</th>\n";
        echo "\t<th>Protein (g)</th>\n";
        echo "\t<th>Carbs (g)</th>\n";
        echo "\t<th>Fiber (g)</th>\n";
        echo "\t<th>Cholesterol (mg)</th>\n";
        echo "\t<th>Saturated Fat (g)</th>\n";
        echo "\t<th>Sodium (mg)</th>\n";
        echo "\t</tr>\n";
while ($tuple = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "\t<tr>\n";
	$mult = 1;
        if(isset($tuple["name"])){
		if($item1 == $tuple["name"]) $mult = $serve1;
		else if($item2 == $tuple["name"]) $mult = $serve2;
		else if($item3 == $tuple["name"]) $mult = $serve3;
		else if($item4 == $tuple["name"]) $mult = $serve4;
		else if($item5 == $tuple["name"]) $mult = $serve5;
		else if($item6 == $tuple["name"]) $mult = $serve6;
		else if($item7 == $tuple["name"]) $mult = $serve7;
		else if($item8 == $tuple["name"]) $mult = $serve8;
		else if($item9 == $tuple["name"]) $mult = $serve9;
		else if($item10 == $tuple["name"]) $mult = $serve10;
	}
	if(isset($tuple["Calories"])) $cal = $cal + ($tuple["Calories"] * $mult); 
	if(isset($tuple["fat"])) $fat = $fat + ($tuple["fat"] * $mult);
	if(isset($tuple["protein"])) $pro = $pro + ($tuple["protein"] * $mult);
	if(isset($tuple["carbByDiff"])) $carb = $carb + ($tuple["carbByDiff"] * $mult);
	if(isset($tuple["fiber"])) $fib = $fib + ($tuple["fiber"] * $mult);
	if(isset($tuple["cholesterol"])) $chol = $chol + ($tuple["cholesterol"] * $mult);
	if(isset($tuple["satFat"])) $sfat = $sfat + ($tuple["satFat"] * $mult);
	if(isset($tuple["sodium"])) $sod = $sod + ($tuple["sodium"] * $mult);;

	foreach ($tuple as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
        }
}
echo "</table>";
}

echo "</div></div>";

echo "<br><h3 class=\"ui header\">Total Nutrition:</h3>\n";
echo "<div class=\"ui raised segment\">";
echo "<div class=\"ui eight statistics\">";
echo "<div class=\"red statistic\"><div class=\"value\">$cal</div>";
echo "<div class=\"label\">Calories</div></div>";
echo "<div class=\"orange statistic\"><div class=\"value\">$fat </div>";
echo "<div class=\"label\">Fat</div></div>";
echo "<div class=\"yellow statistic\"><div class=\"value\">$pro </div>";
echo "<div class=\"label\">Protein</div></div>";
echo "<div class=\"olive statistic\"><div class=\"value\">$carb</div>";
echo "<div class=\"label\">Carbs</div></div>";
echo "<div class=\"green statistic\"><div class=\"value\">$fib </div>";
echo "<div class=\"label\">Fiber</div></div>";
echo "<div class=\"teal statistic\"><div class=\"value\">$chol </div>";
echo "<div class=\"label\">Cholesterol</div></div>";
echo "<div class=\"blue statistic\"><div class=\"value\">$sfat </div>";
echo "<div class=\"label\">Sat. Fat</div></div>";
echo "<div class=\"violet statistic\"><div class=\"value\">$sod </div>";
echo "<div class=\"label\">Sodium</div></div>";
echo "</div></div>";
?>
</body>

</html>
