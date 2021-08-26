<?php
    $base = mysqli_connect('localhost', 'root', '', 'stock_management');
    echo"<ol><li>";
    if (mysqli_connect_errno($base))
        echo"Failed to connect to $base: ".mysqli_connect_error()." </li>";
    else 
        echo"<p>Connected to the DB sucessful!!</p></li>";

?>