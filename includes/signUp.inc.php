<?php 

    if(isset($_POST["submit"])){
        
        $name = $_POST["parentName"];
        $email = $_POST["parentEmail"];
        $userName = $_POST["parentUserId"];
        $pwd = $_POST["parentPwd"];
        $pwdRepeat = $_POST["pwdRepeat"];


        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignup($name,$email,$userName,$pwd,$pwdRepeat) !== false){
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if (invalidUID($userName) !== false){
            header("location: ../signup.php?error=invalidUID");
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidEmail");
            exit();

        }
        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../signup.php?error=passwordDoesntMatch");
            exit();

        }
        if(uidEmailExists($conn, $userName, $email) !== false){
            header("location: ../signup.php?error=usernameormailIsTaken");
            exit();

        }

        createUser($conn, $name, $email, $userName, $pwd);

    }
    else {
        header("location: ../signup.php");
        exit();
    }