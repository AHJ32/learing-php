<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "class_1(sql)";

    $con = mysqli_connect($server, $username, $password, $dbname);
    if ($con){
        echo "all is well";
    }
?>