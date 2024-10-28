
<?php 
    include_once 'header.php'
?>
    <div class="grid">
        <nav class="navbar">
            <ul>
                <li><i id="hamburger" class="fa fa-bars"></i></li>
                <li><a href="index.php">BABY HOME</a></li>
                <li class="space"></li>
                <li><i class="fa fa-search"></i></li>
                <li><a href="profiles.php">My Profile</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>Blog</li>
                <li>Showcase</li>
              <?php
                if(isset($_SESSION["parentuserId"])) {

                    echo '<li> <a href="profile.php"><i class="fa fa-user"></i><span class="icon-text">User Profile</span></a></li>';
                    echo '<li> <a href="includes/logout.inc.php"><i class="fa fa-right-from-bracket"></i><span class="icon-text">LogOut</span></a></li>';
                }
                else {
                  echo '<li> <a href="loginPage.php"><i class="fa fa-right-to-bracket"></i><span class="icon-text"> LogIn.</span></a></li>';
                }
              ?>
                <li><i id="darkModeToggle"class="fa fa-moon"></i></li>
            </ul>
        </nav>

        <div class="sidebar">
          <ul>
            <li><a href=""><i class="fa fa-user"></i><span class="icon-text">User</span></a></li>
            <li><a href=""><i class="fa fa-message"></i><span class="icon-text">Notifications</span></a></li>
            <li><a href=""><i class="fa fa-book"></i><span class="icon-text">Study</span></a></li>
            <li><a href=""><i class="fa fa-newspaper"></i><span class="icon-text">Events</span></a></li>
            <li><a href=""><i class="fa fa-cog"></i><span class="icon-text">Settings</span></a></li>
            <li><a href=""><i class="fa fa-message"></i><span class="icon-text">Replies</span></a></li>
            <li><a href=""><i class="fa fa-book"></i><span class="icon-text">Layouts</span></a></li>
            <li><a href=""><i class="fa fa-business"></i><span class="icon-text">Blog</span></a></li>
          </ul>
        </div>

        <div class="section">
                <div class="cont">
                 <div class="Say_Hi">
                                <form action="includes/contact.inc.php" method="post">
                                    <table id="contacts">
                                        <caption >CONTACT US</caption>
                                            <tr>
                                                <th colspan="2">Work Contacts</th>
                                            </tr>
                                            <tr>
                                            <td>Create regNo:</td>
                                            <td><input type="text" name="prefix" placeholder="Department"></td>
                                            </tr>
                                            <tr>
                                                <td><label for="">Your names:</label> </td>
                                                <td> 
                                                <input type="text" name="name">
                                                </td>
                                            </tr>
                                            <tr>
                                            <td>Enter your email:<i class="fa fa-envelope" aria-hidden="true"></i></td>
                                            <td><input type="email" name="email"></td>
                                            </tr>
                                            <tr>
                                            <td><label for="">And your phone:</label></td>
                                            <td><input type="text" name="phone"></td>
                                            </tr>
                                            <tr>
                                            <td><label for="">Enter your address:</label></td>
                                            <td><input type="text" name="address"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" style="text-align:center;"><input type="submit" name="submit-contacts" value="Send It"></td>
                                            </tr>
                                      </table>
                                </form>
                     </div>
             </div>  



              
                <div class="slideshow">
                    <div class="slideshow-images">
                      <img src="officer.png" alt="Image 1">
                      <img src="image2.jpg" alt="Image 2">
                      <img src="image3.jpg" alt="Image 3">
                    </div>
                    <div class="dots">
                      <span class="dot"></span>
                      <span class="dot"></span>
                      <span class="dot"></span>
                    </div>
                </div>
                <button class="btnlogin"  id="getStartedButton"><a href="loginPage.php">Get Started</a> </button>

                <footer>CopyRight @ My Baby and Me</footer>
        </div>
    </div>
  <script src="js/index.js"></script>
  
</body>
</html>