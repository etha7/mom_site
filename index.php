<html>
<body>
<?php
    session_start();
    require_once('config.php');
        $db_handle = mysqli_connect( $host, $user, $pass, $database)
                        or die("Failed to connect");
        mysqli_select_db($db_handle, $database);
?>

    <?php require_once('header.php');
          require_once('nav_bar.php') ?>
 
          <div class="jumbotron fadeIn">
            <div class = "box" >
                <div class="container">
                  
                   <?php
                   /* Title */
                  $query = "SELECT title FROM pages WHERE page='index'";
                  $result = mysqli_query($db_handle, $query);
                  $row = mysqli_fetch_array($result);
                  $title = $row['title'];
                  echo sprintf("<h1>%s</h1>", $title);
                 
        
                    /* Header */
                     $query = "SELECT header FROM pages WHERE page='index'";
                     $result = mysqli_query( $db_handle, $query);
                     $row = mysqli_fetch_array( $result);
                     $header = $row['header'];
                     echo sprintf("<p>%s</p>", $header);
                    /* Main */
                     $query = "SELECT main FROM pages WHERE page='index'";
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
           $query = "SELECT footer FROM pages WHERE page='index'";
           $result = mysqli_query($db_handle, $query);
           $row = mysqli_fetch_array($result);
           $footer = $row['footer'];
           echo sprintf("<p>%s</p>", $footer);
           ?>
    </div>

</body>
</html>

