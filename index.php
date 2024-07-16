<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="HelloWorld">
        <?php
            echo("<div class='blue'> Hello World </div>");
        ?>
    </div>

    <div class="scopeTest">
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

        ?>
    </div>

</body>
</html>