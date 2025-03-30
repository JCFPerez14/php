<?php
    $connections = mysqli_connect( "localhost", "root",  "",  "code-ni-sir");

        if(mysqli_connect_errno()){
            echo "Failed to connect to MYSQL." .mysqli_connect_error();
        }
?>