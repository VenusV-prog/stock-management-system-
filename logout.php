<?php
   session_start();
   session_destroy();
   echo '<h1>You have been logged out.</h1> <h1><a href="index.php">Go back To Index</a></h1>';
?>
