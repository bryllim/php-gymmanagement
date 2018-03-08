<html>
    <head>
        <title>Contact | The Ultimate Gym</title>
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
        <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="program.php">
        <i class="fa fa-th-list w3-xxlarge"></i>
        <p>PROGRAMS</p>
      </a>
        <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
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
          <!-- Contact Section -->
      <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
        <h2 class="w3-text-light-grey">Contact Us</h2>
        <hr class="w3-opacity" style="width:200px">

        <div class="w3-section">
          <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> 2nd Floor G7 Building above KFC facing USC Talamban Campus, Nasipit, Talamban, Cebu City, Cebu 6000</p>
          <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: +63 (905) 521 0329</p>
          <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: theultimategym@gmail.com</p>
        </div><br>
        <p>Need assistance? Have questions, suggestions, complaints, or recommendations? Get in touch. Send us a message:</p>

        <form action="/action_page.php" target="_blank">
          <p><input name="Name" class="w3-input w3-padding-16" required="" type="text" placeholder="Name"></p>
          <p><input name="Email" class="w3-input w3-padding-16" required="" type="text" placeholder="Email"></p>
          <p><input name="Subject" class="w3-input w3-padding-16" required="" type="text" placeholder="Subject"></p>
          <p><input name="Message" class="w3-input w3-padding-16" required="" type="text" placeholder="Message"></p>
          <p>
            <button class="w3-button w3-light-grey w3-padding-large" type="submit">
              <i class="fa fa-paper-plane"></i> SEND MESSAGE
            </button>
          </p>
        </form>
      <!-- End Contact Section -->
    </div>
    </div>
</body>

<script>
</script>
</html>