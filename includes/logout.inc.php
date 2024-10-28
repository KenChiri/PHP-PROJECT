<?php 

    //in the logout page we have to terminate the session inorder for the user to logout 
    //to terminate the session we say
    session_start();
    session_unset(); //clear the values inside the session variables without really destroying the session itself
    session_destroy();


    header("location: ../index.php");
    exit();