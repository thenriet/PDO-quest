<?php

// Create a connection with the db
function createConnection()
{
    return new \PDO(DSN, USER, PASS);
}

// Get every friend in the db
function getAllFriends() : array {
    $pdo = createConnection();
    $query = "SELECT * FROM friend";
    $statement = $pdo->query($query);
    $friends = $statement->fetchAll();
    return $friends;
}