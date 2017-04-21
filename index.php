<?php if (!isset($_SESSION['username'])){session_start();} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <title>Instaclone</title>
</head>
<body>
<nav>
    <?php
    include 'views/nav.php';
    include 'views/sort.php';
    ?>


</nav>


<br>

<br>

<div id="content">
</div>
<?php
$_POST['submit'];
if($_POST['submit']=='Logout') {session_write_close();}
if($_POST['search']=='Search'){
//            $searchterm = mysqli_real_escape_string($dbc,trim($_POST['searchbox']));
    $searchterm = "%" . $_POST['searchterm'] . '%';
} else {
    $searchterm = '%';
}
$dbc = mysqli_connect('localhost','root','rooot','22455_instaclone') or die('Error Connecting To Database');
$query = "SELECT * FROM posts WHERE description LIKE '$searchterm' ORDER BY " . $column . " " .$order or die("Error main querry.");
$result = mysqli_query($dbc,$query);


while ($row = mysqli_fetch_array($result)){
    $target = $row['target'];
    $picID = $row['id'];
    $date = $row['date'];
    $username = $row['username'];
    $description = $row['description'];


    echo '<div class=contentDiv>';
    echo '<div class=username style="float: left;">' . $username . '</div>';
    echo '<div class=date style="float:right">' . $date . '</div>';
    echo '<img src="' . $target . '" style=" width: 100%" /> <br>';
    echo '<div class=description>' . $description . '</div>';


    include 'views/comment.php';
    $loadcommentknop = "loadcommentknop" . $picID;
    echo '<form action="" method="post"> <input type="hidden" name="picID" value="'. $picID . '" />  <input name='.$loadcommentknop.' type="submit" value="Load Comments" /> </form> ';
    echo  "1 " . $picID;

    if ($_POST[$loadcommentknop]=='Load Comments') {
        $queryB = "SELECT * FROM comments WHERE picID= '$picID' ORDER BY id DESC";
        $resultB = mysqli_query($dbc,$queryB) or die ('Could not run querry B');
        while ($rowB = mysqli_fetch_array($resultB)) {
            $date2 = $rowB['datum'];
            $username2 = $rowB['username'];
            $comment2 = $rowB['comment'];
            echo '<div style="border: dashed 1px blue" id='.$picID.'>';
            echo $comment2 . " @ " . $date2 . " By: " . $username2 . "<br>";
            echo '</div>';
        }
        echo '<a href="index.php?' . SID . '"> back home </a>';

    }

    echo '</div>';
}



mysqli_close($dbc);
?>

</body>
</html>
