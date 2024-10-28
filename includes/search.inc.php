<?php
if (isset($_POST['input'])) {
    require 'dbh.inc.php';
    $input = $_POST['input'];

    // Use a prepared statement to prevent SQL injection
    $query = "SELECT regNumber, name, email, phoneNo, address FROM contacts WHERE regNumber LIKE ?";
    
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Add a '%' wildcard to the input for the LIKE clause
        $input = $input . '%';
        mysqli_stmt_bind_param($stmt, "s", $input);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            ?>
            <table id="searches">
                <thead>
                    <tr>
                        <th>RegNo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $regNo = $row['regNumber'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $phoneNo = $row['phoneNo'];
                        $address = $row['address'];

                        ?>
                        <tr>
                            <td><?php echo $regNo; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $phoneNo; ?></td>
                            <td><?php echo $address; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "<h5 class='fail'>User not found!</h5>";
        }
    } else {
        // Handle the case where the prepared statement could not be created.
        echo "Error in creating the prepared statement.";
    }
}
?>