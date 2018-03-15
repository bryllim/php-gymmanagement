<?php
   session_start();
   require("connect.php");
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Programs | The Ultimate Gym</title>
        <link rel="icon" href="images/logo_icon.png">
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1" name="viewport">
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
            <img src="images/ultimategym_logo.png" style="width:100%"> <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="home.php"><i class="fa fa-home w3-xxlarge"></i>
		<p>HOME</p></a> <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="user.php"><i class="fa fa-user w3-xxlarge"></i>
		<p>PROFILE</p></a> <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#"><i class="fa fa-th-list w3-xxlarge"></i>
		<p>PROGRAMS</p></a> <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="contact.php"><i class="fa fa-envelope w3-xxlarge"></i>
		<p>CONTACT</p></a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.getElementById('logout').style.display='block';">
                <i class="fa fa-sign-out-alt w3-xxlarge"></i>
                <p>LOG OUT</p>
            </a>
        </nav>
        <div class="w3-padding-large" id="main">
            <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half w3-margin-bottom">
                    <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
                        <li class="w3-dark-grey w3-xlarge w3-padding-32">BULKING</li>
                        <li class="w3-padding-16">A workout routine tailored to exponentially increase muscle mass.</li>
                        <li class="w3-padding-16"><img src='images/bulking.jpg'></li>
                        <li class="w3-light-grey w3-padding-24">
                            <button class="w3-button w3-white w3-padding-large w3-hover-black" onclick="document.getElementById('id01').style.display='block'">View</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-modal w3-animate-opacity" id="id01">
                    <div class="w3-modal-content w3-white">
                        <header class="w3-container w3-black">
                            <span class="w3-button w3-display-topright" onclick="document.getElementById('id01').style.display='none'">&times;</span>
                            <h2 class='w3-center'><b>BULKING PROGRAM</b></h2>
                        </header>
                        <h3 class='w3-center'><b>DAY 1</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day1 FROM program WHERE program_name = 'bulking'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day1'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 2</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day2 FROM program WHERE program_name = 'bulking'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day2'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 3</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day3 FROM program WHERE program_name = 'bulking'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day3'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 4</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day4 FROM program WHERE program_name = 'bulking'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day4'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 5</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day5 FROM program WHERE program_name = 'bulking'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day5'].'</li>');
                              }
                        ?>
                        </ul>
                        <footer class="w3-container w3-black">
                            <p></p>
                        </footer>
                    </div>
                </div>
                <div class="w3-half">
                    <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
                        <li class="w3-dark-grey w3-xlarge w3-padding-32">CUTTING</li>
                        <li class="w3-padding-16">Set of exercises to shred muscles and display a chiseled figure.</li>
                        <li class="w3-padding-16"><img src='images/cutting.png'></li>
                        <li class="w3-light-grey w3-padding-24">
                            <button class="w3-button w3-white w3-padding-large w3-hover-black" onclick="document.getElementById('id02').style.display='block'">View</button>
                        </li>
                    </ul>
                </div>
                <div class="w3-modal w3-animate-opacity" id="id02">
                    <div class="w3-modal-content w3-white">
                        <header class="w3-container w3-black">
                            <span class="w3-button w3-display-topright" onclick="document.getElementById('id02').style.display='none'">&times;</span>
                            <h2 class='w3-center'><b>CUTTING PROGRAM</b></h2>
                        </header>
                        <h3 class='w3-center'><b>DAY 1</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day1 FROM program WHERE program_name = 'cutting'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day1'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 2</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day2 FROM program WHERE program_name = 'cutting'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day2'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 3</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day3 FROM program WHERE program_name = 'cutting'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day3'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 4</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day4 FROM program WHERE program_name = 'cutting'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day4'].'</li>');
                              }
                        ?>
                        </ul>
                        <h3 class='w3-center'><b>DAY 5</b></h3>
                        <ul class="w3-ul w3-hoverable" style="font-size:20px">
                            <?php
                            $query = "SELECT program_day5 FROM program WHERE program_name = 'cutting'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day5'].'</li>');
                              }
                        ?>
                        </ul>
                        <footer class="w3-container w3-black">
                            <p></p>
                        </footer>
                    </div>
                </div>
                <div class="w3-row-padding" style="margin:0 -16px">
                    <div class="w3-half w3-margin-bottom">
                        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
                            <li class="w3-dark-grey w3-xlarge w3-padding-32">CARDIO</li>
                            <li class="w3-padding-16">An exercise program to increase cardiovascular endurance.</li>
                            <li class="w3-padding-16"><img src='images/cardio.png'></li>
                            <li class="w3-light-grey w3-padding-24">
                                <button class="w3-button w3-white w3-padding-large w3-hover-black" onclick="document.getElementById('id03').style.display='block'">View</button>
                            </li>
                        </ul>
                    </div>
                    <div class="w3-modal w3-animate-opacity" id="id03">
                        <div class="w3-modal-content w3-white">
                            <header class="w3-container w3-black">
                                <span class="w3-button w3-display-topright" onclick="document.getElementById('id03').style.display='none'">&times;</span>
                                <h2 class='w3-center'><b>CARDIO PROGRAM</b></h2>
                            </header>
                            <h3 class='w3-center'><b>DAY 1</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day1 FROM program WHERE program_name = 'cardio'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day1'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 2</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day2 FROM program WHERE program_name = 'cardio'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day2'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 3</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day3 FROM program WHERE program_name = 'cardio'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day3'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 4</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day4 FROM program WHERE program_name = 'cardio'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day4'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 5</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day5 FROM program WHERE program_name = 'cardio'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day5'].'</li>');
                              }
                        ?>
                            </ul>
                            <footer class="w3-container w3-black">
                                <p></p>
                            </footer>
                        </div>
                    </div>
                    <div class="w3-half">
                        <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
                            <li class="w3-dark-grey w3-xlarge w3-padding-32">CLOSE-COMBAT</li>
                            <li class="w3-padding-16">One-on-one training sessions to teach self-defense moves and tactics.</li>
                            <li class="w3-padding-16"><img src='images/closecombat.jpg'></li>
                            <li class="w3-light-grey w3-padding-24">
                                <button class="w3-button w3-white w3-padding-large w3-hover-black" onclick="document.getElementById('id04').style.display='block'">View</button>
                            </li>
                        </ul>
                    </div>
                    <div class="w3-modal w3-animate-opacity" id="id04">
                        <div class="w3-modal-content w3-white">
                            <header class="w3-container w3-black">
                                <span class="w3-button w3-display-topright" onclick="document.getElementById('id04').style.display='none'">&times;</span>
                                <h2 class='w3-center'><b>CLOSE COMBAT PROGRAM</b></h2>
                            </header>
                            <h4 class='w3-center'>Refer to the gym staff for instructions for close-combat. Pair these workouts for best results.</h4>
                            <br>
                            <h3 class='w3-center'><b>DAY 1</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day1 FROM program WHERE program_name = 'closecombat'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day1'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 2</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day2 FROM program WHERE program_name = 'closecombat'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day2'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 3</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day3 FROM program WHERE program_name = 'closecombat'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day3'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 4</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day4 FROM program WHERE program_name = 'closecombat'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day4'].'</li>');
                              }
                        ?>
                            </ul>
                            <h3 class='w3-center'><b>DAY 5</b></h3>
                            <ul class="w3-ul w3-hoverable" style="font-size:20px">
                                <?php
                            $query = "SELECT program_day5 FROM program WHERE program_name = 'closecombat'";
                            $ret = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_assoc($ret)){
                                  echo('<li>'.$row['program_day5'].'</li>');
                              }
                        ?>
                            </ul>
                            <footer class="w3-container w3-black">
                                <p></p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
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

    </html>