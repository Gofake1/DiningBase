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
        </div>
      </a>
    </div>
  </div>

  <!-- List of reviews -->
 <!-- <div class="ui very relaxed list">
    <div class="item">
      <div class="content">
        <div class="header">Perogies are gr8</div>
        <div class="description">SDH | Perogies | 10/27/2015 | 8/10</div>
      </div>
    </div>
    <div class="item">
      <div class="content">
        <div class="header">This pie brings me life</div>
	<div class="description">NDH | Pumpkin Pie | 10/26/2015 | 10/10</div>
      </div>
    </div>
  </div>
-->


<?php
//Connecting, selecting database
$link = mysqli_connect('localhost','smike','balloon')
        or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysqli_select_db($link, 'smike') or die('Could not select database.');

//Performing SQL query
$query = 'select * from Review';
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
        foreach ($tuple as $col_value) {
                echo "\t\t<td>$col_value</td>\n";
        }
        echo "\t</tr>\n";
}
echo "</table>\n";

//Free resultset
mysqli_free_result($result);

//Closing connection
mysqli_close($link);
?>



</body>

</html>
