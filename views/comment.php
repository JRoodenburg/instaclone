<div id='respond'>
    <h3>Leave a Comment</h3>

    <?php
    echo '<form action=' . $_SERVER['PHP_SELF'] . ' name=' . $picID . ' id=' .$picID . ' method="post">'; ?>
        <label for='comentaar' class='required'>Your message</label>
        <textarea name='comentaar' id='comentaar' rows='5' tabindex='4'  required='required'></textarea>

        <?php echo '<input type="hidden" value=' .$picID .' name="comment_post_ID" id='.$picID.' >';
        $submitbuttonname = "submitknop".$picID;
        echo '<input name='. $submitbuttonname .' type="submit" value="Comment" />'; ?>
        <?php
        if ($_POST[$submitbuttonname]=='Comment'){
            $comment = $_POST['comentaar'];
            $username2 = $_SESSION['username'];
            $commentPostID = $_POST['comment_post_ID'];

            $queryC = "INSERT INTO comments(picID, comment, username, datum) VALUES ('$picID','$comment','$username2',NOW() )";
            echo $queryC;
            $resultC = mysqli_query($dbc,$queryC) or die ('Error querrying3');
        }?>

    </form>
</div>

