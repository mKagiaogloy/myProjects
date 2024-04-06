<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Βιογραφικό</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/cpu.png" type="image/x-icon">
    
    

    

</head>
<body>
<?php include './navbar.php';?>

<div class="mainb">
    <div class="bio"><img class="profile-img" src="../assets/images/icon.jpg" />
        <h3 class="header">Mixalis Kagiaogloy</h3>
        <!-- <p> Γειά σας.<br>
            Ονομάζομαι Μιχάλης Καγιάογλου και σπουδάζω στο πανεπιστήμιο Πληροφορικής & Τηλεπικοινωνιών στο πανεπιστήμιο Ιωαννίνων.<br>
            Μου αρέσει πολύ ο σχεδιασμός Website και αφιερώνω πολύ χρόνο σε αυτό.<br>
            Χρησιμοποιώ HTML , CSS , JS , PHP και Bootstrap .<br><br>
            
            Junior Web Developer -->
        
    </div>
    
    <div class="contact">
        <form id="form">
            <legend class="header">Ελάτε σε επικοινωνία</legend>
            <fieldset><label class="fa fa-user" for="name-input" aria-hidden="true"></label><input type="text" placeholder="Your name..." id="name-input" /></fieldset>
            <fieldset><label class="fa fa-envelope" for="email-input" aria-hidden="true"></label><input type="email" placeholder="Your email..." id="email-input" /></fieldset>
            <fieldset><label class="fa fa-comment" for="message-input" aria-hidden="true"></label><textarea placeholder="Your Message..." id="message-input"></textarea></fieldset>
            <fieldset><button type="submit" id="btn-submit">Send</button></fieldset>
        </form>
    </div>
</div>


<?php include './footer.php';?>
<script src="../assets/js/app.js"></script>
</body>
</html>