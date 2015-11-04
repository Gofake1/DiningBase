<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Review Submission</title>
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
  table, form {
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
        </div>
      </a>
    </div>
  </div>

<?php

$netid=$_POST["netid"];
$DH=$_POST["DH"];
$item=$_POST["item"];
$rating=$_POST["rating"];
$review=$_POST["review"];


echo "<form action=\"processUpdate.php\" method=\"post\">
Netid: <input type = \"text\" name=\"netid\" value=\"$netid\" required><br>
Dining Hall: <br> ";
if($DH == "NDH"){ 
	echo "<input type=\"radio\" name=\"DH\" value=\"NDH\" checked> NDH<br>
	<input type=\"radio\" name=\"DH\" value=\"SDH\"> SDH<br>";
} else {
	echo "<input type=\"radio\" name=\"DH\" value=\"NDH\"> NDH<br>
	<input type=\"radio\" name=\"DH\" value=\"SDH\" checked> SDH<br>";
}
echo "Item: <input type=\"text\" name=\"item\" value=\"$item\" required><br>
Rating out of 10: <input type=\"number\" name=\"rating\" min=\"0\" max=\"10\" value=\"$rating\" required><br>
Review: <input type=\"text\" name=\"review\" value=\"$review\"><br>
<br>
<input type=\"hidden\" name=\"oldNetid\" value=\"$netid\">
<input type=\"hidden\" name=\"oldDH\" value=\"$DH\">
<input type=\"hidden\" name=\"oldItem\" value=\"$item\">
<input type=\"submit\" value=\"Submit\">
</form>";
?>

</body>

</html>
