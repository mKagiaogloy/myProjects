<?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "5gsite";
$mysqli = new mysqli('localhost', 'root' , '' , '5gsite') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $mysqli->query("INSTER INTO 5gsite (username, email, password) VALUES('$username' , '$email' , '$password')") or
            die($mysqli->error);

}

?>
