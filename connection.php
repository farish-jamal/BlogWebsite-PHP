<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databse = "farishblog";

    $connection = mysqli_connect($servername, $username, $password, $databse);

    if(!$connection){
        echo '<div class="alert alert-danger" role="alert">
         There is error in Database --> '.mysqli_connect_error().'
      </div>';
    }
?>