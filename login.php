<?php
    require_once('config.php'); 
    session_start();
    if($_POST) 
    {
        $username= $_POST['username'];
        $password= $_POST['password'];
        $db_handle= mysqli_connect($host, $user, $pass, $database)
            or die ('Could not connect to database');
        mysqli_select_db($db_handle, $database);

        $query = sprintf("SELECT COUNT(*) FROM Users WHERE UPPER(username) = UPPER('%s') AND 
        password='%s'", 
            mysqli_real_escape_string($db_handle, $username), 
            mysqli_real_escape_string($db_handle, md5($password)));
        $result = mysqli_query($db_handle, $query);

        if(!$result)
        {
                $count = 0;
                echo "FAIL";
        }
        else
        {
                list($count) = mysqli_fetch_row($result);
        }
        if($count == 1) 
        {          
             $_SESSION['authenticated'] = true;
             $_SESSION['username']=$username;    
        ?>
            <span style='color:green'>Login Successful.</span>
        <?php
            $query = sprintf("UPDATE Users SET last_login = NOW() WHERE UPPER(username) = 
            UPPER('%s') AND password = '%s'", 
            mysqli_real_escape_string($db_handle, $username),
            mysqli_real_escape_string($db_handle, md5($password)));
            $result = mysqli_query($query);
            list($is_admin) = mysqli_fetch_row($result);

	    $admin_query= sprintf("SELECT is_admin FROM Users 
		    WHERE username='%s' AND password='%s'",
		    $username, md5($password));
	    $result = mysqli_query($db_handle, $admin_query);
	    $row = mysqli_fetch_array($result);
	    $is_admin = $row['is_admin'];
            if($is_admin == 1)
            {
                    $_SESSION['is_admin'] = 1;
                    header("Location:./admin_home.php");
                    exit;
            }
            else
            {
                    $_SESSION['admin'] = 0;
                    header("Location:./index.php");
                    exit;
            }
        } 
        else
        {?>
            <span style = 'color:red'>
            That username and password combination is not currently in our database.</span>
        <?php             
        }
    }
?>



<html>
  <body>
  <?php require_once('header.php'); 
        require_once('nav_bar.php');?>
   
      <form action ='login.php' method='post' class="basic-grey">
              <label>
               <span class="formLabel"> Username: </span>
              <input type='text' name='username' id="username" tabindex=1 id="name" /><br/>
           </label>
           <label>
               <span class="formLabel"> Password: </span>
               <input type='password' name='password' tabindex=2  id="name"/><br/>
           </label>
           <label>
              <span>&nbsp;</span> 
              <input type='submit' value='login' class="button" value="Submit"/>
           </label> 
     </form>

   <script>
         window.onload = function()
        {
	   document.getElementById('username').focus();	
        }
   </script>
  </body> 
</html>

				


