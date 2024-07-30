<?php
session_start();
?>

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
    <br>
    <br>

    <label for="getId">Get Person by ID</label>
    <input type="number" min="1" name="getId" id="getId" onchange="getId(value)">
    <br>
    <br>
    <div id="person"></div>
    <br>
    <br>

    <h3>Create New Person</h3>
    <label for="setPersonFName">First Name</label>
    <input type="text" name="setPersonFName" id="setPersonFName">
    <br>
    <label for="setPersonLName">Last Name</label>
    <input type="text" name="setPersonLName" id="setPersonLName">
    <br>
    <input type="submit" value="Create" onclick="setPerson()">
    <br>
    <br>
    <div id="setResult"></div>
    <br>
    <br>

    <input type="button" value="reset" onclick="reset()">

</body>
</html>