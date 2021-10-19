<?php
    $conn=mysqli_connect("localhost","root","root","website_data");

    if($conn) {
        //connection successful
    }else{
        echo "Connection to database failed" . "<br><br>";
    }
?>