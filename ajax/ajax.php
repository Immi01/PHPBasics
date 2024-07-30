<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <a href="../index.php">Home</a>
    <br>
    <br>
    <label for="changeText" id="demo">
        Change this text
    </label>
    <input type="button" value="do it" name="changeText" onclick="changeText()">

    <br>
    <br>
    <label for="getPeople">Get all People</label>
    <input type="button" value="Get People" name="getPeople" onclick="getPeople()">
    <br>
    <br>
    <div id="people"></div>

</body>
</html>