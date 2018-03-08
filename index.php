<?php
    session_start();
    require("connect.php");

    if(isset($_POST['register'])){
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
        $sex = mysqli_real_escape_string($conn, $_POST['sex']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm = mysqli_real_escape_string($conn, $_POST['confirm']);

            
        if($password!=$confirm){
            echo("<script>alert('Passwords do not match. Please try again.')</script>");
        }else{
        
            $today = date("Y-m-d");
            $diff = date_diff(date_create($bdate), date_create($today));
            $age = $diff->format('%y');
        
            $password = md5($password);
            
        $check = "SELECT * FROM member WHERE member_email = '{$email}'";
        $query = mysqli_query($conn,$check);
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO `member`(`member_fname`, `member_lname`, `member_password`, `member_bdate`, `member_sex`, `member_address`, `member_email`, `member_age`) VALUES ('{$fname}','{$lname}','{$password}','{$bdate}','{$sex}','{$address}','{$email}','{$age}')";
    
        $query = mysqli_query($conn,$sql);
            
            
        }else{
            echo("<script>alert('The email address you entered is already linked to another account. Please use another email address and try again.')</script>");
        }
    }
    }

    if(isset($_POST['submit'])){
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            
            
            if($email == 'admin@ultimategym.com' && $password == 'admin'){
                    echo('<script>Welcome admin!</script>');
                    header('location: admin_home.php');
            }else{  
            $password = md5($password);
            $check = "SELECT * FROM member WHERE member_email = '{$email}' AND member_password = '{$password}'";
            $query = mysqli_query($conn,$check);
        
            if(mysqli_num_rows($query)==1){

                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                
                $query = mysqli_query($conn,$sql);
                              
                header('location: home.php');
                
                
            }else{
                echo("<script>alert('Invalid username/password. Please try again.')</script>");
            }
            }
        }
?>
<html>
   <head>
      <title>The Ultimate Gym</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="css/w3.css" rel="stylesheet">
      <link href="fonts/Montserrat-Regular.otf" rel="stylesheet">
      <link href="css/fontawesome-all.min.css" rel="stylesheet">
      <style>
         body, h1,h2,h3,h4,h5,h6{
         font-family: "Montserrat", sans-serif
         }
      </style>
   </head>
   <body class="w3-black">
      <div class="w3-padding-large" style="margin-top:65px" id="main">
         <div class="w3-content w3-section w3-animate-fading w3-center" style="width:100%">
            <div class="w3-display-container mySlides">
               <img src="images/slide1.jpg">
               <div class="w3-display-middle w3-container w3-padding-16 w3-black">
                  Certified trainers, complete equipments, and innovative fitness programs – we have the coaching, programs, and experience <strong>you</strong> need to help you achieve your fitness goals.
               </div>
            </div>
            <div class="w3-display-container mySlides">
               <img src="images/slide2.jpg">
               <div class="w3-display-middle w3-container w3-padding-16 w3-black">
                  Stay <strong>committed</strong> to your fitness goals and <i>experience change</i> with the <strong>Ultimate Gym</strong>.
               </div>
            </div>
            <div class="w3-display-container mySlides">
               <img src="images/slide3.jpg">
               <div class="w3-display-middle w3-container w3-padding-16 w3-black">
                  Located in Nasipit, Talamban, Cebu City - in front of USC Talamban. Your <strong>fitness journey</strong> starts <i>here</i>.
               </div>
            </div>
         </div>
         <div class='w3-center'>
            <img style="width:10%" src="images/ultimategym_logo.png">
            <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-grey w3-large" style="width:200px">Login</button>
            <div id="id01" class="w3-modal ">
               <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                  <div class="w3-center"><br>
                     <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" title="Cancel login" style='color:black'>&times;</span>    
                  </div>
                  <form method="POST" class="w3-container">
                     <div class="w3-section" style="color:black">
                        <span class='w3-jumbo'>Login</span>
                        <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Email Address" name="email" required>
                        <input class="w3-input w3-border" type="password" placeholder="Password" name="password" required>
                        <button class="w3-button w3-block w3-black w3-section w3-padding" type="login" name='submit'>Login</button>
                     </div>
                  </form>
               </div>
            </div>
            <button onclick="document.getElementById('id02').style.display='block'" class="w3-button w3-grey w3-large" style="width:200px">Register</button>
            <div id="id02" class="w3-modal ">
               <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
                  <div class="w3-center"><br>
                     <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-black w3-display-topright" title="Cancel login" style='color:black'>&times;</span>    
                  </div>
                  <form method="POST" class="w3-container">
                     <div class="w3-section" style="color:black">
                        <span class='w3-jumbo'>Register</span>
                         <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="First Name" name='fname' required>
                         <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Last Name" name='lname' required>
                         <strong>Birthdate</strong>
                        <input class="w3-input w3-border w3-margin-bottom "type="date" name="bdate">
                         <strong style='margin-right: 25px'>Sex</strong>
                        <input class="w3-margin-bottom w3-left-align"type="radio" value="Male" name='sex'> Male
                          <input class="w3-margin-bottom "type="radio" value="Female" name='sex' style='margin-left: 25px'> Female
                        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Address"  name='address' required>
                         <input class="w3-input w3-border w3-margin-bottom" type="email" placeholder="Email Address" name='email' required>
                        <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Password"  name='password' required>
                         <input class="w3-input w3-border w3-margin-bottom" type="password" placeholder="Confirm Password" name='confirm' required>
                        <button class="w3-button w3-block w3-black w3-section w3-padding" type="submit" name='register'>Register</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
       <br><br><br><footer class="w3-center"> Copyright © 2013-2020 The Ultimate Gym. All rights reserved.</footer>
   </body>
   <script>
      var myIndex = 0;
      carousel();
      
      function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
             x[i].style.display = "none";  
          }
          myIndex++;
          if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
          setTimeout(carousel, 10000); // Change image every 10 seconds
      }
   </script>
</html>