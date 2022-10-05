<?php 
require_once 'connec.php';
require 'src/function.php';
// Check if the connection with the db is working
    /* try{
        $pdo = new \PDO(DSN, USER, PASS);

    } catch(Exception $error) {
        echo "Oops something went wrong, error : " . $error->getMessage();
        die;
    }
    */

// Get every friend in the db
    $friends = getAllFriends();

// Safe request to insert a new friend 
    $pdo = createConnection();
    $query = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
    $statement = $pdo->prepare($query);

// Checks if the POST has some data
if (!empty($_POST)) {
    $friend = [];
    $errors = [];
    foreach($_POST as $key => $value){
        //Clean the  value : 
        $checkedValue = htmlentities(trim($value));
        //Prepare Data
        $friend[$key] = $checkedValue;
        //Make all checks
        if(!$checkedValue)
        {
            $errors[$key] = "Can not be blank";
        }
    }
        if($checkedValue){
            $firstname = $friend['firstname'];
            $lastname = $friend['lastname'];
            $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
            $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);
            $statement->execute();
        }  
}

// Get every friend in the db
    $friends = getAllFriends();

require_once 'src/views/form.php';
?> 
