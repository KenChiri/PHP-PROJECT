<?php
var_dump($_POST);


    if(isset($_POST["reset-request-submit"])){
        require 'dbh.inc.php';
        require 'resetfunctions.inc.php';
        

        $email = $_POST["parentEmail"];

        $user = emailExists($conn, $email);

        //Here we first have to create a token a token is used to uniquely identify the user inside the user
        //First token is used to select a user
        if(empty($email)){
            header('Location:../forgotpwd.php?error=empty');
            exit();
        }
        if(!$user){
            header("location: ../forgotpwd.php?error=noemail");
            exit();

        } else {

        


        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);


        $url = "http://localhost/MY%20BABY%20AND%20ME/newpwd.php?selector=" . urlencode($selector) . "&validator=" . urlencode(bin2hex($token));


        $expires = date("U") + 1800;



        //check if the email exists first 



        //First step is to just delete any token that is inside the database to ensure that the user isn't already trying to reset the token
        $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../forgotpwd.php?error=stmtfailed");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
        }
        //Now we just need to reset the 
        $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../forgotpwd.php?error=stmtfailed");
            exit();
        }
        else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);//Now we add the token which we didn't convert to hexadecimal because it will be stored in the database securely throught hashing
            mysqli_stmt_bind_param($stmt, "ssss", $email, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt); 
        mysqli_close($conn); //Remember we have to close the connection to the database just to secure our resources

        //Now we can finally send the email to the user

        $sendTo = $email;

        $subject = "PASSWORD RESET FOR CARS WEBSITE"; //This is the subject of the email
        $message.= "<p>Your My Baby and Me password can be reset by clicking the link below:</br>";
        $message.= '<a href="'. $url .'">'.$url. '</a></p>';

        $headers = "From: Kenny <kennethpepper56@gmail.com>\r\n"; //r moves cursor to the next entry point and n moves the entry to a new line
        $headers .= "Reply-To: kennethpepper56@gmail.com\r\n";
        $headers .= "Content-type: text/html\r\n";
        mail($sendTo,$subject,$message, $headers);

        header("location: ../forgotpwd.php?reset=success");


    }

    }
    else {
        header("location: ../loginPage.php");
        exit();
    }