<?php 
    include_once 'header.php'

?>
    <div class="grid">
        <nav class="navbar">
            <ul>
                <li><i id="hamburger" class="fa fa-bars"></i></li>
                <li><a href="index.php">BABY HOME</a></li>
                <li class="space"></li>
                <li>
                  <form action="includes/search.inc.php" method="post" id="search-form">
                    <input type="text" name="query" id="query" placeholder="Find another parent.." >
                    <i class="fa fa-search"></i>
                  </form>
                  
                </li>
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
            <li><a href=""><i class="fa fa-cog"></i><span class="icon-text">Templates</span></a></li>
            <li><a href=""><i class="fa fa-message"></i><span class="icon-text">Report Case</span></a></li>
            <li><a href=""><i class="fa fa-book"></i><span class="icon-text">Layouts</span></a></li>
            <li><a href=""><i class="fa fa-business"></i><span class="icon-text">Blog</span></a></li>
          </ul>
        </div>

        <div class="section">
            
        <h4>Home Menu</h4>

            <div class="dashboard">

                  
                <div class="profile">
                    <img src="photos/profile.png" alt="image"><br>
                            <?php
                              if (isset($_SESSION["parentuserId"])) {
                                echo "<h2> Welcome " . $_SESSION["parentuserId"] . "</h2>";
                              }
                              ?>

                </div>


              
                    <div class="babycare">
                      
                      <img class="fam" src="photos/family.jpg" alt="fam">

                      <h2>Baby Care Services</h2>

                    </div>
                    <div class="progress">
                      <img class="fam" src="photos/hero.jpg" alt="fam2">
                      <h2>Check Your Daily Progress</h2>


                    </div>
                 
                    


       
                <h1>Welcome to my baby and me</h1>

                  <p class="info">Your baby comes first in our platform. Get to experience the AI technology meant to help parents across the world.
                    From, monitoring baby vitals to setting daily goals to well informed "How do I know " questions. Don't worry we've got you covered.
                    Introducing a social network to help you connect with other parents. <a href="chatroom.php">Chat Rooms</a> is the place for you.
                    To baby sitters, to our online shop, to babyproffing the house. You need it we've got it. Thank You for choosing my baby and me
                  </p>
              
               
        </div>
        <div id="search-results">
                        <h2>Search Results</h2>
                        <!-- Search results will be displayed here -->
                        
                   </div>
      
                      <div class="slideshow">
                        <div class="slideshow-images">
                          <img src="photos/girl.jpg" alt="Image 1">
                          <img src="photos/momchild.jpg" alt="Image 2">
                          <img src="photos/family.jpg" alt="Image 3">
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="js/index.js"></script>
  
</body>
</html>