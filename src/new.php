<html>
    <!-- Remote Code Execution -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Playtime</title>
    <link rel=stylesheet href="./css.css">
</head>
<body>
    <div class="column" style="color:crimson">
        <h1>Replace words</h1>
        <pre>This lab is a demo of a real-case study, developers used this technique to replace characters in mails to filter bad words.
        (The technique is old, no more used nowadays)</pre>
    </div>
    <button id="myButton" class="button" style="color:#e8c99b; font-size:large; border-radius:10px; border-color:crimson; background-color:crimson;">PHP INFO</button>
    <div class="column" style="color:crimson">
        <form method=get action="new.php">
            <div class="level">
            </div>
            <div class="resp-textbox">
            <input type=text name=pat placeholder="Enter Pattern Here" />
            </div>
            <div class="resp-textbox">
            <input type=text name=rep placeholder="Enter Replace Here" />
            </div>
            <div class="resp-textbox">
            <input type=text name=sub placeholder="Enter Subject Here" />
            </div>
            <div>
            <input type=submit value="Submit">
            </div>
        </form>
        <script>
            url = new URL(origin);
            document.getElementById("myButton").onclick = function(){
                location.href = url + "phpInfo.php";
            }
        </script>
        --------------------------------------------------------- 

<?php
echo "<br >Welcome My Admin ! <br >";

if (isset($_GET['pat']) && isset($_GET['rep']) && isset($_GET['sub'])) {
 
    $pattern = $_GET['pat'];
    $replacement = $_GET['rep'];
    $subject = $_GET['sub'];
 
    echo "original : ".$subject ."</br>";
    echo "replaced : ".preg_replace($pattern, $replacement, $subject);
} else {
    die();
}
?>
    </div>
</body>

</html>