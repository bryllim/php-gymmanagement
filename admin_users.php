<?php
    session_start();
    require("connect.php");
    
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
      <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="admin_home.php">
        <i class="fa fa-home w3-xxlarge"></i>
        <p>HOME</p>
      </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#">
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
        <h1 class="w3-jumbo"><strong>Manage Users</strong></h1>
      </header>
        <table class="w3-table w3-border w3-responsive">
            <tr>
              <th>ID</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Birthdate</th>    
              <th>Age</th>
              <th>Sex</th>
              <th>Address</th>
              <th>Email</th>
              <th> </th>
              <th> </th>
            </tr>
            <?php
                $unpaid = 'UNPAID';            
            
                $query = "SELECT *
                        FROM member WHERE 1";
                $ret = mysqli_query($conn, $query);

                while($row = mysqli_fetch_assoc($ret)){
                    
                    $id = $row["member_id"];
                    $fname = $row["member_fname"];
                    $lname = $row["member_lname"];
                    $bdate = $row["member_bdate"];
                    $age = $row["member_age"];
                    $sex = $row["member_sex"];
                    $address = $row["member_address"];
                    $email = $row["member_email"];
                    
                     echo "<tr><td>". $id . "</td><td>". $fname. "</td><td>" . $lname. "</td><td>". $bdate. "</td><td>". $age. "</td><td>". $sex. "</td><td>". $address. "</td><td>" . $email. "</td><td><button class='w3-button w3-grey' onclick=\"document.getElementById('". $email. "').style.display='block'\">Payment</button></td><td><button class='w3-button w3-dark-grey' onclick=\"document.getElementById('". $id. "').style.display='block'\">Edit</button></tr>";
                    
                    echo '<div id="'. $id. '" class="w3-modal">
                        <div class="w3-modal-content w3-animate-right w3-card-4">
                          <header class="w3-container w3-black"> 
                            <span onclick="document.getElementById(\''.$id.'\').style.display=\'none\'" 
                            class="w3-button w3-display-topright">&times;</span>
                            <h2><strong>'. $fname. ' '. $lname. '</strong> | Edit Account</h2>
                          </header>
                          <div class="w3-container w3-white">
                          <form method="POST" onsubmit="return check();">
                            <input class="w3-input w3-border w3-margin-bottom" type="hidden" value="'.$id.'" name="id" required>
                            <p><strong>First name:</strong></p>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" value="'.$fname.'" name="fname" required>
                            <p><strong>Last name:</strong></p>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" value="'.$lname.'" name="lname" required>
                            <p><strong>Birth date:</strong></p>
                            <input class="w3-input w3-border w3-margin-bottom" type="date" value="'.$bdate.'" name="bdate" required>
                            <strong style=\'margin-right: 25px\'>Sex:</strong>
                            <input class="w3-margin-bottom w3-left-align"type="radio" name="sex" value="Male" '.(($sex=="Male")?"checked":"").'> Male
                              <input class="w3-margin-bottom "type="radio" value="Female" name="sex" '.(($sex=="Female")?"checked":"").' style=\'margin-left: 25px\'> Female
                            <p><strong>Address:</strong></p>
                            <input class="w3-input w3-border w3-margin-bottom" type="text" value="'.$address.'" name="address" required>
                            <p><strong>Email:</strong></p>
                            <input class="w3-input w3-border w3-margin-bottom" type="email" value="'.$email.'" name="email" required>
                            <div class="w3-center">
                            <button class="w3-button w3-red w3-section w3-padding" type="submit" name="delete">Delete Account</button>
                            <button class="w3-button w3-black w3-section w3-padding" type="submit" name="update" ><strong>Update Account</strong></button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>';
                    
                    $qry = "SELECT * FROM payment JOIN member ON payment.member_id = member.member_id WHERE member.member_id = '{$id}'";
                    $rt = mysqli_query($conn, $qry);
                    
                    if(mysqli_num_rows($rt)==0){
                            $sq = "INSERT INTO `payment`(`member_id`, `payment_status`,`payment_days_left`) VALUES ({$id},'UNPAID',0)";

                            $qy = mysqli_query($conn,$sq);

                            }

                    while($rw = mysqli_fetch_assoc($rt)){
                        
                        
                    
                    $status = $rw["payment_status"];
                    $daysleft = $rw["payment_days_left"];
                    $validity = $rw["payment_validity"];
                    
                    if($validity == '0000-00-00'){
                        $valid = 'Membership Status';
                    }else{
                        $valid = 'Membership valid until '.$validity;
                    }
                    
                    echo '<div id="'. $email. '" class="w3-modal">
                        <div class="w3-modal-content w3-animate-right w3-card-4">
                          <header class="w3-container w3-black"> 
                            <span onclick="document.getElementById(\''.$email.'\').style.display=\'none\'" 
                            class="w3-button w3-display-topright">&times;</span>
                            <h2><strong>'. $fname. ' '. $lname. '</strong> | Payment</h2>
                          </header>
                          <div class="w3-container w3-white">
                          <form method="POST" onsubmit="return check();">
                           <input type="hidden" value="'.$id.'" name="id" required>
                           <input type="hidden" value="'.$status.'" name="status" required>
                           <input type="hidden" value="'.$daysleft.'" name="daysleft" required>
                           <input type="hidden" value="'.$validity.'" name="validity" required>
                            <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
                              <div class="w3-half w3-section">
                                <span class="w3-xlarge">'.$status.'</span><br>
                                '.$valid.'<br>
                                <button class="w3-button w3-black w3-section w3-padding" type="submit" name="enroll"><strong>Enroll / Extend</strong></button>
                                <h3>₱200.00</h3>
                              </div>
                              <div class="w3-half w3-section">
                                <span class="w3-xlarge">'. $daysleft .'</span><br>
                                Days left until next payment<br>
                                <button class="w3-button w3-black w3-section w3-padding" type="submit" name="add"><strong>Add 30 Days</strong></button>
                                <h3>₱800.00</h3>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>';
                    }
                    
                }
            
            
            if(isset($_POST['update'])){
                
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                $bdate = mysqli_real_escape_string($conn, $_POST['bdate']);
                $sex = mysqli_real_escape_string($conn, $_POST['sex']);
                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                
                $today = date("Y-m-d");
                $diff = date_diff(date_create($bdate), date_create($today));
                $age = $diff->format('%y');
                
                $sql = "UPDATE `member` SET `member_fname`='{$fname}',`member_lname`='{$lname}',`member_bdate`='{$bdate}',`member_age`='{$age}',`member_sex`='{$sex}',`member_address`='{$address}',`member_email`='{$email}' WHERE member_id = '{$id}'";
                
                $query = mysqli_query($conn,$sql);
                echo("<meta http-equiv='refresh' content='0'>");

            }
            
            if(isset($_POST['delete'])){
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $sql = "DELETE FROM `payment` WHERE payment.member_id = '{$id}'";
                $query = mysqli_query($conn,$sql);
                $sql = "DELETE FROM `member` WHERE member.member_id = '{$id}'";
                $query = mysqli_query($conn,$sql);
                echo("<meta http-equiv='refresh' content='0'>");
            }
            
            if(isset($_POST['enroll'])){
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $validity = mysqli_real_escape_string($conn, $_POST['validity']);
                if($validity=='0000-00-00'){
                    $validity = date("Y-m-d");
                }
                $sql = "UPDATE `payment` SET `payment_status`='PAID', payment_validity = DATE_ADD('{$validity}', INTERVAL 1 YEAR) WHERE member_id = {$id}";
                $query = mysqli_query($conn,$sql);
                echo("<meta http-equiv='refresh' content='0'>");
            }
            
            if(isset($_POST['add'])){
                $id = mysqli_real_escape_string($conn, $_POST['id']);
                $daysleft = mysqli_real_escape_string($conn, $_POST['daysleft']);
                $daysleft+=30;
                $today = date('Y-m-d');
                $sql = "UPDATE payment SET payment_days_left= {$daysleft}, payment_datetracker = '{$today}' WHERE member_id = {$id}";
                $query = mysqli_query($conn,$sql);
                echo("<meta http-equiv='refresh' content='0'>");
            }
                     

            ?>
          </table>
    </div>
</body>

<script>
function check()
{
    return confirm("Are you sure?");
}
</script>
</html>