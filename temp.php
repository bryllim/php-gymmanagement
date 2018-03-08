<html>
    <head>
        <title>Home | The Ultimate Gym</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/w3.css" rel="stylesheet">
        <link href="fonts/Montserrat-Regular.otf" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
            
        </style>
    </head>
    
<body class="w3-black">

    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
      <!-- Avatar image in top left corner -->
      <img style="width:100%" src="images/ultimategym_logo.png">
      <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="#about">
        <i class="fa fa-user w3-xxlarge"></i>
        <p>ABOUT</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="#photos">
        <i class="fa fa-eye w3-xxlarge"></i>
        <p>PHOTOS</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="#contact">
        <i class="fa fa-envelope w3-xxlarge"></i>
        <p>CONTACT</p>
      </a>
    </nav>

    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
      <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
        <a class="w3-bar-item w3-button" style="width:25% !important" href="#">HOME</a>
        <a class="w3-bar-item w3-button" style="width:25% !important" href="#about">ABOUT</a>
        <a class="w3-bar-item w3-button" style="width:25% !important" href="#photos">PHOTOS</a>
        <a class="w3-bar-item w3-button" style="width:25% !important" href="#contact">CONTACT</a>
      </div>
    </div>

<!-- Page Content -->
    <div class="w3-padding-large" id="main">
      <!-- Header/Home -->  
      <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
        <h1 class="w3-jumbo"><span class="w3-hide-small">Welcome, User.</span></h1>
        <p>Membership status: <strong>PAID valid until 11/17/2018</strong></p>
      </header>

      <!-- About Section -->
      <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
        <h2 class="w3-text-light-grey">My Name</h2>
        <hr class="w3-opacity" style="width:200px">
        <p>Some text about me. Some text about me. I am lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur
          adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
        <h3 class="w3-padding-16 w3-text-light-grey">My Skills</h3>
        <p class="w3-wide">Photography</p>
        <div class="w3-white">
          <div class="w3-dark-grey" style="height:28px;width:95%"></div>
        </div>
        <p class="w3-wide">Web Design</p>
        <div class="w3-white">
          <div class="w3-dark-grey" style="height:28px;width:85%"></div>
        </div>
        <p class="w3-wide">Photoshop</p>
        <div class="w3-white">
          <div class="w3-dark-grey" style="height:28px;width:80%"></div>
        </div><br>

        <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
          <div class="w3-quarter w3-section">
            <span class="w3-xlarge">11+</span><br>
            Partners
          </div>
          <div class="w3-quarter w3-section">
            <span class="w3-xlarge">55+</span><br>
            Projects Done
          </div>
          <div class="w3-quarter w3-section">
            <span class="w3-xlarge">89+</span><br>
            Happy Clients
          </div>
          <div class="w3-quarter w3-section">
            <span class="w3-xlarge">150+</span><br>
            Meetings
          </div>
        </div>

        <button class="w3-button w3-light-grey w3-padding-large w3-section">
          <i class="fa fa-download"></i> Download Resume
        </button>

        <!-- Grid for pricing tables -->
        <h3 class="w3-padding-16 w3-text-light-grey">My Price</h3>
        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-half w3-margin-bottom">
            <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">Basic</li>
              <li class="w3-padding-16">Web Design</li>
              <li class="w3-padding-16">Photography</li>
              <li class="w3-padding-16">5GB Storage</li>
              <li class="w3-padding-16">Mail Support</li>
              <li class="w3-padding-16">
                <h2>$ 10</h2>
                <span class="w3-opacity">per month</span>
              </li>
              <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-white w3-padding-large w3-hover-black">Sign Up</button>
              </li>
            </ul>
          </div>

          <div class="w3-half">
            <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
              <li class="w3-dark-grey w3-xlarge w3-padding-32">Pro</li>
              <li class="w3-padding-16">Web Design</li>
              <li class="w3-padding-16">Photography</li>
              <li class="w3-padding-16">50GB Storage</li>
              <li class="w3-padding-16">Endless Support</li>
              <li class="w3-padding-16">
                <h2>$ 25</h2>
                <span class="w3-opacity">per month</span>
              </li>
              <li class="w3-light-grey w3-padding-24">
                <button class="w3-button w3-white w3-padding-large w3-hover-black">Sign Up</button>
              </li>
            </ul>
          </div>
        <!-- End Grid/Pricing tables -->
        </div>

        <!-- Testimonials -->
        <h3 class="w3-padding-24 w3-text-light-grey">My Reputation</h3>  
        <img class="w3-left w3-circle w3-margin-right" style="width:80px" alt="Avatar" src="/w3images/bandmember.jpg">
        <p><span class="w3-large w3-margin-right">Chris Fox.</span> CEO at Mighty Schools.</p>
        <p>Jane Doe saved us from a web disaster.</p><br>

        <img class="w3-left w3-circle w3-margin-right" style="width:80px" alt="Avatar" src="/w3images/avatar_g2.jpg">
        <p><span class="w3-large w3-margin-right">Rebecca Flex.</span> CEO at Company.</p>
        <p>No one is better than Jane Doe.</p>
      <!-- End About Section -->
      </div>

      <!-- Portfolio Section -->
      <div class="w3-padding-64 w3-content" id="photos">
        <h2 class="w3-text-light-grey">My Photos</h2>
        <hr class="w3-opacity" style="width:200px">

        <!-- Grid for photos -->
        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-half">
            <img style="width:100%" src="/w3images/wedding.jpg">
            <img style="width:100%" src="/w3images/rocks.jpg">
            <img style="width:100%" src="/w3images/sailboat.jpg">
          </div>

          <div class="w3-half">
            <img style="width:100%" src="/w3images/underwater.jpg">
            <img style="width:100%" src="/w3images/chef.jpg">
            <img style="width:100%" src="/w3images/wedding.jpg">
            <img style="width:100%" src="/w3images/p6.jpg">
          </div>
        <!-- End photo grid -->
        </div>
      <!-- End Portfolio Section -->
      </div>

      <!-- Contact Section -->
      <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
        <h2 class="w3-text-light-grey">Contact Me</h2>
        <hr class="w3-opacity" style="width:200px">

        <div class="w3-section">
          <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Chicago, US</p>
          <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: +00 151515</p>
          <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: mail@mail.com</p>
        </div><br>
        <p>Lets get in touch. Send me a message:</p>

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

        <!-- Footer -->
      <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
        <i class="fa fa-facebook-official w3-hover-opacity"></i>
        <i class="fa fa-instagram w3-hover-opacity"></i>
        <i class="fa fa-snapchat w3-hover-opacity"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity"></i>
        <i class="fa fa-twitter w3-hover-opacity"></i>
        <i class="fa fa-linkedin w3-hover-opacity"></i>
        <p class="w3-medium">Powered by <a class="w3-hover-text-green" href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
      <!-- End footer -->
      </footer>

    <!-- END PAGE CONTENT -->
    </div>


</body></html>