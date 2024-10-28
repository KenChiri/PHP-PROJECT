<?php 
    include_once 'body.php'
?>

<div class="container">
                        <div class="signin" style="border-radius: 10px;">
                         <?php
                         var_dump($_POST);
                            $selector = $_GET["selector"];
                            $validator = $_GET["validator"];

                            if(empty($selector)|| empty($validator)){
                                echo "Could not validate your request!";
                            } else {
                                if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ){
                                    ?>
                                    
                                      <form action="includes/resetpwd.inc.php" method="post">
                                        <input type="hidden" name="selector" value="<?php echo $selector ?>">
                                        <input type="hidden" name="validator" value="<?php echo $validator ?>">
                                         <label for="new-pwd">Enter the new password</label><br>
                                         <input type="password" name="newPwd" placeholder="enter new password"><br>
                                         <label for="repeatNewPwd">Repeat the new password:</label><br>
                                         <input type="password" name="pwdRepeat" placeholder="Repeat new password"> <br>
                                        <br>
                                        <button type="submit" name="reset-password-submit">Reset Password</button>
                                    
                                     </form>
                                     <?php

                                }
                            }
                        ?>

                        <?php

                            if(isset($_GET["newpwd"])){
                                if($_GET["newpwd"]== "empty"){
                                    echo "<p>Fill in all fields</p>";
                                }
                                if($_GET["newpwd"]== "passwordDoesntMatch"){
                                    echo "<p>Passwords doesn't match.Please select matching passwords.</p>";
                                }
                                if($_GET["newpwd"]== "stmtfailed"){
                                    echo "<p>Could not reset your password.</p>";
                                }
                                if($_GET["newpwd"]== "passwordupdated"){
                                    echo '<p class="signupSuccess">You have successully updated your password!</p>';
                                }
                            }
                        ?>


                        </div>

                        
                       <!-- <div id="step1">
                           
                            <form action="includes/signUp.inc.php" method="post">
                                Tell us your name <br>
                                <input type="text" name="parentName" placeholder="Anna Thompson"> <br>
                                Email address: <br>
                                <input type="email" name="parentEmail"> <br>
                                Enter a preferred User Name: <br>
                                <input type="text" name="parentUserId"> <br>
                                Create Password: <br>
                                <input type="password" name="parentPwd"> <br>
                                Rewrite your Password: <br>
                                <input type="password" name="pwdRepeat"> <br>
                                <br>

                                <button type="submit" name="submit">Sign Up</button>  <button id="next">Next</button>
                              
                            </form>
                           
                            
                        </div>
                        <div id="step2" style="display: none;">
                            <p>We are almost ready for setting you up. </p>
                            Lets get your baby set up...
                            <h2>Fun Fact</h2>
                            <p>
                            Newborns often smile in their sleep, and these smiles are not necessarily related to any external stimulus. It's sometimes referred to as a "social smile" and is an early form of communication
                            </p>
                            <form action="baby registration"></form>
                            <button id="prev">Previous</button>
                            <button id="next2">Next</button>
                        </div>
                        <div id="step3" style="display: none;">
                            <p>What type of family are you?</p>

                            <label for="singleMom"><input type="radio" id="singleMom" name="familyType" value="Single Mom"> Single Mom</label><br>
                            <label for="marriedCouple"><input type="radio" id="marriedCouple" name="familyType" value="Married Couple"> Married Couple</label><br>
                            <label for="guardian"><input type="radio" id="guardian" name="familyType" value="Guardian"> Guardian</label><br>
                            <button id="prev2">Previous</button>
                            <button id="next3">Next</button>
                        </div>
                    
                <div id="step4" style="display: none;">
                    <p>Great! We have finished setting up your account. Welcome to our website.</p>
                </div> -->
           
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const step1Form = document.getElementById('step1-PwdReset');
                const step2Form = document.getElementById('step2-PwdReset');
                const nextButton = document.getElementById('next-button');
                const verificationInput = document.getElementById('verification-input'); // Add the ID of your verification input field
                const verificationCode = "YourVerificationCode"; // Replace with the actual verification code

                // Function to hide the first form and show the second form
                function showStep2Form() {
                    step1Form.style.display = 'none';
                    step2Form.style.display = 'block';
                }

                // Attach an event listener to the "Next" button
                nextButton.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent form submission (if applicable)
                    
                    // Check if the entered verification code is correct
                    if (verificationInput.value === verificationCode) {
                        showStep2Form(); // Show the second form
                    } else {
                        // Display an error message or take other actions if verification is wrong
                        alert("Verification code is incorrect. Please try again.");
                    }
                });
            });
</script>
<footer>CopyRight @ My Baby and Me</footer>

    </div> 
    
</body>
</html>

