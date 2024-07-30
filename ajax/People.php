<?php
session_start();

class Person {
    public $id;
    public $firstName;
    public $lastName;
    
    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    
    public function getLastName() {
        return $this->lastName;
    }

    public function __construct($id, $firstName, $lastName) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}

$people = array(new Person(1, "Peter", "Böse"), new Person(2, "Harald", "Ammann"));
if (isset($_SESSION["people"]))
    $people = $_SESSION["people"];

if (isset($_GET["reset"]))
    $people = array(new Person(1, "Peter", "Böse"), new Person(2, "Harald", "Ammann"));

if (!isset($_GET["id"]) && !isset($_GET["fName"])){
    echo json_encode($people);
} else if (!isset($_GET["fName"])) {
    foreach($people as $person) {
        if ($person->id == $_GET["id"]) {
            echo json_encode($person);
            exit();
        }
    }
    http_response_code(400);
} else {
    $person = new Person(count($people) + 1, filter_var($_GET["fName"], FILTER_SANITIZE_STRING), filter_var($_GET["lName"], FILTER_SANITIZE_STRING));
    array_push($people, $person);
    echo count($people);
}

$_SESSION["people"] = $people;
