<?php
   session_start();
   require("connect.php");

   $catch = $_SESSION['email'];

   $query = "SELECT *
           FROM payment
           JOIN member
           ON member.member_id = payment.member_id
           WHERE member.member_email = '$catch'";
   $ret = mysqli_query($conn, $query);

   while($row = mysqli_fetch_assoc($ret)){
       $gymid = $row['member_id'];
       $fname = $row['member_fname'];
       $lname = $row['member_lname'];
       $bdate = $row['member_bdate'];
       $age = $row['member_age'];
       $sex = $row['member_sex'];
       $address = $row['member_address'];
       $email = $row['member_email'];

       $status = $row['payment_status'];
       $daysleft = $row['payment_days_left'];
       $validity = $row["payment_validity"];

       $weightchecker = ($status == 'PAID' && $daysleft != 0)?"id01":"idx";       
       $status = ($status == 'PAID')?"<span style='color:green'>PAID</span>":"<span style='color:red'>UNPAID</span>";
       $validity = ($validity == '0000-00-00')?' Please contact the gym staff to enroll for a gym membership.':'membership valid until <i>'.date('F j, Y',strtotime($validity)).'</i>';

   }
   if(isset($_POST['addWeight'])){
           $weight = mysqli_real_escape_string($conn, $_POST['weight']);
           $today = date("Y-m-d");

           $query = "SELECT * FROM progress WHERE member_id = '{$gymid}'";
           $ret = mysqli_query($conn, $query);
           if(mysqli_num_rows($ret)==0){
               $sq2 = "INSERT INTO `progress`(`member_id`) VALUES ({$gymid})";
               $qy2 = mysqli_query($conn,$sq2);
           }else{
               while($row = mysqli_fetch_assoc($ret)){
                   for($ctr = 1; $ctr<=12; $ctr++){
                       if($row['progress_'.$ctr] == 0){
                           $sql = "UPDATE progress SET progress_".$ctr." = $weight, progress_".$ctr."month = '$today' WHERE member_id = {$gymid}";
                           mysqli_query($conn,$sql);
                           echo("<meta http-equiv='refresh' content='0'>");
                           break;
                       }else if($ctr==12){
                           $sql = "UPDATE `progress` SET `progress_1`=$weight,`progress_2`=0,`progress_3`=0,`progress_4`=0,`progress_5`=0,`progress_6`=0,`progress_7`=0,`progress_8`=0,`progress_9`=0,`progress_10`=0,`progress_11`=0,`progress_12`=0,`progress_1month`=$today,`progress_2month`=0,`progress_3month`=0,`progress_4month`=0,`progress_5month`=0,`progress_6month`=0,`progress_7month`=0,`progress_8month`=0,`progress_9month`=0,`progress_10month`=0,`progress_11month`=0,`progress_12month`=0 WHERE member_id = {$gymid}";
                           mysqli_query($conn,$sql);
                           echo("<meta http-equiv='refresh' content='0'>");
                       }
                   }
               }
           }
       }
   ?>
    <html>

    <head>
        <title>Profile | The Ultimate Gym</title>
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
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="home.php">
                <i class="fa fa-home w3-xxlarge"></i>
                <p>HOME</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
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
            <div class="w3-row-padding">
                <div class="w3-margin-bottom">
                    <ul class="w3-ul w3-white w3-center">
                        <li class="w3-black w3-large">
                            <h1 class="w3-jumbo"><?php echo($fname." ".$lname) ?></h1>
                        </li>
                        <li class="w3-padding-16"><strong>Gym ID Number: </strong>
                            <?php echo($gymid) ?>
                        </li>
                        <li class="w3-padding-16"><strong>Membership status: <?php echo($status) ?></strong>
                            <?php echo($validity)?>
                        </li>
                        <li class="w3-padding-16">
                            <strong>
                        Days left to use the gym before next monthly payment: 
                        <h2><?php echo($daysleft) ?> Days</h2>
                     </strong>
                        </li>
                        <li>
                            <b>Personal Information</b>
                            <table class="w3-table" style="color:black">
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birthdate</th>
                                    <th>Age</th>
                                    <th>Sex</th>
                                    <th>Address</th>
                                    <th>Email Address</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo($fname) ?>
                                    </td>
                                    <td>
                                        <?php echo($lname) ?>
                                    </td>
                                    <td>
                                        <?php echo($bdate) ?>
                                    </td>
                                    <td>
                                        <?php echo($age) ?>
                                    </td>
                                    <td>
                                        <?php echo($sex) ?>
                                    </td>
                                    <td>
                                        <?php echo($address) ?>
                                    </td>
                                    <td>
                                        <?php echo($email) ?>
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li class="w3-light-grey w3-padding-24">
                            <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black">Enter Current Weight</button>
                            <button onclick="document.getElementById('<?php echo $weightchecker ?>').style.display='block'" class="w3-button w3-black">Track Progress</button>
                            <div id="id02" class="w3-modal">
                                <div class="w3-modal-content w3-animate-top" style="max-width:500px">
                                    <header class="w3-container w3-black">
                                        <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        <h4>Weight</h4>
                                    </header>
                                    <div class='w3-container'>
                                        <form method="POST">
                                            <p class='w3-margin-top'><strong>Enter current weight in kilograms(kg):</strong></p>
                                            <input class="w3-input w3-border w3-margin-bottom w3-margin-top" type="number" name="weight" required>
                                            <button class="w3-button w3-black w3-margin-bottom" name='addWeight'>Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="id01" class="w3-modal">
                                <div class="w3-modal-content w3-animate-top">
                                    <header class="w3-container w3-black">
                                        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        <h4>Fitness Journey</h4>
                                    </header>
                                    <div class="w3-container w3-black">
                                        <div id='chart'></div>
                                    </div>
                                    <footer class='w3-black'>
                                        <br>
                                    </footer>
                                </div>
                            </div>
                            <div id="idx" class="w3-modal">
                                <div class="w3-modal-content w3-animate-top">
                                    <header class="w3-container w3-red">
                                        <span onclick="document.getElementById('idx').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                                        <h1>Please pay first to use this function.</h1>
                                    </header>
                                </div>
                            </div>
                        </li>
                        <li class="w3-black w3-padding-24">
                            To pay your <strong>membership fee</strong> or <strong>monthly fee</strong>, please approach the staff at the gym to handle the payment and update your account.
                        </li>
                    </ul>
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
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/highcharts.js"></script>
    <script src="js/dark-unica.js"></script>
    <script>
        <?php 
         $query = "SELECT * FROM progress WHERE member_id = '{$gymid}'";
         $ret = mysqli_query($conn, $query);

         while($row = mysqli_fetch_assoc($ret)){
             $prog1 = ($row['progress_1'] == 0)?'':$row['progress_1'].',';
             $prog2 = ($row['progress_2'] == 0)?'':$row['progress_2'].',';
             $prog3 = ($row['progress_3'] == 0)?'':$row['progress_3'].',';
             $prog4 = ($row['progress_4'] == 0)?'':$row['progress_4'].',';
             $prog5 = ($row['progress_5'] == 0)?'':$row['progress_5'].',';
             $prog6 = ($row['progress_6'] == 0)?'':$row['progress_6'].',';
             $prog7 = ($row['progress_7'] == 0)?'':$row['progress_7'].',';
             $prog8 = ($row['progress_8'] == 0)?'':$row['progress_8'].',';
             $prog9 = ($row['progress_9'] == 0)?'':$row['progress_9'].',';
             $prog10 = ($row['progress_10'] == 0)?'':$row['progress_10'].',';
             $prog11 = ($row['progress_11'] == 0)?'':$row['progress_11'].',';
             $prog12 = ($row['progress_12'] == 0)?'':$row['progress_12'].',';

             $prog1month = date('F j, Y',strtotime($row['progress_1month']));
             $prog2month = date('F j, Y',strtotime($row['progress_2month']));
             $prog3month = date('F j, Y',strtotime($row['progress_3month']));
             $prog4month = date('F j, Y',strtotime($row['progress_4month']));
             $prog5month = date('F j, Y',strtotime($row['progress_5month']));
             $prog6month = date('F j, Y',strtotime($row['progress_6month']));
             $prog7month = date('F j, Y',strtotime($row['progress_7month']));
             $prog8month = date('F j, Y',strtotime($row['progress_8month']));
             $prog9month = date('F j, Y',strtotime($row['progress_9month']));
             $prog10month = date('F j, Y',strtotime($row['progress_10month']));
             $prog11month = date('F j, Y',strtotime($row['progress_11month']));
             $prog12month = date('F j, Y',strtotime($row['progress_12month']));

         }

         ?>
        Highcharts.chart("chart", {

            title: {
                text: 'Progress',
            },
            xAxis: {
                categories: ['<?php echo $prog1month ?>', '<?php echo $prog2month ?>', '<?php echo $prog3month ?>', '<?php echo $prog4month ?>', '<?php echo $prog5month ?>', '<?php echo $prog6month ?>', '<?php echo $prog7month ?>', '<?php echo $prog8month ?>', '<?php echo $prog9month ?>', '<?php echo $prog10month ?>', '<?php echo $prog11month ?>', '<?php echo $prog12month ?>']
            },
            yAxis: {
                title: {
                    text: 'Kilograms (kg)'
                },
                plotlines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Kilograms',
                data: [<?php echo $prog1 . $prog2 . $prog3 . $prog4 . $prog5 . $prog6 . $prog7 . $prog8 . $prog9 . $prog10 . $prog11 . $prog12?>]
            }]
        });
    </script>

    </html>