<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/upload.css" type="text/css">
    <title>Upload Your Image</title>
</head>
<body>

<?php include 'views/nav.php'; ?>

<h1>Upload Your Image</h1>
<br>
<div class="uploadform">
<form enctype="multipart/form-data" method="post" action="upload.php">

    <fieldset>
        <input type="file" name="upload" /> <br>
        <label for="description"> Omschrijving (max. 140 tekens)</label><br>
        <textarea name="description" id="description"> </textarea>
    </fieldset>
    <br>
    <input type="hidden" name="MAX_FILE_SIZE" value="32768" />
    <input type="submit" value="Upload" name="submit">
</form>
</div>
<?php
$username = $_SESSION['username'];
if(isset($_POST['submit'])){

    $dbuser = 'root';
    $dbpass = 'rooot';
    $db = '22455_instaclone';
    $dbc = mysqli_connect('localhost',$dbuser,$dbpass,$db) or die('Error Connecting To Database');

    $query = "INSERT INTO posts(image, username, description) VALUES ('$upload_target', '$gebruiker', '$description') ";
    $description = mysqli_real_escape_string($dbc,trim($_POST['description']));
    $upload_temp = $_FILES['upload']['tmp_name'];
    $upload_target = 'images/' . date('Y-m-d') ."-". time( void ) . mt_rand('1','9999') . $_FILES['upload']['name'];



    $upload_type = $_FILES['upload']['type'];
    $upload_size = $_FILES['upload']['size'];
}
    if(!empty($description)){
        if(move_uploaded_file($upload_temp,$upload_target)){
            $query = "INSERT INTO posts VALUES (0,NOW(),'$description','$upload_target','$username')";
            $result = mysqli_query($dbc,$query) or die('Error Querying');
        } else { echo '<br> Niet gelukt';}
    }
?>

</body>
</html>