<?php

    $ServerName = "localhost";
    $dBUsername = "root";
    $dbPassword = "";
    $dbName="mybabyandme";

    $conn = mysqli_connect($ServerName, $dBUsername, $dbPassword, $dbName);

    if(!$conn){
        die("Connection failed:". mysqli_connect_error()); //Die is to display an error message or custom error message
        //mysqli_connect_error() is a function which
    }