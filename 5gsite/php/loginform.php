<?php

include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location : index.php");
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
            <p class="login-text">Σύνδεση</p>
            <div class="input-group">
                <input type="email" placeholder="E-mail" name="email" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Κωδικός" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Σύνδεση</button>
            </div>
            <p class="login-register-text">Δεν έχεις λογαριασμό ; <a href="registerform.php">Κάνε εγγραφή εδώ </a></p>
        </form>
    </div>
</body>
</html>