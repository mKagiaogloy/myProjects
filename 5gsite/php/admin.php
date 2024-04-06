<?php

include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM superusers WHERE name='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        // $_SESSION['username'] = $row['username'];
        header("Location : data.php");
    } else {
        echo "<script>alert('H O kwdikos h to email einai lathos , try again .')</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/images/cpu.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text">Sundesh Admin</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Kwdikos" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Σύνδεση</button>
            </div>
        </form>
    </div>
</body>
</html>