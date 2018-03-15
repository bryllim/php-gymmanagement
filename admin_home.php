<?php
   session_start();
   require("connect.php");

   if(isset($_POST['announcementButton'])){
       $announcement = mysqli_real_escape_string($conn, $_POST['announcement']);
       $today = date("Y-m-d h:i:sa");
       $sql = "INSERT INTO home( home_announcement, home_announcement_datetime) VALUES ('$announcement','$today')";
       mysqli_query($conn,$sql);
   }

   if(isset($_POST['delete'])){
       $sql = "DELETE FROM home ORDER BY home_announcement_datetime ASC LIMIT 1";
       mysqli_query($conn,$sql);
   }
    if(isset($_POST['programupdate'])){

        for($x=1;$x<6;$x++){

       $sql = "UPDATE program SET program_day1 = '".mysqli_real_escape_string($conn, $_POST['bulking_day1_'.$x.''])."',program_day2='".mysqli_real_escape_string($conn, $_POST['bulking_day2_'.$x.''])."',program_day3='".mysqli_real_escape_string($conn, $_POST['bulking_day4_'.$x.''])."',program_day4='".mysqli_real_escape_string($conn, $_POST['bulking_day4_'.$x.''])."',program_day5='".mysqli_real_escape_string($conn, $_POST['bulking_day5_'.$x.''])."' WHERE program_number = {$x}";
       mysqli_query($conn,$sql);
        }

        for($x=1;$x<6;$x++){
       $sql = "UPDATE program SET program_day1 = '".mysqli_real_escape_string($conn, $_POST['cutting_day1_'.$x.''])."',program_day2='".mysqli_real_escape_string($conn, $_POST['cutting_day2_'.$x.''])."',program_day3='".mysqli_real_escape_string($conn, $_POST['cutting_day4_'.$x.''])."',program_day4='".mysqli_real_escape_string($conn, $_POST['cutting_day4_'.$x.''])."',program_day5='".mysqli_real_escape_string($conn, $_POST['cutting_day5_'.$x.''])."' WHERE program_number = {$x} + 5";
       mysqli_query($conn,$sql);
        }

        for($x=1;$x<6;$x++){
       $sql = "UPDATE program SET program_day1 = '".mysqli_real_escape_string($conn, $_POST['cardio_day1_'.$x.''])."',program_day2='".mysqli_real_escape_string($conn, $_POST['cardio_day2_'.$x.''])."',program_day3='".mysqli_real_escape_string($conn, $_POST['cardio_day4_'.$x.''])."',program_day4='".mysqli_real_escape_string($conn, $_POST['cardio_day4_'.$x.''])."',program_day5='".mysqli_real_escape_string($conn, $_POST['cardio_day5_'.$x.''])."' WHERE program_number = {$x} + 10";
       mysqli_query($conn,$sql);
        }

        for($x=1;$x<6;$x++){
       $sql = "UPDATE program SET program_day1 = '".mysqli_real_escape_string($conn, $_POST['closecombat_day1_'.$x.''])."',program_day2='".mysqli_real_escape_string($conn, $_POST['closecombat_day2_'.$x.''])."',program_day3='".mysqli_real_escape_string($conn, $_POST['closecombat_day4_'.$x.''])."',program_day4='".mysqli_real_escape_string($conn, $_POST['closecombat_day4_'.$x.''])."',program_day5='".mysqli_real_escape_string($conn, $_POST['closecombat_day5_'.$x.''])."' WHERE program_number = {$x} + 15";
       mysqli_query($conn,$sql);
        }
   }

   ?>
    <html>

    <head>
        <title>Admin Home | GYMMA</title>
        <link rel="icon" href="images/logo_icon.png">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/w3.css" rel="stylesheet">
        <link href="fonts/Montserrat-Regular.otf" rel="stylesheet">
        <link href="css/fontawesome-all.min.css" rel="stylesheet">
        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Montserrat", sans-serif
            }
            
            .w3-row-padding img {
                margin-bottom: 12px
            }
            
            .w3-sidebar {
                width: 120px;
                background: #222;
            }
            
            #main {
                margin-left: 120px
            }
        </style>
    </head>

    <body class="w3-black">
        <nav class="w3-sidebar w3-bar-block w3-small w3-center">
            <img style="width:100%" src="images/ultimategym_logo.png">
            <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
                <i class="fa fa-home w3-xxlarge"></i>
                <p>HOME</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_attendance.php">
                <i class="fa fa-calendar-check w3-xxlarge"></i>
                <p>ATTENDANCE</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_users.php">
                <i class="fa fa-users w3-xxlarge"></i>
                <p>MANAGE
                    <br>MEMBERS</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_revenue.php">
                <i class="fa fa-chart-bar w3-xxlarge"></i>
                <p>VIEW
                    <br>REVENUE</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.getElementById('logout').style.display='block';">
                <i class="fa fa-sign-out-alt w3-xxlarge"></i>
                <p>LOG OUT</p>
            </a>
        </nav>
        <div class="w3-padding-large" id="main">
            <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
                <h1 class="w3-jumbo"><strong>GYMMA</strong><i>syst</i></h1>
                <h1 style='color:grey'>Gym Management System</h1>
                <p> stable release 1.0.00 | Developed by <b>Bryl Lim</b></p>
            </header>
            <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
                <div class="w3-section w3-third">
                    <span class="w3-xlarge"><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black w3-section w3-padding" ><span class = 'fa fa-plus'></span><strong> Add Announcement</strong></button>
                    </span>
                    <br> Add announcements on the home page.
                </div>
                <div class="w3-section w3-third">
                    <span class="w3-xlarge"><button onclick="document.getElementById('id03').style.display='block'" class="w3-button w3-black w3-section w3-padding" ><span class = 'fa fa-minus-circle'></span><strong> Remove Announcement</strong></button>
                    </span>
                    <br> Deletes the oldest announcement on the home page.
                </div>
                <div class="w3-section w3-third">
                    <span class="w3-xlarge"><button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black w3-section w3-padding" ><span class = 'fa fa-th-list'></span><strong> Edit Programs</strong></button>
                    </span>
                    <br> Adjust the fitness programs for members.
                </div>
                <div id="id01" class="w3-modal ">
                    <div class="w3-modal-content w3-animate-top" style="max-width:600px">
                        <div class="w3-center">
                            <br>
                            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" style='color:black'>&times;</span>
                        </div>
                        <div class="w3-container" style="color:black">
                            <h1><strong>Announcement</strong></h1>
                            <form method="POST" action="admin_home.php">
                                <input class="w3-input w3-border" type="text" placeholder="Enter new announcement" name="announcement" required>
                                <button class="w3-button w3-black w3-section w3-padding" name='announcementButton'>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="id03" class="w3-modal ">
                    <div class="w3-modal-content w3-animate-top" style="max-width:600px">
                        <div class="w3-center">
                            <br>
                            <span onclick="document.getElementById('id03').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" style='color:black'>&times;</span>
                        </div>
                        <div class="w3-container" style="color:black">
                            <h2>Remove the oldest announcement?</h2>
                            <form method="POST" action="admin_home.php">
                                <button class="w3-button w3-black w3-section w3-padding" name='delete'>Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="id02" class="w3-modal ">
                    <div class="w3-modal-content w3-animate-top" style="max-width:600px">
                        <div class="w3-center">
                            <br>
                            <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" style='color:black'>&times;</span>
                        </div>
                        <div class="w3-container" style="color:black">
                            <h2><strong>Edit Programs</strong></h2>
                            <div class="w3-bar w3-black">
                                <button class="w3-bar-item w3-button tablink w3-dark-grey" onclick="openCity(event,'Bulking')">Bulking</button>
                                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Cutting')">Cutting</button>
                                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Cardio')">Cardio</button>
                                <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Closecombat')">Close Combat</button>
                            </div>
                            <form method="POST" action="admin_home.php">

                                <div id="Bulking" class="w3-container w3-border city">
                                    <h2>Bulking</h2>
                                    <p>Day 1</p>
                                    <?php

                              $ctr = 1;

                              $query = "SELECT program_day1 FROM program WHERE program_name = 'bulking'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day1'].'" name="bulking_day1_'.$ctr++.'" required>');
                              }

                            ?>
                                        <p>Day 2</p>
                                        <?php 

                              $ctr = 1;

                              $query = "SELECT program_day2 FROM program WHERE program_name = 'bulking'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day2'].'" name="bulking_day2_'.$ctr++.'" required>');
                              }

                            ?>
                                            <p>Day 3</p>
                                            <?php 

                              $ctr = 1;

                              $query = "SELECT program_day3 FROM program WHERE program_name = 'bulking'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day3'].'" name="bulking_day3_'.$ctr++.'"  required>');
                              }

                            ?>
                                                <p>Day 4</p>
                                                <?php 

                              $ctr = 1;

                              $query = "SELECT program_day4 FROM program WHERE program_name = 'bulking'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day4'].'" name="bulking_day4_'.$ctr++.'"  required>');
                              }

                            ?>
                                                    <p>Day 5</p>
                                                    <?php 

                              $ctr = 1;

                              $query = "SELECT program_day5 FROM program WHERE program_name = 'bulking'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day5'].'" name="bulking_day5_'.$ctr++.'" required>');
                              }

                            ?>
                                </div>

                                <div id="Cutting" class="w3-container w3-border city" style="display:none">
                                    <h2>Cutting</h2>
                                    <p>Day 1</p>
                                    <?php

                              $ctr = 1;

                              $query = "SELECT program_day1 FROM program WHERE program_name = 'cutting'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day1'].'" name="cutting_day1_'.$ctr++.'" required>');
                              }

                            ?>
                                        <p>Day 2</p>
                                        <?php 

                              $ctr = 1;

                              $query = "SELECT program_day2 FROM program WHERE program_name = 'cutting'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day2'].'" name="cutting_day2_'.$ctr++.'" required>');
                              }

                            ?>
                                            <p>Day 3</p>
                                            <?php 

                              $ctr = 1;

                              $query = "SELECT program_day3 FROM program WHERE program_name = 'cutting'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day3'].'" name="cutting_day3_'.$ctr++.'"  required>');
                              }

                            ?>
                                                <p>Day 4</p>
                                                <?php 

                              $ctr = 1;

                              $query = "SELECT program_day4 FROM program WHERE program_name = 'cutting'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day4'].'" name="cutting_day4_'.$ctr++.'"  required>');
                              }

                            ?>
                                                    <p>Day 5</p>
                                                    <?php 

                              $ctr = 1;

                              $query = "SELECT program_day5 FROM program WHERE program_name = 'cutting'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day5'].'" name="cutting_day5_'.$ctr++.'" required>');
                              }

                            ?>
                                </div>

                                <div id="Cardio" class="w3-container w3-border city" style="display:none">
                                    <h2>Cardio</h2>
                                    <p>Day 1</p>
                                    <?php

                              $ctr = 1;

                              $query = "SELECT program_day1 FROM program WHERE program_name = 'cardio'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day1'].'" name="cardio_day1_'.$ctr++.'" required>');
                              }

                            ?>
                                        <p>Day 2</p>
                                        <?php 

                              $ctr = 1;

                              $query = "SELECT program_day2 FROM program WHERE program_name = 'cardio'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day2'].'" name="cardio_day2_'.$ctr++.'" required>');
                              }

                            ?>
                                            <p>Day 3</p>
                                            <?php 

                              $ctr = 1;

                              $query = "SELECT program_day3 FROM program WHERE program_name = 'cardio'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day3'].'" name="cardio_day3_'.$ctr++.'"  required>');
                              }

                            ?>
                                                <p>Day 4</p>
                                                <?php 

                              $ctr = 1;

                              $query = "SELECT program_day4 FROM program WHERE program_name = 'cardio'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day4'].'" name="cardio_day4_'.$ctr++.'"  required>');
                              }

                            ?>
                                                    <p>Day 5</p>
                                                    <?php 

                              $ctr = 1;

                              $query = "SELECT program_day5 FROM program WHERE program_name = 'cardio'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day5'].'" name="cardio_day5_'.$ctr++.'" required>');
                              }

                            ?>
                                </div>

                                <div id="Closecombat" class="w3-container w3-border city" style="display:none">
                                    <h2>Close Combat</h2>
                                    <p>Day 1</p>
                                    <?php

                              $ctr = 1;

                              $query = "SELECT program_day1 FROM program WHERE program_name = 'closecombat'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day1'].'" name="closecombat_day1_'.$ctr++.'" required>');
                              }

                            ?>
                                        <p>Day 2</p>
                                        <?php 

                              $ctr = 1;

                              $query = "SELECT program_day2 FROM program WHERE program_name = 'closecombat'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day2'].'" name="closecombat_day2_'.$ctr++.'" required>');
                              }

                            ?>
                                            <p>Day 3</p>
                                            <?php 

                              $ctr = 1;

                              $query = "SELECT program_day3 FROM program WHERE program_name = 'closecombat'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day3'].'" name="closecombat_day3_'.$ctr++.'"  required>');
                              }

                            ?>
                                                <p>Day 4</p>
                                                <?php 

                              $ctr = 1;

                              $query = "SELECT program_day4 FROM program WHERE program_name = 'closecombat'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day4'].'" name="closecombat_day4_'.$ctr++.'"  required>');
                              }

                            ?>
                                                    <p>Day 5</p>
                                                    <?php 

                              $ctr = 1;

                              $query = "SELECT program_day5 FROM program WHERE program_name = 'closecombat'";
                              $ret = mysqli_query($conn, $query);

                              while($row = mysqli_fetch_assoc($ret)){
                                  echo('<input class="w3-input w3-border" type="text" value="'.$row['program_day5'].'" name="closecombat_day5_'.$ctr++.'" required>');
                              }

                            ?>
                                </div>

                                <button class="w3-button w3-black w3-section w3-padding" name='programupdate'>Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <footer class="w3-center"> Copyright © 2013-2020 The Ultimate Gym. All rights reserved.</footer>
        </div>
        <div id="logout" class="w3-modal w3-center">
            <div class="w3-modal-content w3-animate-top" style="max-width:600px">
                <div class="w3-center">
                    <br>
                    <span onclick="document.getElementById('logout').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" style='color:black'>&times;</span>
                </div>
                <div class="w3-container" style="color:black">
                    <h2>Are you sure you want to logout?</h2>
                    <form method="POST" action="logout.php">
                        <button class="w3-button w3-black w3-section w3-padding" name='delete'>Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-dark-grey", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-dark-grey";
        }
    </script>

    </html>