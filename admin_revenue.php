<?php
   session_start();
   require("connect.php");
   ?>
    <html>

    <head>
        <title>Admin Revenue | GYMMA</title>
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
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_attendance.php">
                <i class="fa fa-calendar-check w3-xxlarge"></i>
                <p>ATTENDANCE</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_users.php">
                <i class="fa fa-users w3-xxlarge"></i>
                <p>MANAGE
                    <br>MEMBERS</p>
            </a>
            <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
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
                <h1 class="w3-jumbo"><strong>Gym Revenue</strong></h1>
            </header>
            <div id='chart'>
            </div>
            <footer class="w3-center" style='margin-top: 14px;'> Copyright © 2013-2020 The Ultimate Gym. All rights reserved.</footer>
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
    <script src='js/dark-unica.js'></script>
    <script>
        Highcharts.chart('chart', {
            chart: {
                type: 'column'
            },
            style: {
                fontFamily: 'sans-serif'
            },
            title: {
                text: ' '
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: [

                    <?php
                  $query = "SELECT profit_date FROM profit";
                  $ret = mysqli_query($conn, $query);

                  while($row = mysqli_fetch_assoc($ret)){
                      $temp = "'".date('F j, Y',strtotime($row['profit_date']))."', ";

                      echo $temp;
                  }
                  ?>
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Total daily revenue',
                data: [
                    <?php
                          $query = "SELECT profit_amount FROM profit";
                          $ret = mysqli_query($conn, $query);

                          while($row = mysqli_fetch_assoc($ret)){
                              echo $row['profit_amount'];
                              echo ",";
                          }
                          ?>
                ]

            }]
        });
    </script>

    </html>