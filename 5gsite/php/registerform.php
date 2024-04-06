<?php

include 'config.php';

error_reporting(0);


if(isset ($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn , $sql);
        if(!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email' , '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('H eggrafh sou oloklhrwthike epituxws.')</script>";
                $username = "";
                $email = "";
                $_POST['password']="";
                $_POST['cpassword']="";
            } else {
                echo "<script>alert('Ouups , kati phge strava.')</script>";
            }
        } else {
            echo "<script>alert('To email yparxei hdh.')</script>";
        }
    } else {
        echo "<script>alert('Oi kwdikoi den tairiazoun.')</script>";
    }  
}

$name = "Cookie";
$value = $_POST['username'];

setcookie($name, "Mixalis" , time() + (86400*7) , "/" );

$_SESSION['name'] = "Mike";

if(!isset($_COOKIE['name'])){
    echo "Cookie doesn't exist";
}
else{
    echo $_COOKIE['name'];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../assets/images/cpu.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../assets/css/form.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Εγγραφή</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Κωδικός" name="password" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Επιβεβαίωση Κωδικού" name="cpassword" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Εγγραφή</button>
            </div>
            <p class="login-register-text">Έχεις ήδη λογαριασμό; <a href="loginform.php">Συνδέσου εδώ </a></p>
        </form>
    </div>
</body>
</html>