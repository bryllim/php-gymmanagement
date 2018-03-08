<html>
    <head>
        <title>Programs | The Ultimate Gym</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/w3.css" rel="stylesheet">
        <link href="fonts/Montserrat-Regular.otf" rel="stylesheet">
        <link href="css/fontawesome-all.min.css" rel="stylesheet">
        <style>
        body, h1,h2,h3,h4,h5,h6{
            font-family: "Montserrat", sans-serif
            }
        .w3-row-padding img{
            margin-bottom: 12px
            }
        /* Set the width of the sidebar to 120px */
        .w3-sidebar {
            width: 120px;
            background: #222;
            }
        /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
        #main {
            margin-left: 120px
            }
        /* Remove margins from "page content" on small screens */
        @media only screen and (max-width: 600px) {
            #main {margin-left: 0}}
            .mySlides {display:none}
            
        </style>
    </head>
    
<body class="w3-black">

    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-center">
      <!-- Avatar image in top left corner -->
      <img style="width:100%" src="images/ultimategym_logo.png">
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="home.php">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="user.php">
        <i class="fa fa-user w3-xxlarge"></i>
        <p>PROFILE</p>
      </a>
        <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
        <i class="fa fa-th-list w3-xxlarge"></i>
        <p>PROGRAMS</p>
      </a>
        <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="contact.php">
        <i class="fa fa-envelope w3-xxlarge"></i>
        <p>CONTACT</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="logout.php" onclick="return confirm('Are you sure you wish to logout?');">
        <i class="fa fa-sign-out-alt w3-xxlarge"></i>
        <p>LOG OUT</p>
      </a>
    </nav>

<!-- Page Content -->
    <div class="w3-padding-large" id="main">
        <!-- Grid for pricing tables -->
        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-half w3-margin-bottom">
            <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">BULKING</li>
              <li class="w3-padding-16">A workout routine tailored to exponentially increase muscle mass.</li>
              <li class="w3-padding-16">
                <img src='images/bulking.jpg'>
                <h2>₱200.00</h2>
                <span class="w3-opacity">per month</span>
              </li>
              <li class="w3-light-grey w3-padding-24">
                <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-white w3-padding-large w3-hover-black">View</button>
              </li>
            </ul>
          </div>
            <div id="id01" class="w3-modal w3-animate-opacity">
                <div class="w3-modal-content w3-white">
                  <header class="w3-container w3-black"> 
                    <span onclick="document.getElementById('id01').style.display='none'" 
                    class="w3-button w3-display-topright">&times;</span>
                    <h2 class='w3-center'><b>BULKING PROGRAM</b></h2>
                  </header>
                        <h3 class='w3-center'><b>DAY 1</b></h3>
                          <li class="w3-bar">
                              <img src="images/programs/bulking/1.jpg" class="w3-bar-item" style="width:85px">
                              <div class="w3-bar-item">
                                <span class="w3-large">Barbell Bench Press - Medium Grip</span><br>
                                <span>4 sets</span>
                              </div>
                            </li>
                            <li class="w3-bar">
                              <img src="images/programs/bulking/2.jpg" class="w3-bar-item" style="width:85px">
                              <div class="w3-bar-item">
                                <span class="w3-large">Barbell Incline Press - Medium Grip</span><br>
                                <span>3 sets</span>
                              </div>
                            </li>
                            
                  <footer class="w3-container w3-black">
                    <p> </p>
                  </footer>
                </div>
              </div>

          <div class="w3-half">
            <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">CUTTING</li>
              <li class="w3-padding-16">Set of exercises to shred muscles and display a chiseled figure.</li>
              <li class="w3-padding-16">
                <img src='images/cutting.png'>
                <h2>₱220.00</h2>
                <span class="w3-opacity">per month</span>
              </li>
              <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-white w3-padding-large w3-hover-black">View</button>
              </li>
            </ul>
          </div>
            
            <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-half w3-margin-bottom">
            <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">CARDIO</li>
              <li class="w3-padding-16">An exercise program to increase cardiovascular endurance.</li>
              <li class="w3-padding-16">
                <img src='images/cardio.png'>
                <h2>₱190.00</h2>
                <span class="w3-opacity">per month</span>
              </li>
              <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-white w3-padding-large w3-hover-black">View</button>
              </li>
            </ul>
          </div>

          <div class="w3-half">
            <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">CLOSE-COMBAT</li>
              <li class="w3-padding-16">One-on-one training sessions to teach self-defense moves and tactics.</li>
              <li class="w3-padding-16">
                <img src='images/closecombat.jpg'>
                <h2>₱325.00</h2>
                <span class="w3-opacity">per month</span>
              </li>
              <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-white w3-padding-large w3-hover-black">View</button>
              </li>
            </ul>
          </div>
            
            
    </div>
    </div>
    </div>
    </body>
<script>
</script>
</html>