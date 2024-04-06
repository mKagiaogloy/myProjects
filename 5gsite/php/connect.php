<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "5gsite";

function connect_db(){
    global $server;
    global $user;
    global $pass;
    global $db;
    
    $conn = new mysqli($server,$user,$pass,$db);
    return $conn;
}
?>