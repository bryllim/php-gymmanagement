<?php
   session_start();
   require("connect.php");

   $catch = $_SESSION['email'];
   $query = "SELECT *
           FROM member
           WHERE member_email = '$catch'";
   $ret = mysqli_query($conn, $query);

   while($row = mysqli_fetch_assoc($ret)){
       $name = $row['member_fname'];
       $id = $row['member_id'];
   }

   $qry = "SELECT * FROM payment JOIN member ON payment.member_id = member.member_id WHERE member.member_id = '{$id}'";
   $rt = mysqli_query($conn, $qry);

   if(mysqli_num_rows($rt)==0){
       $sq = "INSERT INTO `payment`(`member_id`, `payment_status`,`payment_days_left`) VALUES ({$id},'UNPAID',0)";
       $qy = mysqli_query($conn,$sq);
    }

    while($row = mysqli_fetch_assoc($rt)){
           $daysleft = $row['payment_days_left'];
           $datetracker = $row['payment_datetracker'];
           $validity = $row['payment_validity'];
       }

   $today = date("Y-m-d");
   $diff = date_diff(date_create($datetracker), date_create($today));
   $daysspent = $diff->format('%d');

   $daysleft = $daysleft - $daysspent;
   if($validity <= $today){
       header('location: user.php');
   }

   if($daysleft <= 0){
       $daysleft = 0;
       header('location: user.php');
   }

   $sql = "UPDATE payment SET payment_days_left= {$daysleft}, payment_datetracker = '{$today}' WHERE member_id = {$id}";
   $query = mysqli_query($conn,$sql);

   ?>
    <html>

    <head>
        <title>Home | The Ultimate Gym</title>
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
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="user.php">
                <i class="fa fa-user w3-xxlarge"></i>
                <p>PROFILE</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="program.php">
                <i class="fa fa-th-list w3-xxlarge"></i>
                <p>PROGRAMS</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="contact.php">
                <i class="fa fa-envelope w3-xxlarge"></i>
                <p>CONTACT</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.getElementById('logout').style.display='block';">
                <i class="fa fa-sign-out-alt w3-xxlarge"></i>
                <p>LOG OUT</p>
            </a>
        </nav>

        <div class="w3-padding-large" id="main">
            <header class="w3-container w3-padding-32 w3-center w3-black">
                <h1 class="w3-jumbo">Welcome, <?php echo($name) ?>.</h1>
            </header>
            <div class="w3-content w3-justify w3-text-grey" id="about">
                <h2 class="w3-text-light-grey">Announcements</h2>
                <hr class="w3-opacity" style="width:200px">
                <ul class="w3-ul">
                    <?php
                  $sql = "SELECT * FROM home ORDER BY home_announcement_datetime DESC";
                  $return = mysqli_query($conn, $sql);

                  while($row = mysqli_fetch_assoc($return)){
                      echo("<li><i>".date('F j, Y g:i A',strtotime($row['home_announcement_datetime']))." | </i>".$row['home_announcement']."</li>");
                  }

                      ?>
                </ul>
                <br>
                <img src='images/slide1.jpg'>
            </div>
            <br>
            <div class="w3-content w3-justify w3-text-grey">
                <h2 class="w3-text-light-grey">Gym Rules</h2>
                <hr class="w3-opacity" style="width:200px">
                <ul class="w3-ul">
                    <li><strong>1. Do not bring your gym bag or other personal belongings onto the fitness floor.</strong></li>
                    <li><strong>2. Be courteous when using the water fountain. If there is a line, please do not fill up your water bottle.</strong></li>
                    <li><strong>3. Ask if you may “work in,” and always allow others the same courtesy; afterward, return the seat and weight to the last user’s setup.</strong></li>
                    <li><strong>4. Refrain from yelling, using profanity, banging weights and making loud sounds.</strong></li>
                    <li><strong>5. Do not sit on machines between sets.</strong></li>
                    <li><strong>6. Re-rack weights and return all other equipment and accessories to their proper locations.</strong></li>
                    <li><strong>7. Ask staff to show you how to operate equipment properly so that others are not waiting as you figure it out.</strong></li>
                    <li><strong>8. Wipe down all equipment after use.</strong></li>
                    <li><strong>9. Stick to posted time limits on all cardiovascular machines.</strong></li>
                    <li><strong>10. Do not disturb others. Focus on your own workout and allow others to do the same.</strong></li>
                </ul>
                <br>
                <img src='images/slide2.jpg'>
            </div>
            <br>
            <div class="w3-content w3-justify w3-text-grey">
                <h2 class="w3-text-light-grey">Frequently Asked Questions</h2>
                <hr class="w3-opacity" style="width:200px">
                <ul class="w3-ul">
                    <li><strong>How do I cancel my membership?</strong>
                        <br>We hate to see you go! You will need to contact the staff directly to cancel your membership. Feel free to call, email or walk in during gym hours and the staff will assist you in their cancellation process. </li>
                    <li><strong>What are the costs of your memberships?</strong>
                        <br>The yearly membership fee costs Php 200.00 and the monthly membership fee costs Php 800.00.</li>
                    <li><strong>When does my 30 days start?</strong>
                        <br>Once the staff updates your account, your membership is automatically updated and you may use the gym.</li>
                    <li><strong>What time does the gym open?</strong>
                        <br>We open 6 AM to 11 PM daily. Announcements will be posted on special holidays.</li>
                    <li><strong>I made a mistake in the registration progress. Can I still update my account?</strong>
                        <br>Yes you can! Just contact the staff to have your account information updated.</li>
                </ul>
                <br>
                <img src='images/slide3.jpg'>
            </div>
            <br>
        </div>
        <br>
        <footer class="w3-center"> Copyright © 2013-2020 The Ultimate Gym. All rights reserved.</footer>
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
    <script></script>

    </html>