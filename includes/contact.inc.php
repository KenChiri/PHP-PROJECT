<?php 

if(isset($_POST['submit-contacts'])) {
    require 'dbh.inc.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNo = $_POST['phone'];
    $prefix = $_POST['prefix'];
    $address = $_POST['address'];

    function generate_registration_number($prefix) {
        $current_year = date('Y');
        $current_month = date('m');
        $sequence_number = 1;
      
        $regNo = $prefix . '/' . $current_year . '/' . $current_month . '/' . str_pad($sequence_number, 2, '0', STR_PAD_LEFT);
      
        return $regNo;
      }

      $regNumber = generate_registration_number($prefix);

      function createContact($conn, $regNumber, $name, $email, $phoneNo, $address) {
        $sql = "INSERT INTO contacts (regNumber, name, email, phoneNo, address) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../contact.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "sssss", $regNumber, $name, $email, $phoneNo, $address);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../contact.php?error=none");
        exit();
        }

        function emptyInput($regNumber, $name, $email, $phoneNo, $address) {
            $result;
            if (empty($name)|| empty($email)||empty($regNumber)||empty($phoneNo) || empty($address)){
                $result = true;
            }
            else {
                $result = false;
            }
            return $result;
         }

        if (emptyInput($regNumber, $name, $email, $phoneNo, $address) !== false){
            header("location: ../contact.php?error=emptyinput");
            exit();
        }

        createContact($conn, $regNumber, $name, $email, $phoneNo, $address);
} else {
    header("location: ../contact.php");
    exit();
}
