<?php
// File: /grand-oasis-resort/grand-oasis-resort/src/db/mongodb.php

require 'vendor/autoload.php'; // Include Composer's autoloader

class MongoDBConnection {
    private $client;
    private $database;

    public function __construct($dbName) {
        $this->client = new MongoDB\Client("mongodb://localhost:27017");
        $this->database = $this->client->$dbName;
    }

    public function getCollection($collectionName) {
        return $this->database->$collectionName;
    }
}

// Usage example (uncomment to use):
// $mongo = new MongoDBConnection('grand_oasis_resort');
// $collection = $mongo->getCollection('users');
?>