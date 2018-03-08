<?php
    session_start();
    require("connect.php");
    
    if(isset($_POST['announcementButton'])){
        $announcement = mysqli_real_escape_string($conn, $_POST['announcement']);
        $today = date("Y-m-d h:i:sa");
        $sql = "INSERT INTO home( home_announcement, home_announcement_datetime) VALUES ('$announcement','$today')";
        mysqli_query($conn,$sql);
        echo("<meta http-equiv='refresh' content='0'>");
    }

?>
<html>
    <head>
        <title>Home | GYMMA</title>
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
      <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_users.php">
        <i class="fa fa-users w3-xxlarge"></i>
        <p>MANAGE<br>USERS</p>
      </a>
        <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href='logout.php' onclick="return confirm('Are you sure you wish to logout?');">
        <i class="fa fa-sign-out-alt w3-xxlarge"></i>
        <p>LOG OUT</p>
        </a>
    </nav>

<!-- Page Content -->
    <div class="w3-padding-large" id="main">
      <!-- Header/Home -->
      <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
        <h1 class="w3-jumbo"><strong>GYMMA</strong><i>syst</i></h1>
        <h1 style='color:grey'>Gym Management System</h1>
          <p> alpha release 0.0.07 | Developed by <b>Bryl Lim</b></p>
      </header>
        <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
          <div class="w3-section">
            <span class="w3-xlarge"><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-section w3-padding" ><strong>Add Announcement</strong></button></span><br>
            Add announcements on the home page.
          </div>
            <div id="id01" class="w3-modal ">
               <div class="w3-modal-content w3-animate-opacity" style="max-width:600px">
                  <div class="w3-center"><br>
                     <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" title="Cancel login" style='color:black'>&times;</span>    
                  </div>
                     <div class="w3-container" style="color:black">
                        <h1><strong>Announcement</strong></h1>
                         <form method="POST" action = "admin_home.php">
                             <input class="w3-input w3-border" type="text" placeholder="Enter new announcement" name="announcement" required>
                        <button class="w3-button w3-black w3-section w3-padding" name='announcementButton'>Submit</button>
                        </form>
                     </div>
               </div>
            </div>
        </div>
        <br><br><br><footer class="w3-center"> Copyright © 2013-2020 The Ultimate Gym. All rights reserved.</footer>
    </div>
</body>

<script>
</script>
</html>