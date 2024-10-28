<?php 
    include_once 'body.php';
?>

<div class="container">
            

                        <div class="signin" style="border-radius: 10px">
                            <h2>Glad Your Back</h2>
                            <h1>Sign In</h1>
                            <form action="includes/signIn.inc.php" method="post">
                                <label for="email">Email Address</label><br>
                                <input type="text" name="uId" placeholder="username or Email"><br>
                                <label for="password">Password</label><br>
                                <input type="password" name="pwd"><br>
                                
                                <br>
                                <button type="submit" name="submit">Sign In</button>

                               

                            </form>
                            <?php
                //this piece of php code is used to 

    if(isset($_GET["error"])){
        if($_GET["error"]== "emptyinput"){
            echo "<p>Fill in all fields</p>";
        }
        else if($_GET["error"]== "incorrectEmail/Name"){
            echo "<p>Username or Email is incorrect. Please try again.</p>";
        }
        else if($_GET["error"]== "wrongpwd"){
            echo "<p>Password is incorrect. Please try again.</p>";
        }
        else if($_GET["error"]== "stmtfailed"){
            echo "<p>Something went wrong, try again!</p>";
        }
        else  if($_GET["error"]== "none"){
            echo "<p>All set! Welcome To My Baby!</p>";
        }
        
        
    }

?>

                            <a href="forgotpwd.php">Forgot password?</a><br>
                            First time here?<a href="signup.php">Create and account</a> <br>
            
                        </div>
                 <!--       <div id="step1">
                            <h2>Create an Account</h2>
                            <h1>Sign Up</h1>
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
                </div>
            -->
            
        </div>
             <script src="js/script.js"></script>   
    </div> 
    <footer>CopyRight @ My Baby and Me</footer>
</body>
</html>