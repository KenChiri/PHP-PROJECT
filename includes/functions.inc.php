<?php

 // These are the functions for the SignUp Page down below


 function emptyInputSignup($name,$email,$userName,$pwd,$pwdRepeat) {
    $result;
    if (empty($name)|| empty($email)||empty($userName)||empty($pwd)||empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
 }

 function invalidUID($userName) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
 }

 function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
 }


 
 function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
 }


  
 function uidEmailExists($conn, $userName, $email) {
    //So to check if a user ID or the Email exists we used this prepaired statement which uses sql query that 
    //checks for true or false if we choose the parentUserID the parent email becomes false, and vice versa
    $sql = "SELECT * FROM parent WHERE parentUserId= ? OR parentEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userName, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt); 

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
 }


 function createUser($conn, $name, $email, $userName, $pwd) {
    $sql = "INSERT INTO parent (parentName, parentEmail, parentUserId, parentPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    //hashing the password to make it not visible inside the database
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $userName, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
 }


 // These are the functions for the SignIn Page down below

 function emptyInputSignIn($username, $pwd) {
    $result;
    if (empty($username)||empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
 }


 function loginUser($conn, $username, $pwd) {
    //now we parse the same function in this other login system to check if the user has entered the correct values
    //So we can parse in username twice in this regard
    $uidExists = uidEmailExists($conn, $username, $username);

    //Now we check if it returns false we need to send the user back into the login page to sign in again
    if ($uidExists === FALSE){
        header("location: ../loginPage.php?error=incorrectEmail/Id");
        exit();
    }
    //Here we are using the associative array which stores the columns in the table in form of an array
    //In this case the row we want is parentPwd
    $pwdHashed = $uidExists["parentPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../loginPage.php?error=wrongpwd");
        exit();
    }
    //If the details are true we can then send the user into the website homepage
    //First we need to create a session in php
    else if($checkPwd == true){
        session_start();
        $_SESSION["parentid"] = $uidExists["parentId"];
        $_SESSION["parentuserId"] = $uidExists["parentUserId"];
        header("location: ../index.php");
    }
 }


