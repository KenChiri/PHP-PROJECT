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
            <li><a href=""><i class="fa fa-user"></i><span class="icon-text">Templates</span></a></li>
            <li><a href=""><i class="fa fa-message"></i><span class="icon-text">Report Case</span></a></li>
            <li><a href=""><i class="fa fa-book"></i><span class="icon-text">Layouts</span></a></li>
            <li><a href=""><i class="fa fa-newspaper"></i><span class="icon-text">Blog</span></a></li>
          </ul>
        </div>

        <div class="section">
            <div class="dashboard">
              <table border="1">
                <tr>
                  <th colspan="3">My User Dashboard</th>
                </tr>
                <tr>
                  <td rowspan="4">
                    <img src="photos/profile_m.png" alt="image" height="200px" width="200px"><br>
                    <?php
                      if (isset($_SESSION["parentuserId"])) {
                        echo "<h2> Welcome " . $_SESSION["parentuserId"] . "</h2>";
                      }
                      ?>
                  </td>
                  <td></td>
                  <td>
                    Name: <!-- Add the name of the user here -->
                  </td>
                </tr>
              </table>
            </div>


       
                <h1>Welcome to my baby and me</h1>

                  <p class="info">An effective way to utilize the resources we have to connect you to other officers across the country
                      handle cases, upload reports and generate them in an instant. Save time, be accurate and provide safety 
                      across the roads.</p>
              
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