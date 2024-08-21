<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>WhoIs Domain Information</title>
</head>

<body>

    <nav>
        <h1>WhoIs Domein Informatie</h1>
    </nav>

    <form method="post" action="whoIs.php">
        <label for="userInput">Enter something:</label>
        <input type="text" id="userInput" name="userInput">
        <input class="button-6" type="submit" value="Submit">
    </form>

    <?php
    require '../lib/testApi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and display the value entered in the text field
        $inputValue = htmlspecialchars($_POST['userInput']);
        // echo "<p>You entered: </p><b>$inputValue</b>";
        $result = json_encode(json_decode(testApiWithResponse("who-dat.as93.net/$inputValue")), JSON_PRETTY_PRINT);
        echo "<b>$result</b>";
    } ?>
    <!-- https://catfact.ninja/fact -->
</body>

</html>