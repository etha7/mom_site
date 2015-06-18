 
<!DOCTYPE html>
<html>
<?php session_start();
         require_once('config.php');
        $database = "a7735960_text";  
        $user = "a7735960_text";
        $db_handle = mysqli_connect( $host, $user, $pass, $database)
                        or die("Failed to connect");
        mysqli_select_db($db_handle, $database);

?>
<body>
  <head>
        <link rel="stylesheet" type="text/css" href="styleContact.css" media="screen">
  </head>
<table>
  <tbody><tr>
   <td valign="center"> 
    <div class="nav fadeIn">
        <div class="container">
                <ul>
                    <li> 
                        <div class="btn fadeIn">
                            <a href="index.php">HOME</a>
                        </div> 
                    </li>
                    <li> 
                       <div class="btn fadeIn">
                            <a href="about.php">ABOUT</a>
                       </div> 
                     </li>
                     <li> 
                       <div class="btn fadeIn">
                            <a href="contact.php">CONTACT</a>
                       </div> 
                    </li>
                    <li> 
                        <div class="btn fadeIn">
                            <a href="login.php">LOGIN</a>
                        </div> 
                    </li>
                     <li> 
                       <div class="btn fadeIn">
                            <a href="register.php">REGISTER</a>
                       </div> 
                    </li>
                </ul>
             </div>
         </div>
    </td>
   </tr>
</tbody></table>    

        <div class = "contactPage fadeIn" >
                <div class = "contactBox fadeIn" >

                <form name="contactform" method="post" action="send_form_email.php">
                        <fieldset class = "fadeIn">

                        <ul>
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
                                        <li> First Name *:<input  type="text" name="first_name" id="firstname" maxlength="50" size="30"> </li>
                                        <li> Last Name *:<input  type="text" name="last_name" maxlength="50" size="30"></li>
                                        <li> E-Mail Address *:<input  type="text" name="email" maxlength="80" size="30"></li>
                                        <li> Telephone Number:<input  type="text" name="telephone" maxlength="30" size="30"></li>
                                        <li> Comments *:<br><textarea  name="comments" maxlength="1000" cols="50" rows="10"></textarea></li>
                                <p class = "submit">
                                        <input type="submit" value="Submit">    </p>
                        </ul>
                </fieldset>
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




