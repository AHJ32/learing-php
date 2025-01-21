<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "anamul ";

    $con = mysqli_connect($server, $username, $password, $dbname);
    if ($con){
        echo "all is well";
    }
?>