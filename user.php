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
        
        $status = ($status == 'PAID')?"<span style='color:green'>PAID</span>":"<span style='color:red'>UNPAID</span>";
        $validity = ($validity == '0000-00-00')?' Please contact the gym staff to enroll for a gym membership.':'membership valid until <i>'.$validity.'</i>';
                    
                    
    }
    if(isset($_POST['addWeight'])){
            $weight = mysqli_real_escape_string($conn, $_POST['weight']);
            $today = date("Y-m-d");
            
            $query = "SELECT * FROM progress JOIN member ON progress.member_id = member.member_id WHERE member.member_id = '{$gymid}'";
            $ret = mysqli_query($conn, $query);
        
                while($row = mysqli_fetch_assoc($ret)){
                    for($ctr = 1; $ctr<=12; $ctr++){
                        if(is_null($row['progress_'.$ctr])){
                            $sql = "UPDATE `progress` SET `progress_".$ctr."`='$weight', `progress_".$ctr."month` = '$today') WHERE member_id = {$id}";
                            mysqli_query($conn,$sql);
                            echo("<meta http-equiv='refresh' content='0'>");
                        }
                    }
                }

        }
?>
<html>
    <head>
        <title>Profile | The Ultimate Gym</title>
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
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="logout.php" onclick="return confirm('Are you sure you wish to logout?');">
        <i class="fa fa-sign-out-alt w3-xxlarge"></i>
        <p>LOG OUT</p>
      </a>
    </nav>

<!-- Page Content -->
   <div class="w3-padding-large" id="main">
        <div class="w3-row-padding">
          <div class="w3-margin-bottom">
            <ul class="w3-ul w3-white w3-center">
              <li class="w3-black w3-large"><h1 class="w3-jumbo"><?php echo($fname." ".$lname) ?></h1></li>
              <li class="w3-padding-16"><strong>Gym ID Number: </strong><?php echo($gymid) ?></li>
              <li class="w3-padding-16"><strong>Membership status: <?php echo($status) ?></strong> <?php echo($validity)?></li>
              <li class="w3-padding-16"><strong>Days left to use the gym before next monthly payment: <h2><?php echo($daysleft) ?> Days</h2></strong>
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
                      <td><?php echo($fname) ?></td>
                      <td><?php echo($lname) ?></td>
                      <td><?php echo($bdate) ?></td>
                        <td><?php echo($age) ?></td>
                        <td><?php echo($sex) ?></td>
                        <td><?php echo($address) ?></td>
                        <td><?php echo($email) ?></td>
                    </tr>
                    </table>
                  
                </li>
              <li class="w3-light-grey w3-padding-24">
                <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-black">Enter Current Weight</button>
                  <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-black">Track Progress</button>
                  <div id="id02" class="w3-modal">
                    <div class="w3-modal-content w3-animate-opacity" style="max-width:500px">
                      <header class="w3-container w3-black"> 
                        <span onclick="document.getElementById('id02').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h4>Weight</h4>
                      </header>
                        <div class='w3-container'>
                            <form method="POST" action='user.php'>
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
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                        <h4>Fitness Journey</h4>
                      </header>
                      <div class="w3-container w3-black">
                          <div id ='chart'></div>
                      </div>
                      <footer class="w3-container w3-black">
                        <p><strong>Current height:</strong> 150cm <strong>Current weight:</strong> 63kg <strong>BMI:</strong> 32</p>
                      </footer>
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
    
</body>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/highcharts.js"></script>
<script src="js/dark-unica.js"></script>
<script>
    Highcharts.chart("chart", {
        
        title: {
            text: 'Progress',
        },
        xAxis: {
            categories: ['Month 1', 'Month 2', 'Month 3', 'Month 4', 'Month 5', 'Month 6', 'Month 7', 'Month 8', 'Month 9', 'Month 10', 'Month 11', 'Month 12']
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
                     data: [60, 60, 61, 61.5, 61, 60, 60, 60, 60, 60, 60, 60]
                     }]
    });

</script>
</html>