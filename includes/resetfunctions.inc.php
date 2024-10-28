<?php

   // require 'dbh.inc.php';

    function emailExists($conn, $email) {
        $sql = "SELECT * FROM parent WHERE parentEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../forgotpwd.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "s", $email);
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