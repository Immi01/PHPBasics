<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- scroll back to previous position -->
    <script src="rememberPosition.js" defer></script>
    <title>Document</title>
</head>
<body>
    
    <div class="HelloWorld">
        <?php
            echo("<div class='blue'> Hello World </div>");
        ?>

        <a href="./dbAccess/people.php">people</a>
        <a href="./ajax/ajax.php" id="ajax">ajax</a>

    </div>

    <div class="container">
        <?php
        $x = 5; // global scope
        $y = 10;

        function myTest() {
            // using x inside this function will generate an error
            echo "<p>Variable x inside function is: $x</p>";
        }

        function globalTest() {
            // accessing globals
            global $y;
            echo "<br><p>Variable y inside function is: $y</p>";
            // alternatively use $GLOBALS['y']
        }

        function repeatTest() {
            // static variables don't get deleted at the end of function
            static $a = 1;
            echo $a++ . "<br>";
        }

        myTest();
        
        echo "<p>Variable x outside function is: $x</p>";     
        
        globalTest();

        repeatTest();
        repeatTest();
        
        echo "text" , " zusammengefügt" , "<br>"; // commas separate parameters
        echo "text" . " zusammengefügt" . "<br>"; // dots concat strings

        print "<p>Test</p>";

        $b = true;

        /*
        print is a function
        meaning this can be done:
        */
        $b ? print '$b is true' : print '$b is false';
        //print also only takes one parameter

        echo '<br> \$b <br>'; // escape $
        
        echo "<br>";
        var_dump($b); // displays data type

        echo '<br><br>PHP version: ' . phpversion();

        /*
        enums only work from PHP version 8.1
        enum size {
            case AA;
            case AAA;
            case AAAA;
        }
        */

        echo "<br>";
        echo "<br>";

        class Battery {
            public $charge;
            public $size;
            private $chargeTime;

            public function __construct($charge, $size, $chargeTime) {
                $this->charge = $charge;
                $this->size = $size;
                $this->chargeTime = $chargeTime;
            }

            public function report() {
                return "This $this->size Battery has a charge of {$this->charge}mAh.";
            }
            public function getChargeTime() {
                return "{$this->chargeTime}h";
            }
        }

        $myBattery = new Battery(2500, "aa", 2);

        echo $myBattery->report();
        echo "<br>";
        echo $myBattery->getChargeTime();
        echo "<br>";
        echo "<br>";
        // using $_SERVER["PHP_SELF"]; can result in a vulnerability for XSS
        echo $_SERVER["PHP_SELF"] . "<br>";
        // this is safe: PHPBasics/index.php/<script>alert("hacked");</script> will not execute the script in this case
        echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>
        <br>
        <br>

        <div class="filters">Filters:</div>
        <table>
            <tr>
                <td>Filter Name</td>
                <td>Filter ID</td>
            </tr>
            <?php
            foreach (filter_list() as $id =>$filter) {
            echo '<tr><td>' . $filter . '</td><td>' . filter_id($filter) . '</td></tr>';
            }
            ?>
        </table>
        
        <form method="GET">
            <table>
                <tr>
                    <th>Validation</th>
                    <th>Input</th>
                    <th>Output</th>
                </tr>
                <tr>
                    <td><label for="no_html">No HTML tags</label></td>
                    <td><input name="no_html" type="text" value="<h1>Hello World</h1>"></td>
                    <td><?php echo !empty($_GET["no_html"]) ? filter_var($_GET["no_html"], FILTER_SANITIZE_STRING) : "" ?></td>
                </tr>
                <tr>
                    <td><label for="int">Integer</label></td>
                    <td><input name="int" type="text"></td>
                    <td>
                        <?php 
                        if (isset($_GET["int"])) {
                            if (!empty($_GET["int"]) || filter_var($_GET["int"], FILTER_VALIDATE_INT) === 0){
                                if ((filter_var($_GET["int"], FILTER_VALIDATE_INT) || filter_var($_GET["int"], FILTER_VALIDATE_INT) === 0)) {
                                    echo "input '" . $_GET["int"] . "' is an int";
                                } else {
                                    echo "input '" . $_GET["int"] . "' isn't an int";
                                }
                            }
                        } else {
                        echo "";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="ip">IP Address</label></td>
                    <td><input name="ip" type="text"></td>
                    <td><?php echo !empty($_GET["ip"]) ? filter_var($_GET["ip"], FILTER_VALIDATE_IP) ? "input '" . $_GET["ip"] . "' is an ip" : "input '" . $_GET["ip"] . "' is not an ip" : "" ?></td>
                </tr>
                <tr>
                    <td><label for="email">Email Address</label></td>
                    <td><input name="email" type="text"></td>
                    <td>
                        <?php
                        if (!empty($_GET["email"])) {
                            echo "<script> console.log('" . filter_var($_GET["email"], FILTER_SANITIZE_EMAIL) . "'); </script>";
                            if (filter_var($_GET["email"], FILTER_VALIDATE_EMAIL)) {
                                echo "input '" . $_GET["email"] . "' is an email";
                            } else {
                                echo "input '" . $_GET["email"] . "' isn't an email";
                            }
                        } else {
                        echo "";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="url">URL</label></td>
                    <td><input name="url" type="text"></td>
                    <td>
                        <?php
                        if (isset($_GET["url"]) && !empty($_GET["url"])) {
                            echo "<script> console.log('" . filter_var($_GET["url"], FILTER_SANITIZE_URL) . "'); </script>";
                            if (filter_var($_GET["url"], FILTER_VALIDATE_URL)) {
                                echo "input '" . $_GET["url"] . "' is an url";
                            } else {
                                echo "input '" . $_GET["url"] . "' isn't an url";
                            }
                        } else {
                        echo "";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Validate"></td>
                </tr>
            </table>
        </form>

        <?php

        ?>

    </div>

</body>
</html>