<?php

    if(isset($_POST["submit"])) {

        $username = $_POST["uId"];
        $pwd = $_POST["pwd"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignIn($username, $pwd) !== false){
            header("location: ../loginPage.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $username, $pwd);

    }
    else {
        header("location: ../loginPage.php");
        exit();
    }