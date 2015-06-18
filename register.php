<?php
    require_once('config.php');
	if($_POST) {
		$password = $_POST['password'];
		$confirm = $_POST['confirm'];	
		if($password != $confirm) { ?>
<span style='color:red'>Error: Passwords do not match!</span>		
<?php	} else {
            
			$db_handle = mysqli_connect($host,$user,$pass, $database)
				or die ('Error connecting to mysql');
			mysqli_select_db($db_handle, $database);
            $query = sprintf("SELECT COUNT(*) FROM Users WHERE UPPER(username) = UPPER('%s')", mysqli_real_escape_string($db_handle, $_POST['username']));

            $result = mysqli_query($db_handle, $query);

            if(!$result) {
               $count = 0;
            } else {
               list($count) = mysqli_fetch_row($result);
            }

			if($count >= 1) { ?>
<span style='color:red'>Error: that username is taken.</span>
<?php		} else {
				$query = sprintf("INSERT INTO Users (username, password, company, email) VALUES ('%s','%s', '%s', '%s');",
					mysqli_real_escape_string($db_handle, $_POST['username']),
                    mysqli_real_escape_string($db_handle, md5($password)),
                    mysqli_real_escape_string($db_handle, $_POST['company']),
                    mysqli_real_escape_string($db_handle, $_POST['email']));
                $result= mysqli_query($db_handle, $query);
                if(!$result)
                           echo "sad";
               
			?>
<span style='color:green'>Congratulations, you registered successfully!</span>
<?php
		
			}	
		}
	}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./styleCopy.css">
</head>
<body>
<form method='post' action='register.php' class="basic-grey">
<label>
    <span> Username: </span>
    <input type='text' name='username' id='username' /><br />
<label>
<label>
    <span> Password: </span>
    <input type='password' name='password' /><br />
</label>
<label>
    <span> Confirm Password: </span>
    <input type='password' name='confirm' /><br />
</label>
<label>
    <span> Company: </span>
    <input type='text' name='company' /><br />
</label>
<label>
    <span> Email: </span>
    <input type='text' name='email' /><br />
</label>
<label>
    <span>&nbsp;</span>
    <input type='submit' value='Register!' class="button" />
</label>
</form>
    <script>
        window.onload = function()
        { 
                document.getElementById('username').focus();
        }
    </script>
</bodY>
</html>
