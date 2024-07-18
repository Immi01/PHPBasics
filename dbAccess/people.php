<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.php">Home</a>
    <br>
    <br>

    <?php
    include  './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $mysqli = mysqli_connect($_SERVER["MARIADB_IP"], $_SERVER["MARIADB_USER"], $_SERVER["MARIADB_PASS"], $_SERVER["MARIADB_DB"]);
    
    $results = mysqli_query($mysqli, "SELECT * FROM people;");
    
    echo var_dump(get_object_vars($results)), "<br><br>";

    while($row = $results->fetch_assoc()) {
        echo $row["id"] . " " . $row["name"] . " " . $row["lastname"] . "<br>";
    }

    ?>
</body>
</html>