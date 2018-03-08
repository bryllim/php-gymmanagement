<?php
    $conn = mysqli_connect("localhost", "root", "", "ultimategym");
    
    if(!$conn){
        echo "Error connecting to the database";
        exit();
    }
return $conn;