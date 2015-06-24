 
<!DOCTYPE html>
<html>
<?php session_start();
        require_once('config.php');
        $db_handle = mysqli_connect( $host, $user, $pass, $database)
                        or die("Failed to connect");
        mysqli_select_db($db_handle, $database);

?>
<body>
    <?php require_once('header.php');
          require_once('nav_bar.php');?>
   

        <div class = "contactPage fadeIn" >
                <div class = "contactBox fadeIn" >

                <form name="contactForm" method="post" action="send_form_email.php">
                     <div class = "container fadeIn">
                        <ul class="submitContact">
                                <?php 
                                 /* Title */
                                 $query = "SELECT title FROM pages WHERE page='contact'";
                                 $result = mysqli_query($db_handle, $query);
                                 $row = mysqli_fetch_array($result);
                                 $title = $row['title'];
                                 echo sprintf("<h1>%s</h1>", $title);

                                 /* Header */
                                 $query = "SELECT header FROM pages WHERE page='contact'";
                                 $result = mysqli_query($db_handle, $query);
                                 $row = mysqli_fetch_array($result);
                                 $header = $row['header'];
                                 echo sprintf("<p>%s</p>", $header);

                                ?>
                                        <li> First Name *:<input type="text" name="first_name" id="firstname" maxlength="50" size="30"> </li>

                                        <li> Last Name *:<input  type="text" name="last_name" maxlength="50" size="30"></li>

                                        <li> E-Mail Address *:<input  type="text" name="email" maxlength="80" size="30"></li>

                                        <li> Telephone Number:<input  type="text" name="telephone" maxlength="30" size="30"></li>

                                        <li> Comments *:<br><textarea  name="comments" maxlength="1000" cols="50" rows="10"></textarea></li>
                                <p class = "submit">
                                        <input type="submit" value="Submit">    </p>
                        </ul>
                    </div>
                </form>
        </div>
        </div>

        <div class="footer">
           <?php
           /* Footer */
           $query = "SELECT footer FROM pages WHERE page='contact'";
           $result = mysqli_query($db_handle, $query);
           $row = mysqli_fetch_array($result);
           $footer = $row['footer'];
           echo sprintf("<p>%s</p>", $footer);
           ?>
        </div>

<script>
    window.onload = function()
    {
        document.getElementById('firstname').focus();
    }
</script>
</body>

</html>




