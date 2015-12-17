<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>New Tray</title>
  <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
  <link rel="stylesheet" type="text/css" href="main.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>


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
      <a href="./randomTray.php" class="item">Feed Me</a>
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
if(isset($_POST["round"])){
 $round=$_POST["round"];
}
if( $round == "0" ){


echo "<br><br><div class=\"query\">\n";
echo "<div class=\"ui grid\" ng-controller=\"MainCtrl\">
<div class=\"eight wide centered column\">";
echo "<h4 >Choose a Dining Hall:</h4>\n";
echo "<form action=\"addRecipe.php\" method=\"post\" class=\"ui form ui form segment\">\n";
echo "<div class=\"field\">
  <div class=\" ui selection dropdown\">
  <input type=\"hidden\" name=\"DH\">
  <div class=\"default text\">---</div>
  <i class=\"dropdown icon\"></i>
  <div class=\"menu\">
    <div class=\"item\" data-value=\"North Dining Hall\">NDH</div>
    <div class=\"item\" data-value=\"South Dining Hall\">SDH</div>
</div></div></div><br><br>";

/*
echo "Dining Hall: <select class=\"ui search selection dropdown\" id=\"search-select\">";
echo "<option value=\"\">---</option>
<option value=\"North Dining Hall\">NDH</option>
<option value=\"South Dining Hall\">SDH</option>
</div><br>"; */

echo "<input type=\"hidden\" name=\"round\" value=\"1\">";
echo "<input type=\"submit\" value=\"Next Step\" class=\"ui button\">";
echo "</form>";



echo "</div>";
echo "</div></div>";
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
echo "Item #1:  <select name=\"item1\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #2:  <select name=\"item2\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #3:  <select name=\"item3\" class=\"ui search selection dropdown\">";
echo "<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #4:  <select name=\"item4\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #5:  <select name=\"item5\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #6:  <select name=\"item6\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #7:  <select name=\"item7\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #8:  <select name=\"item8\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #9:  <select name=\"item9\" class=\"ui search selection dropdown\">
<option value=\"\">---</option>\n";
while($tuple = mysqli_fetch_array($result,MYSQL_ASSOC)){
  $name = $tuple["name"];
  echo "<option value='$name'>$name</option>";
}
echo "</select><br><br><br>\n";
mysqli_data_seek($result,0);
echo "Item #10: <select name=\"item10\" class=\"ui search selection dropdown\">
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
if(isset($_POST["item1"])) $item1 = mysqli_real_escape_string($link, $_POST["item1"]);
if(isset($_POST["item2"])) $item2 = mysqli_real_escape_string($link, $_POST["item2"]);
if(isset($_POST["item3"])) $item3 = mysqli_real_escape_string($link, $_POST["item3"]);
if(isset($_POST["item4"])) $item4 = mysqli_real_escape_string($link, $_POST["item4"]);
if(isset($_POST["item5"])) $item5 = mysqli_real_escape_string($link, $_POST["item5"]);
if(isset($_POST["item6"])) $item6 = mysqli_real_escape_string($link, $_POST["item6"]);
if(isset($_POST["item7"])) $item7 = mysqli_real_escape_string($link, $_POST["item7"]);
if(isset($_POST["item8"])) $item8 = mysqli_real_escape_string($link, $_POST["item8"]);
if(isset($_POST["item9"])) $item9 = mysqli_real_escape_string($link, $_POST["item9"]);
if(isset($_POST["item10"])) $item10 = mysqli_real_escape_string($link, $_POST["item10"]);

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
        echo "servings:  <input type=\"number\" name=\"serve1\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve2\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve3\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve4\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve5\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve6\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve7\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve8\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve9\" value=\"1\" min=\"0\" step=\"0.1\">";
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
        echo "servings:  <input type=\"number\" name=\"serve10\" value=\"1\" min=\"0\" step=\"0.1\">";
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

<script>
  $('.ui.dropdown').dropdown();

  //For the last dropdowns
  $(".customDropdownSearchTextInput").each(function(){

    var defaultText = false;
    //Get the initial text, i.e. the default text if exists, and not blank
    //Note this isn't the actual value for form submission, but the displayed value user sees
    if ( $(this).find(".text").hasClass("default") && $(this).find(".text").text() )
      defaultText = $(this).find(".text").text();

    //Determine if <select></select> tag is used for semantic ui dropdown, or <div></div> is used instead
    var isSelectTag = false;
    if ( $(this).find("input:hidden").length < 1 || $(this).addBack().find( "select" ).length > 0 )
      isSelectTag = true;

    //This IF statement deals with semantic ui div format of dropdowns
    if ( isSelectTag === false )
    {
      //Semantic UI disable force selection so option isn't auto-selected when user put a letter as input
      $(this).dropdown(
      {
        forceSelection: false
      });

      /*
        This is to get rid of the generated active class assigned to selected dropdown options, as it causes problems.
        Once you selected a select option, and try enter a text value, it would not work due
        to the active class and a semantic UI event handler. The text would get erased on blur.

        To get past this, there is a need to remove class active on focus BEFORE the onchange event fires.

        Problem is there will be missing CSS due to the removed active class, i.e. bold effect for selected option.
        Attempted to find the the semantic UI event handler and turn it off, but does not work, thus this approach was taken.
        There is no perfect solution with transferring CSS from a class found.

        NOTE:
        There is also the selected class used along with active, which gives the background grey highlight effect to selected div option.
        This doesn't at current, interfere with entering text input, however in semantic CSS version over 1.12.0+,
        it just might, thus you may also need to remove the class selected from the div.
      */
      $(this).find(".search").on("focus", function(event){
        var aOpt = $(this).parent().find(".active");
        aOpt.removeClass("active");
      });

      //the input with "search" class is the input which user enters text into, but doesn't save any form data, i.e. not submitted
      //It is auto generated by semantic UI. It should initially be blank.
      //originalText variable is used to detect if there was any text changes, i.e. same effect to onchange
      var originalText = $(this).find(".search").text();

      //this refers to the main ui dropdown div
      $(this).find(".search").on("blur", function(event){

        //this refers to the div with class search, which displays selected option or entered text
        var text = $(this).val();

        if ( originalText != text )
        {
          //If there was a existing default text to start with, and if input was blank
          if ( $.trim(text)==="" && defaultText !== false )
          {
            //Set default class for grey css effect, and set the default text
            $(this).parent().find(".text").addClass("default").removeClass("filtered").text(defaultText);
          }
          //Set the hidden input value to whatever new value was entered into input
          //$(this).parent().find("input:hidden").val(text);

          //originalText= text;
        }

      });
    }
  });
</script>

</body>

</html>

