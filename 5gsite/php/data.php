


<!-- edw xrhshmopoihsa ton diko sas kwdika, ton evala sta metra mou, alla mou buggarei otan pataw diagrafh kai tropopoihsh, me gurnaei sto index.php.
toulaxiston kanei automata thn anenwsh ths vashs -->
















<!DOCTYPE html>
<html>

<head>
    <title>PHP-MYSQL | Εγγραφές</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <?php
    //////////////////////////////////////
    /////////charilogis Vasileios/////////
    //////////////dit.uoi.gr//////////////
    //////////////////////////////////////
    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $db = '5gsite';
    $mysqli = new mysqli($server, $user, $pass, $db);
    mysqli_report(MYSQLI_REPORT_ERROR);

    
    if (isset($_POST['id'])) {
        $id = mysqli_real_escape_string($mysqli, stripslashes($_POST["id"]));
        $id = (int)$id;
    }
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'add': {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    if ($username != '' && $email != '') {
                        if ($stmt = $mysqli->prepare("INSERT users (username, email) VALUES (?, ?)")) {
                            $stmt->bind_param("ss", $username, $email);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "ERROR: Could not prepare SQL statement.";
                        }
                    } else {
                        echo "Κενά πεδία!";
                    }
                    break;
                }

            case 'edit': {
                    if (is_numeric($id)) {
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        if ($username != '' && $email != '') {
                            if ($stmt = $mysqli->prepare("UPDATE users SET username = ?, email = ? WHERE id=?")) {
                                $stmt->bind_param("ssi", $username, $email, $id);
                                $stmt->execute();
                                $stmt->close();
                            } else {
                                echo "ERROR: could not prepare SQL statement.";
                            }
                        } else {
                            echo "Κενά πεδία!";
                        }
                    }
                    break;
                }
            case 'delete': {
                    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                        if ($stmt = $mysqli->prepare("DELETE FROM users WHERE id = ? LIMIT 1")) {
                            $stmt->bind_param("i", $id);
                            $stmt->execute();
                            $stmt->close();
                            echo "<script>alert('Ouups , kati phge strava.')</script>";
                        } else {
                            echo "ERROR: could not prepare SQL statement.";
                        }
                    }
                    break;
                }
        }
    }
    ?>
    <center>
        <h1>Προβολή εγγραφών</h1>
        <?php

        if ($result = $mysqli->query("SELECT * FROM users ORDER BY id")) {
            if ($result->num_rows > 0) {
                echo "<table border='3' cellpadding='15'>";
                echo "<tr><th>Id</th><th>Όνομα</th><th>Email</th><th>Τροποποίηση</th><th>Διαγραφή</th></tr>";
                while ($row = $result->fetch_object()) {
                    $id = $row->id;
                    $username = $row->username;
                    $email = $row->email;
                    echo "<tr>";
                    echo "<td>" . $id . "</td>";
                    echo "<td><form action=\"./\" method=\"post\">
                    <input type=\"text\" name=\"username\" value=" . $username . "></td>
                    <td><input type=\"text\" name=\"email\" value=" . $email . "></td>
                    <td><input type=\"hidden\" name=\"action\" value=\"edit\">
                    <input type=\"hidden\" name=\"id\" value=" . $id . ">
                    <input type=\"submit\" name=\"submit\" value=\"Τροποποίηση\"></form></td>
                    <td><form action=\"./index.php\" method=\"post\">
                    <input type=\"hidden\" name=\"action\" value=\"delete\">
                    <input type=\"hidden\" name=\"id\" value=" . $id . ">
                    <input type=\"submit\" name=\"submit\" value=\"Διαγραφή\"></form></td></tr>";
                }
                echo "</table>";
            } else {
                echo "Δεν υπάρχουν εγγραφές!";
            }
        } else {
            echo "Error: " . $mysqli->error;
        }
        $mysqli->close();
        ?>
        <p>* Υποχρεωτικό πεδίο<br>
        <form action="" method="post">
            <table border='1' cellpadding='10'>
                <tr>
                    <td>Όνομα: *</td>
                    <td></strong> <input type="text" name="username" value="" /></td>
                </tr>
                <tr>
                    <td>Email: *</td>
                    <td></strong> <input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="hidden" name="action" value="add" /><input type="submit" name="submit" value="Αποστολή" /></td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>