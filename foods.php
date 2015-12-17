<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Search for Food</title>
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

  <script src="tablesort.js"></script>
  

  <style type="text/css">
  body {
    background-color: #e9ece5;
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
  .ui.raised.segment {
    margin-left: 4em;
    margin-right: 4em;
  }
  table, th, td{
        border:1px;
	border-collapse: collapse;
  }
 
  .ui.collapsing.table {
	margin-top: 8em;
	margin-left: 1em;
        margin-right: 6em;
}
  .query {
	margin-top: 3em;
	margin-left: 4em;
	margin-right: 10em;
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

$DH = "";
$item = "";
$cal = "";
$fat = "";
$pro = "";
$cbd = "";
$fib = "";
$chol = "";
$sfat = "";
$sod = "";
$cal2 = "";
$fat2 = "";
$pro2 = "";
$cbd2 = "";
$fib2 = "";
$chol2 = "";
$sfat2 = "";
$sod2 = "";
//Performing SQL query
if(isset($_POST["DH"]))  $DH=$_POST["DH"];
if(isset($_POST["item"]))  $item=mysql_real_escape_string($_POST["item"]);
if(isset($_POST["cal"]))  $cal=$_POST["cal"];
if(isset($_POST["fat"]))  $fat=$_POST["fat"];
if(isset($_POST["pro"]))  $pro=$_POST["pro"];
if(isset($_POST["cbd"]))  $cbd=$_POST["cbd"];
if(isset($_POST["fib"]))  $fib=$_POST["fib"];
if(isset($_POST["chol"]))  $chol=$_POST["chol"];
if(isset($_POST["sfat"]))  $sfat=$_POST["sfat"];
if(isset($_POST["sod"]))  $sod=$_POST["sod"];
if(isset($_POST["cal2"]))  $cal2=$_POST["cal2"];
if(isset($_POST["fat2"]))  $fat2=$_POST["fat2"];
if(isset($_POST["pro2"]))  $pro2=$_POST["pro2"];
if(isset($_POST["cbd2"]))  $cbd2=$_POST["cbd2"];
if(isset($_POST["fib2"]))  $fib2=$_POST["fib2"];
if(isset($_POST["chol2"]))  $chol2=$_POST["chol2"];
if(isset($_POST["sfat2"]))  $sfat2=$_POST["sfat2"];
if(isset($_POST["sod2"]))  $sod2=$_POST["sod2"];

if($DH !="" || $item !="" || $cal !="" || $fat !="" || $pro !="" || $cbd !="" || $fib !="" || $chol !="" || $sfat !="" || $sod !="" || $cal2 !="" || $fat2 !="" || $pro2 !="" || $cbd2 !="" || $fib2 !="" || $chol2 !="" || $sfat2 !="" || $sod2 !=""){
	$args = 0;
	$query = 'select * from Food where ';
	if($DH !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "DiningHall='$DH'";
		$args = $args + 1;
	}
	if($item !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "name like '%$item%'";
		$args = $args + 1;
	}
	if($cal !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "Calories>='$cal'";
		$args = $args + 1;
	}
	if($pro !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "protein>='$pro'";
		$args = $args + 1;
	}
	if($fat !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "fat>='$fat'";
		$args = $args + 1;
	}
	if($cbd !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "carbByDiff>='$cbd'";
		$args = $args + 1;
	}
	if($fib !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "fiber>='$fib'";
		$args = $args + 1;
	}
	if($chol !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "cholesterol>='$chol'";
		$args = $args + 1;
	}
	if($sfat !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "satFat>='$sfat'";
		$args = $args + 1;
	}
	if($sod !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "sodium>='$sod'";
		$args = $args + 1;
	}
	if($cal2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "Calories<='$cal2'";
		$args = $args + 1;
	}
	if($pro2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "protein<='$pro2'";
		$args = $args + 1;
	}
	if($fat2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "fat<='$fat2'";
		$args = $args + 1;
	}
	if($cbd2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "carbByDiff<='$cbd2'";
		$args = $args + 1;
	}
	if($fib2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "fiber<='$fib2'";
		$args = $args + 1;
	}
	if($chol2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "cholesterol<='$chol2'";
		$args = $args + 1;
	}
	if($sfat2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "satFat<='$sfat2'";
		$args = $args + 1;
	}
	if($sod2 !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "sodium<='$sod2'";
		$args = $args + 1;
	}

} else {
	$query = 'select * from Food';
}



if(isset($_POST["search"])){
	$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());

	//Printing results in HTML
echo "<table class=\"ui celled collapsing table\">\n";
        echo "\t<tr>\n";
        echo "\t<th class=\"center aligned\">Dining Hall</th>\n";
        echo "\t<th>Food</th>\n";
        echo "\t<th>Allergens</th>\n";
        echo "\t<th>Portion Size</th>\n";
        echo "\t<th>Calories</th>\n";
        echo "\t<th>Fat (g)</th>\n";
        echo "\t<th>Protein (g)</th>\n";
        echo "\t<th>Carbohydrates (g)</th>\n";
        echo "\t<th>Fiber (g)</th>\n";
        echo "\t<th>Cholesterol (mg)</th>\n";
        echo "\t<th>Saturated Fat (g)</th>\n";
        echo "\t<th>Sodium (mg)</th>\n";
        echo "\t</tr>\n";
while ($tuple = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "\t<tr>\n";
//	$netid = $tuple["netID"];
//	$DH = $tuple["DiningHall"];
//	$item = $tuple["foodName"];
//	$rating = $tuple["rating"];
//	$review = $tuple["comments"];
        foreach ($tuple as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
        }
//	echo "\t<td><form action=\"deleteReview.php\" method=\"post\"><input type=\"hidden\" name=\"netid\" value=\"$netid\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"DH\" value=\"$DH\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"item\" value=\"$item\" style=\"test-decoration: none\" /><input type=\"submit\" value=\"delete\" /></form></td>";
 
//	echo "\t<td><form action=\"update.php\" method=\"post\"><input type=\"hidden\" name=\"netid\" value=\"$netid\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"DH\" value=\"$DH\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"item\" value=\"$item\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"rating\" value=\"$rating\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"review\" value=\"$review\" style=\"test-decoration: none\" /><input type=\"submit\" value=\"edit\" /></form></td>";
        echo "\t</tr>\n";
}
echo "</table>\n";

//Free resultset
mysqli_free_result($result);

//Closing connection
mysqli_close($link);
}
?>

<br><br>
<div class="query">
<div class="ui raised segment">
<h3>Search for specific food items:</h3>
<br>
<form action="test.php" method="post" class="ui form">
<label>Dining Hall</label> 
<select name="DH" class="ui dropdown">
  <option value="">---</option>
  <option value="North Dining Hall">NDH</option>
  <option value="South Dining Hall">SDH</option>
</select>
<div class="field">
 <label>Item Name</label>
 <input type="text" name="item">
</div>
<h4 class="ui dividing header">Nutritional Content (specify range)</h4>
<div class="field">
 <label>Calories</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="cal" min="0">
  </div> -- 
  <div class="field">
   <input type="number" name="cal2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Fat</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="fat" min="0">
  </div> --
  <div class="field">
   <input type="number" name="fat2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Protein</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="pro" min="0">
  </div> --
  <div class="field">
   <input type="number" name="pro2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Carbohydrates</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="cbd" min="0">
  </div> --
  <div class="field">
   <input type="number" name="cbd2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Fiber</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="fib" min="0">
  </div> --
  <div class="field">
   <input type="number" name="fib2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Cholesterol</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="chol" min="0">
  </div> --
  <div class="field">
   <input type="number" name="chol2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Saturated Fat</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="sfat" min="0">
  </div> --
  <div class="field">
   <input type="number" name="sfat2" min="0">
  </div>
 </div>
</div>
<div class="field">
 <label>Sodium</label>
 <div class="two fields">
  <div class="field">
   <input type="number" name="sod" min="0">
  </div> --
  <div class="field">
   <input type="number" name="sod2" min="0">
  </div>
 </div>
</div>

<!--Fat: <input type="number" name="fat"><br>
Protein: <input type="number" name="pro"><br>
Carbs by Difference: <input type="number" name="cbd"><br>
Fiber: <input type="number" name="fib"><br>
Cholesterol: <input type="number" name="chol"><br>
Saturated Fat: <input type="number" name="sfat"><br>
Sodium: <input type="number" name="sod"><br>-->
<input type="hidden" name="search" value="">
<input type="submit">
</form>
</div>
</div>

<script>
$(document).ready(function() {
  $('table').tablesort();
});
</script>

</body>

</html>
