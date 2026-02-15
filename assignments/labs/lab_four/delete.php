<?php
//create connection
require "connection.php";

#check to make sure there is an id.
if(!isset($_GET['id'])){
    die( "no id found.");
}

//get id of target subscriber
$subscriber_id = $_GET['id'];

//query statement for accessing data
$sql = "DELETE FROM subscribers 
        WHERE id = :id";

//binding id from subscribers page.   

//prepare the statement.
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $subscriber_id);

//execute statement.
$stmt->execute();

//redirect page to subscriber page after deleting. Stops resubmission on page refresh.
header("Location: subscribers.php");
exit;
?>
