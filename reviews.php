<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>My Reviews</title>
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
    background-color: #FFFFFF;
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
	margin-top: 3em;
	margin-left: 2em;
}
  .query {
	margin-top: 3em;
	margin-left: 2em;
}
  
  </style>

</head>

<body>

  <!-- Top Menu -->
  <div class="ui fixed inverted menu">
    <div class="ui container">
      <div href="#" class="header item">
        Dining Base
      </div>
      <a href="#" class="ui simple dropdown item">
        Navigate <i class="dropdown icon"></i>
        <div class="menu">
          <div class="item">Add New Recipe</div>
          <div class="item"><a href="./submit.html">Add New Review</a></div>
        </div>
      </a>
    </div>
  </div>

<?php
//Connecting, selecting database
$link = mysqli_connect('localhost','smike','balloon')
        or die('Could not connect: ' . mysql_error());
mysqli_select_db($link, 'smike') or die('Could not select database.');

$netid = "";
$DH = "";
$item = "";
$rating = "";
//Performing SQL query
if(isset($_POST["netid"]))  $netid=$_POST["netid"];
if(isset($_POST["DH"]))  $DH=$_POST["DH"];
if(isset($_POST["item"]))  $item=$_POST["item"];
if(isset($_POST["rating"]))  $rating=$_POST["rating"];

if($netid !="" || $DH !="" || $item !="" || $rating !=""){
	$args = 0;
	$query = 'select * from Review where ';
	if($netid !=""){
		$query = $query . "netID = '$netid'";
		$args = $args + 1;
	}
	if($DH !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "DiningHall='$DH'";
		$args = $args + 1;
	}
	if($item !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "foodName='$item'";
		$args = $args + 1;
	}
	if($rating !=""){
		if($args>0) $query = $query . " and ";
		$query = $query . "rating=$rating";
		$args = $args + 1;
	}

} else {
	$query = 'select * from Review';
}

$result = mysqli_query($link,$query) or die('Query failed: ' . mysql_error());

//Printing results in HTML
echo "<table>\n";
        echo "\t<tr>\n";
        echo "\t<th>User</th>\n";
        echo "\t<th>Dining Hall</th>\n";
        echo "\t<th>Item</th>\n";
        echo "\t<th>Rating</th>\n";
        echo "\t<th>Review</th>\n";
        echo "\t</tr>\n";
while ($tuple = mysqli_fetch_array($result, MYSQL_ASSOC)) {
        echo "\t<tr>\n";
	$netid = $tuple["netID"];
	$DH = $tuple["DiningHall"];
	$item = $tuple["foodName"];
	$rating = $tuple["rating"];
	$review = $tuple["comments"];
        foreach ($tuple as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
        }
	echo "\t<td><form action=\"deleteReview.php\" method=\"post\"><input type=\"hidden\" name=\"netid\" value=\"$netid\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"DH\" value=\"$DH\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"item\" value=\"$item\" style=\"test-decoration: none\" /><input type=\"submit\" value=\"delete\" /></form></td>";
 
	echo "\t<td><form action=\"update.php\" method=\"post\"><input type=\"hidden\" name=\"netid\" value=\"$netid\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"DH\" value=\"$DH\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"item\" value=\"$item\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"rating\" value=\"$rating\" style=\"test-decoration: none\" /><input type=\"hidden\" name=\"review\" value=\"$review\" style=\"test-decoration: none\" /><input type=\"submit\" value=\"edit\" /></form></td>";
        echo "\t</tr>\n";
}
echo "</table>\n";

//Free resultset
mysqli_free_result($result);

//Closing connection
mysqli_close($link);
?>

<br><br>
<div class="query">
<h3>Search for specific reviews:</h3>
<br>
<form action="reviews.php" method="post">
netid: <input type="text" name="netid"><br>
Dining Hall: <select name="DH">
<option value="">---</option>
<option value="NDH">NDH</option>
<option value="SDH">SDH</option>
</select> <br>
Item: <input type="text" name="item"><br>
Rating: <input type="number" name="rating" min="0" max="10"><br>
<input type="submit">
</div>

</body>

</html>
