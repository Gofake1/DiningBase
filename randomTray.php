<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Feed Me</title>
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
              <input type=\"hidden\" name=\"target\">
              <div class=\"default text\">---</div>
              <i class=\"dropdown icon\"></i>
              <div class=\"menu\">
                <div class=\"item\" data-value=\"300\">300</div>
                <div class=\"item\" data-value=\"400\">400</div>
                <div class=\"item\" data-value=\"500\">500</div>
                <div class=\"item\" data-value=\"600\">600</div>
                <div class=\"item\" data-value=\"700\">700</div>
              </div>
            </div>
          </div>
          <br><br>
          <input type=\"hidden\" name=\"round\" value=\"1\">
          <input type=\"submit\" value=\"Next Step\" class=\"ui button\">
        </form>
      </div>
    </div>
  </div>";
}

else if ($round == "1") {
  if (isset($_POST["target"])) {
    $target = $_POST["target"];
  }
  $meal = [];
  $calories = 0;
  $query = "SELECT * FROM Food ORDER BY RAND() LIMIT 1";
  $link = mysqli_connect('localhost', 'smike', 'balloon')
          or die('Could not connect: ' . mysql_error());
  mysqli_select_db($link, 'smike') or die('Could not select database');

  echo "<br><br>
  <table class=\"ui celled collapsing table\">
    <tbody>
      <thead>
        <tr>
          <th>Name</th>
          <th>Calories</th>
        </tr>
      </thead>";
  while ($calories < $target) {
    $result = mysqli_query($link, $query) 
              or die('Query failed: ' . mysql_error());
    $tuple = mysqli_fetch_array($result, MYSQL_ASSOC);

    $name = $tuple["name"];
    $cals = $tuple["Calories"];
    $calories += $cals;

    echo "<tr>
      <td>$name</td>
      <td>$cals</td>
    </tr>";
  }
  echo "  </tbody>
  </table>";
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