<?php
// Connection variables for local server
$host = "localhost";
$db = "lab_four";
$user = "root";
$password = "";

//for sql connection
$dsn = "mysql:host=$host;dbname=$db";

//attempt to connect to server with success and failure message.
try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to database!";
} catch (PDOexception $e) {
    echo "Failed to connect to database." . $e->getMessage();
}