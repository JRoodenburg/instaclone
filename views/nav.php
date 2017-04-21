<nav style="border: none; padding-top: 2em;">
    <?php
if (isset($_SESSION['username'])){
    echo " <div style='float:left;padding:1em;padding-right:0px'>" . $_SESSION['username'] .
        "</form> </div> <br> ";

    echo ' &#8226;
<a href="index.php?' . SID . '">Home</a>
    &#8226;
<a href="upload.php?' . SID . '">Upload</a> &#8226;
<div style="float:right;">
<form action="logout.php" method="post"> <type="submit" name="logout" value="logout"></form></div> 
';

}
else if(!isset($_SESSION['username'])){
    echo ' &#8226; <a href="index.php?' . SID . '">Home</a>    &#8226; 
     
<a href="login.php?' . SID . '">login</a> &#8226;
 
<a href="register.php?' . SID . '">register</a> &#8226;';}

?> </nav>