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
                <!-- <option value="3">Level 3</option> -->
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
    switch($level){
        case 1:
            $input = addslashes($input);
            return $input;
        case 2:
            $input = addslashes($input);
            $input = preg_replace("/[;]/", "", $input);
            return $input;
    }
}

$command = $_GET['command'];
$level = $_GET['level'];

$command = check_input($command, $level);
echo "<pre>";
echo "<b>Selected level:</b> Level $level \n";
echo "<b>Your input:</b> $command\n";
echo "<b>[DEBUG]:</b> $command\n";


echo "</pre>";
?>
--------------------------------------------------------- 
    <h3>RESULT</h3>
<?php
echo "<pre>";

$command = <<<EOF
    echo 'You have just input "$command", hehehehe!'
    echo "You will need more effort to get my flag bleeeeee!"
    EOF;
passthru($command);
echo "</pre>";
?>
    </div>
</body>

</html>