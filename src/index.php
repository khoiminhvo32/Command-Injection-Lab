<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playtime</title>
    <link rel=stylesheet href="./css.css">
</head>
<body>
    <div class="column" style="color:crimson">
        <h1>Command Injection</h1>
    </div>
    <div class="column" style="color:crimson">
        <form method=get action="index.php">
            <div class="level">
            <label for="level">Chọn level:</label>
            <select name="level" id="level">
                <option value="1" selected>Level 1</option>
                <option value="2">Level 2</option>
                <option value="3">Level 3</option>
                <option value="4">Level 4</option>
                <option value="5">Level 5</option>
            </select>
            </div>
            <div class="resp-textbox">
            <input type=text name=command placeholder="Enter Command Here" />
            </div>
            <div>
            <input type=submit value="Submit">
            </div>
        </form>
        --------------------------------------------------------- 

<?php
function check_input($input, $level){
    if (preg_match("/on.*=/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/javascript/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/script/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/img/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/svg/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/iframe/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/.*avascri.*/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/src/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/href/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    if (preg_match("/style/i", $input)){
        die("No XSS here plsssss!!!!");
    }
    switch($level){
        case 1:
            $input = addslashes($input);
            return $input;
        case 2:
            $input = addslashes($input);
            $input = preg_replace("/[;]/", "", $input);
            return $input;
        case 3:
            $input = addslashes($input);
            $input = preg_replace("/[;]/", "", $input);
            $input = preg_replace("/ /", "", $input);
            return $input;
        case 4:
            $input = addslashes($input);
            $input = preg_replace("/[;]/", "", $input);
            $input = preg_replace("/ /", "", $input);
            $input = preg_replace("/[#]/", "", $input);
            return $input;
        case 5:
            $input = addslashes($input);
            $input = preg_replace("/[;\/]/", "", $input);
            $input = preg_replace("/ /", "", $input);
            $input = preg_replace("/[#]/", "", $input);
            return $input;
    }
}

$command = $_GET['command'];
$level = $_GET['level'];

echo "<pre>";

echo "<b>Selected level:</b> Level $level \n";
echo "<b>Your input:</b> $command\n";
$command = check_input($command, $level);
echo "<b>[DEBUG]:</b> $command\n";

echo "</pre>";
?>
--------------------------------------------------------- 
    <h3>RESULT</h3>
<?php
echo "<pre>";

$command = "echo 'You have just input $command, hehehehe!\nYou will need more effort to get my flag bleeeeee!'";

if ($level == 5){
    passthru($command);
    echo '<div><pre style="color:crimson">Only click this after you have successfully solved all 5 levels</pre><button id="myButton" class="button" style="color:#e8c99b; font-size:large; border-radius:10px; border-color:crimson; background-color:crimson;">Next Page</button></div>';
} else {
    passthru($command);
}

echo "</pre>";
?>
    <script>
        url = new URL(origin);
        document.getElementById("myButton").onclick = function(){
            location.href = url + "new.php";
        }
    </script>
    </div>
</body>

</html>