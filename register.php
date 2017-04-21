<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/register.css" type="text/css">
    <title>Register</title>
</head>
<body>
<?php include 'views/nav.php'; ?>
<div class="wrapper">
    <h1> Enter your details</h1>
    <div id="registerform" class="registerform">
        <form method="post" action="register.php">
            <fieldset>
                Enter Your UserName: <br>
                <input type="text" name="username" placeholder="Username" required/> <br>
                Enter Your FirstName: <br>
                <input type="text" name="firstname" placeholder="firstname" required/> <br>
                Enter Your LastName: <br>
                <input type="text" name="lastname" placeholder="lastname" required/> <br>
                 <br>
                <br>
                 Enter a password: <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <input type="password" name="password2" placeholder="Re-Type Password" required>
                <br>
                <br>
                Enter your Email: <br>
                <input type="email" name="email" placeholder="E-mail" required>
                <br>
                <br>
                <input type="submit" name="submit" value="Register">
            </fieldset>
        </form>
        <div>
        </div>
<?php
$dbu = "root";
$dbp = "rooot";
$db = "22455_instaclone";

if($_POST['submit']=='Register') {
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash('sha512',$password);
    $password2 = $_POST['password2'];
    $password2 = hash('sha512',$password2);

    $random_number = rand(1,9999);
    $hashcode = hash('sha512',$random_number);
    $date = date("Y-m-d");

    $lastname = strtolower($lastname);
    $lastname = ucfirst($lastname);
    $firstname = strtolower($firstname);
    $firstname = ucfirst($firstname);


        if ($password2 == $password && $password != null) {
            $dbc = mysqli_connect('localhost', $dbu, $dbp, $db) or die('Could not connect to database!');
            $query = "INSERT INTO users(email, firstname, lastname, username, password, datum, hash) VALUES ('$email','$firstname','$lastname','$username','$password','$date', $hashcode)";
            $result = mysqli_query($dbc, $query) or die('Error writing query');
            echo 'You registered: ' . $username . ' under the name of: ' . $firstname . ' ' . $lastname . ' <br> With the email: ' . $email . ' <br> Welcome To Instaclone!';
            mysqli_close();
        } else if ($password != $password2) {
            echo 'Passwords Do Not Match!';
        } else {echo 'Error';}

}
?>
</body>
</html>