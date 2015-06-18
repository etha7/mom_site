<!DOCTYPE html>
<html>
<body>
  <head>
        <link rel="stylesheet" type="text/css" href="style2.css" media="screen">
  </head>
<div class="nav fadeIn">
	    <div class="container">
                <ul>
                    <li> 
                        <div class="btn">
                            <a href="index.php">HOME</a>
                        </div> 
                    </li>
                    <li> 
                       <div class="btn">
                            <a href="about.php">ABOUT</a>
                       </div> 
        		    </li>
                     <li> 
                       <div class="btn">
                            <a href="contact.php">CONTACT</a>
                       </div> 
                    </li>

                </ul>

             </div>
         </div>








<?php
    /* Prevent Non-admins from accessing page */
    session_start();
    if($_SESSION['is_admin'] != 1)
       header("Location:./error.php");
    
    require_once('config.php');
    $database = "a7735960_text"; //database to hold all text used in website. 
    $user = "a7735960_text";
    $db_handle = mysqli_connect($host, $user, $pass, $database)
            or die("Failed to connect");
    mysqli_select_db($db_handle, $database);

    if(!isset($_POST["submit"])) //If haven't submitted, generate page
    {
      
?>


<html>
    <body>
      <head>
        <link rel="stylesheet" type="text/css" href="./styleAdmin_home.css"> 
      </head>
      <h1>  <h1>
      <fieldset>
           
      <ul>
        <?php

        /* Title */  
         $query = "SELECT title FROM pages WHERE page='admin_home'";
         $result = mysqli_query($db_handle, $query);
         $row = mysqli_fetch_array($result);
         $title = $row['title'];
         echo sprintf("<span>%s</span><br>", $title);
         if(isset($_POST['page']))
         {
                 echo sprintf("<p>Now editing: %s</p>", $_POST['page']);
         }
         else
                 echo "<p>Choose a page to edit in the dropdown menu below! :)</p> ";
        ?>
        
         
        
        <form method="POST" id="pageForm" name="pageForm" 
            action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
      <div class = "styled-select" align = "justify">
                  <select id="page" value="pages" name="page" onchange="onSelectChange();">

           <?php
                echo "<option></option>";
                $query="SELECT page FROM pages";
                $result = mysqli_query($db_handle, $query);
                echo mysqli_error($db_handle);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $page = $row["page"];
                echo "<option>".$page."</option>";
               
                while( $row = mysqli_fetch_array($result)) //Generate dropdown
                {
                    $page=$row["page"];
                       echo "<option>".$page."</option>";
                }
           ?>
             </select>
             
    </div>
    </form>


      <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" >
       <div class="fieldset">
       

             
        
            <?php 
                $queryTitle = sprintf("SELECT title FROM pages WHERE page='%s'", 
                       mysqli_real_escape_string( $db_handle,  $_POST['page']));
                $result= mysqli_query($db_handle, $queryTitle);
                $row = mysqli_fetch_array($result);
                $currTitle = $row['title'];

                $queryHeader = sprintf("SELECT header FROM pages WHERE page='%s'", 
                       mysqli_real_escape_string( $db_handle,  $_POST['page']));
                $result= mysqli_query($db_handle, $queryHeader);
                $row = mysqli_fetch_array($result);
                $currHeader = $row['header'];

                $queryMain = sprintf("SELECT main FROM pages WHERE page='%s'", 
                       mysqli_real_escape_string( $db_handle,  $_POST['page']));
                $result= mysqli_query($db_handle, $queryMain);
                $row = mysqli_fetch_array($result);
                $currMain = $row['main'];

                $queryFooter = sprintf("SELECT footer FROM pages WHERE page='%s'", 
                       mysqli_real_escape_string( $db_handle,  $_POST['page']));
                $result= mysqli_query($db_handle, $queryFooter);
                $row = mysqli_fetch_array($result);
                $currFooter = $row['footer'];

             ?>


            <li> Title: <input type="text" name="title" 
                                 value="<?php echo $currTitle ?>"> </li>
            <li> Header: <input type="text" name="header"
                                 value="<?php echo $currHeader ?>"> </li>
            <li> Main: <br><textarea type="text" name="main" cols="50" rows="10">
                           <?php echo $currMain?></textarea> </li>
            <li> Footer: <input type="text" name="footer"
                                value="<?php echo $currFooter?>"></li>
            <li> Add a new page to list of pages: <input type="text" name="newpage"></li>
            <input type="hidden" name="page" value="<?php echo $_POST['page']?>">
	<p class = "submit" >
          <input type="submit" name="submit" value="Submit">
	</p>
        </ul>
        </div>
       
      </form>
      </fieldset>
     <div class="footer">
           <?php
           /* Footer */
           $query = "SELECT footer FROM pages WHERE page='admin_home'";
           $result = mysqli_query($db_handle, $query);
           $row = mysqli_fetch_array($result);
           $footer = $row['footer'];
           echo sprintf("<p>%s</p>", $footer);
           ?>
    </div>
    </body>
    <script language="javascript">
                function onSelectChange(){
                document.getElementById("pageForm").submit(); 
                }
    </script>

</html>
<?php
    }
    else //If have submitted, update database with given values
    {
    $page = $_POST['page'];
    $title = $_POST['title'];
    $header= $_POST['header'];
    $main = $_POST['main'];
    $footer = $_POST['footer'];
    $newpage= $_POST['newpage'];

    /* Update Database */
    if( $title != '')
    {
            $query = sprintf("UPDATE pages SET title='%s' WHERE page='%s'",   
            $title, $page);
            mysqli_query($db_handle, $query);
    }
    if( $header != '')
    {
       $query = sprintf("UPDATE pages SET header='%s' WHERE page='%s'", 
       $header, $page);
       mysqli_query($db_handle, $query);
    }
    if( $main != '')
    {
       $query = sprintf("UPDATE pages SET main='%s' WHERE page='%s'", 
       $main, $page);
       mysqli_query($db_handle, $query);
    }
    if( $footer != '')
    {
       $query = sprintf("UPDATE pages SET footer='%s' WHERE page='%s'", 
               $footer, $page);
        mysqli_query($db_handle, $query);
    
    }
    /* Add a new page to list of pages */
    if($newpage != '')
    {
      $query = sprintf("INSERT INTO pages (page) VALUES ('%s')", $newpage);    
      mysqli_query($db_handle, $query);
    }
    mysqli_query($db_handle, $query);
    header("Location:".htmlentities($_SERVER['PHP_SELF']));
    die();
    }
?>





    
    

    
    
