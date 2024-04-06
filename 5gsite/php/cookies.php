<?php

$value = "name";

setcookie("name", "Mixalis" , time() + (86400*7) , "/" );

$_SESSION['name'] = "Mike";

if(!isset($_COOKIE['name'])){
    echo "Cookie doesn't exist";
}
else{
    echo $_COOKIE['name'];
}

?>


<!-- exw prosthesei kai ton sugkekrimeno kwdika kai sto registerform.php giati dn katalavainw gia poion logo dn to apothikeuei san cookie to google chrome :/ -->