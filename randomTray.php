<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Review Processing</title>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">

  <style type="text/css">
  body {
    background-color: #FFFFFF;
    margin-top: 3em;  
    margin-left: 2em;
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
      <a href="./index.html" class="item">
        Dining Base
      </a>
      <a href="./foods.php" class="item">Search for Food</a>
      <a href="./addRecipe.php" class="item">Create Tray</a>
      <!--<a href="#" class="ui simple dropdown item">
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
if (isset($_POST["round"])) {
  $round = $_POST["round"];
}
if ($round == "0") {
  echo "<br><br>
  <div class=\"query\">
    <div class=\"ui grid\" ng-controller=\"MainCtrl\">
      <div class=\"eight wide centered column\">
        <h4>Choose a Calorie Target:</h4>
        <form action=\"randomTray.php\" method=\"post\" class=\"ui form ui form segment\">
          <div class=\"field\">
            <div class=\"ui selection dropdown\">
              <input type=\"hidden\" name=\"DH\">
              <div class=\"default text\">---</div>
              <i class=\"dropdown icon\"></i>
              <div class=\"menu\">
                <div class=\"item\" data-value=\"North Dining Hall\">NDH</div>
                <div class=\"item\" data-value=\"South Dining Hall\">SDH</div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>";
}
?>

</body>

</html>