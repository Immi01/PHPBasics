<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="people.php">back</a>

    <?php

    # echo var_dump((int)$_GET["id"]);

    include  './vendor/autoload.php';

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $mysqli = mysqli_connect($_SERVER["MARIADB_IP"], $_SERVER["MARIADB_USER"], $_SERVER["MARIADB_PASS"], $_SERVER["MARIADB_DB"]);

    // using prepared statement here to prevent sql injection
    $statement = $mysqli->prepare("SELECT * FROM people WHERE id=?;");
    $statement->bind_param("i", $id);
    $id = (int)$_GET["id"];
    $statement->execute();

    $result = $statement->get_result();
    # echo var_dump($result);
    $row = $result->fetch_assoc();

    echo "<br>" . $row["id"] . " " . $row["name"] . " " . $row["lastname"] . "<br>";

    $statement->close();
    $mysqli->close();
    ?>

</body>
</html>