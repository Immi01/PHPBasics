<?php

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

echo json_encode($people);
