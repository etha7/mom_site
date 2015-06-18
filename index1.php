<html>
<body>
<head>
   <link rel="stylesheet" type="text/css" href="style1.css" media="screen">
</head>
    
 
          <div class="jumbotron fadeIn">
	    <div class = "box" >
            	<div class="container">
             
                 <h1>
                    Lyssa DeSon Associates                  
                 </h1>
                 <?php
                     require_once('config.php');
                     $database = "a7735960_text";  
                     $user = "a7735960_text";
                     $db_handle = mysqli_connect( $host, $user, $pass, $database)
                        or die("Failed to connect");
                     mysqli_select_db($db_handle, $database);
                     $query = "SELECT header FROM pages WHERE page='index'";
                     $result = mysqli_query( $db_handle, $query);
                     $row = mysqli_fetch_array( $result);
                     $header = $row['header'];
                     echo sprintf("<p>%s</p>", $header);
                    ?>
              </div> 
            </div>
          </div>




<table align="bottom">
  <tbody><tr>
   <td valign="center">
    
    <div class="nav fadeIn">
        <div class="container">
                <ul>
                    <li> 
                        <div class="btn fadeIn">
                            <a href="index.html">HOME</a>
                        </div> 
                    </li>
                    <li> 
                       <div class="btn fadeIn">
                            <a href="about.html">ABOUT</a>
                       </div> 
                     </li>
                     <li> 
                       <div class="btn fadeIn">
                            <a href="contact.html">CONTACT</a>
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
    
</body>
</html>

