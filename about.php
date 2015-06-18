<html>
<?php session_start();?>
<body>
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
    
<?php
        require_once('config.php');
        $database = "a7735960_text";  
        $user = "a7735960_text";
        $db_handle = mysqli_connect( $host, $user, $pass, $database)
                        or die("Failed to connect");
        mysqli_select_db($db_handle, $database);
?>
<head>
   <link rel="stylesheet" type="text/css" href="style1.css" media="screen">
</head>
    
 
          <div class="jumbotron fadeIn">
             <div class = "box" >
                <div class="container">
<?php
	              /* Title */	
                  $query = "SELECT title FROM pages WHERE page='about'";
                  $result = mysqli_query($db_handle, $query);
                  $row = mysqli_fetch_array($result);
                  $title = $row['title'];
                  echo sprintf("<h1>%s</h1>", $title);
                  
                  /* Header */
                     $query = "SELECT header FROM pages WHERE page='about'";
                     $result = mysqli_query( $db_handle, $query);
                     $row = mysqli_fetch_array( $result);
                     $header = $row['header'];
                     echo sprintf("<p>%s</p>", $header);
                  /* Main */
                     $query = "SELECT main FROM pages WHERE page='about'";
                     $result = mysqli_query( $db_handle, $query);
                     $row = mysqli_fetch_array( $result);
                     $main = $row['main']; 
                     echo sprintf("<div class='text'>%s</div>",$main);
                    ?>
              </div> 
            </div>
      </div>
     <div class="footer">
           <?php
           /* Footer */
           $query = "SELECT footer FROM pages WHERE page='about'";
           $result = mysqli_query($db_handle, $query);
           $row = mysqli_fetch_array($result);
           $footer = $row['footer'];
           echo sprintf("<p>%s</p>", $footer);
           ?>
    </div>

</body>
</html>




