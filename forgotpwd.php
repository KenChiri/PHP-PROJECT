<?php 
    include_once 'body.php'
?>
<div class="container">
            

                        <div class="signin" style="border-radius: 10px;">
                            <div id="step1-PwdReset">
                                    <h1>Reset Password</h1>
                                    <form action="includes/reset-request.inc.php" method="post">
                                        <label for="reset-code">Enter the account email:</label><br>
                                        <input type="email" name="parentEmail"> <br>
                                        <br>
                                        <button type="submit" name="reset-request-submit">NEXT</button>

                                    </form>
                                    <?php
                                            if(isset($_GET["reset"])){
                                            if($_GET["reset"]== "success"){
                                                echo '<p class="signupSuccess">Check email for password reset instruction.</p>';
                                            }
                                        }
                                        if(isset($_GET["error"])){
                                            if($_GET["error"]=="empty"){
                                                echo "<p>Please fill in the email in the required field.</p>";
                                            }
                                            if($_GET["error"]=="noemail"){
                                                echo "<p>Sorry, email does not exist.</p>";
                                            }


                                        }
                                    ?>
                            </div>
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
       <!-- <script>
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
</script> -->

    </div> 
</body>
</html>

