<?php 

    if(isset($_POST["reset-password-submit"])){
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["newPwd"];
        $passwordRepeat = $_POST["pwdRepeat"];

        if(empty($password)|| empty($passwordRepeat)){
            header("location: ../newpwd.php?newpwd=empty");
            exit();
        } else if($password != $passwordRepeat){
            header("location: ../newpwd.php?newpwd=passwordDoesntMatch");
            exit();
        }
        //creating current date variable
        $currentDate = date("U");

        require 'dbh.inc.php';

        $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?"; 
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../forgotpwd.php?newpwd=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $selector,$currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if(!$row = mysqli_fetch_assoc($result)){
                echo "you need to re-submit your reset request";
                exit();
            }else{


                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if($tokenCheck === false){
                    echo "you need to re-submit you reset request.";
                    exit();
                }elseif ($tokenCheck === true){
                    $tokenEmail = $row['pwdResetEmail'];

                    $sql = "SELECT * FROM parent WHERE parentEmail=?;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("location: ../newpwd.php?newpwd=stmtfailed");
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt,"s", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        if(!$row = mysqli_fetch_assoc($result)){
                            echo "There was an error";
                            exit();
                        }else{
                            //Update the password from inside the parent table
                            $sql = "UPDATE parent SET parentPwd=? WHERE parentEmail=?;";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header("location: ../newpwd.php?newpwd=stmtfailed");
                                exit();
                            }
                            else {
                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);

                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash,$tokenEmail);
                                mysqli_stmt_execute($stmt);
                                
                                $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
                                $stmt = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmt, $sql)){
                                    header("location: ../forgotpwd.php?newpwd=stmtfailed");
                                    exit();
                                }
                                else {
                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("location: ../loginPage.php?newpwd=passwordupdated");
                                }
                                
                            }

                        }



                    }


                }

            }
        }

    } else {
        header("location: ..loginPage.php");
    }