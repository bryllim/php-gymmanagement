<?php
   session_start();
   require("connect.php");

   $fullname = "Enter gym member first and last name:";
   $button = "";

   if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        if(preg_match('/\s/',$name) == 1){
                $names = explode(" ", $name);
                $sql = "SELECT * FROM member WHERE member_fname LIKE '{$names[0]}' AND member_lname LIKE '{$names[1]}'";
                $query = mysqli_query($conn,$sql);
                if(mysqli_num_rows($query)==1){
                    while($row = mysqli_fetch_assoc($query)){
                        $gymid = $row["member_id"];
                        $fullname = "Gym ID: <strong>".$gymid."</strong> Name: <strong>".$row["member_fname"]." ".$row["member_lname"]."</strong>";

                        $sql2 = "SELECT member_id, attendance_time FROM attendance WHERE member_id = {$gymid} AND attendance_date = '".date("Y-m-d")."'";
                        $query2 = mysqli_query($conn,$sql2);

                        if(mysqli_num_rows($query2)==0){
                        $button = '<form method = "POST" action = "admin_attendance.php"><input type="hidden" value="'.$gymid.'" name="gymid" required> <button class="w3-button w3-grey w3-section w3-padding" type="submit" name="check"><span class="fa fa-check-square"></span><strong> Check Attendance</strong></button></form> ';
                        }else{
                             while($row2 = mysqli_fetch_assoc($query2)){
                                $button = 'Already signed in today. Last signed in at '.date('g:i:s A',strtotime($row2['attendance_time'])).".";
                             }
                        }
                    }
                }else{
                    $fullname = "Member not found.";
                }
        }else{
            $fullname = "Missing last name.";
        }
   }

   if(isset($_POST['check'])){
       $gymid = mysqli_real_escape_string($conn, $_POST['gymid']);
       $sql = "INSERT INTO attendance(member_id, attendance_date, attendance_time) VALUES ('{$gymid}','".date("Y-m-d")."','".date("g:i:s")."')";
       $query = mysqli_query($conn,$sql);
   }

   ?>
    <html>

    <head>
        <title>Admin Attendance | GYMMA</title>
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
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_home.php">
                <i class="fa fa-home w3-xxlarge"></i>
                <p>HOME</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
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
                <h1 class="w3-jumbo"><strong>Attendance</strong></h1>
            </header>
            <div class="w3-row w3-center w3-padding-16 w3-section">
                <div class="w3-quarter w3-section">
                </div>
                <div class="w3-half w3-section">
                    <h3 style='color:lightgray'><?php echo $fullname ?></h3>
                    <div>
                        <?php echo $button ?>
                    </div>
                    <br>
                    <form method='POST'>
                        <input class="w3-input w3-border w3-margin-bottom" type="text" name='name' required>
                        <button class="w3-button w3-dark-grey w3-section w3-padding" type="submit" name="submit"><strong style='color:black'>Submit</strong></button>
                    </form>

                </div>
                <div class="w3-quarter w3-section">
                </div>
            </div>

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
    </script>

    </html>