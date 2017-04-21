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
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <title>login</title>
</head>
<body>

<?php include 'views/nav.php'; ?>
<div class="wrapper">
<h1> Enter your login details</h1>
<div id="loginform" class="loginform">
<form method="post" action="">
    <input type="text" name="username" placeholder="Username">
    <br>
    <input type="password" name="password" placeholder="Password">
    <br>
    <input type="submit" name="submit" value="Login">
</form>
    <div>
    </div>
    <?php
    if($_POST['submit']=='Login') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $dbc = mysqli_connect('localhost', 'root', 'rooot', '22455_instaclone') or die('Could not connect to database!');
        $query = "SELECT * FROM users WHERE username= '$username'";
        $result = mysqli_query($dbc, $query) or die('Error writing 1st query');
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            if($row[2] == $password && $row[1] == $username) {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: index.php");
            } else { echo 'Fill In The Right Password';}
        } else {echo 'Username does not exist.';}


    }
    ?>
</body>
</html>