<?php
    require("connect.php");

    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $password = md5(mysqli_real_escape_string($conn, $_POST['password']));
        $confirm = mysqli_real_escape_string($conn, $_POST['confirm']);
            
        if($password!=$confirm){
            echo("<script>alert('Passwords do not match. Please try again.')</script>");
        }else{
        
        $check = "SELECT * FROM member WHERE member_username = '{$username}'";
        $query = mysqli_query($conn,$check);
        if(mysqli_num_rows($query)==0){
        
        $sql = "INSERT INTO member(`member_username`, `member_fname`, `member_lname`, `member_password`) VALUES ('{$username}','{$fname}','{$lname}','{$password}')";
    
        $query = mysqli_query($conn,$sql);
        }else{
            echo("<script>alert('Username is already taken.')</script>");
        }
    }
    }
?>
<html>
    <head>
        <title>Registration | The Ultimate Gym</title>
        <link rel="stylesheet" type="text/css" href='css/bootstrap.min.css'/> 
    </head>
    <style>
        body{
            background: black;
            color:white;
        }
        .button {
            background-color: gray;
            border: none;
            color: black;
            padding: 3px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button:hover {
            background-color: white;
            color: black;
        }
        .signup{
            padding: 15px 50px;
        }
    </style>
    <body>
        <div class="container-fluid" style="text-align:center">
            <div class="row">
                <div>
                    <br>
                    <img src="images/ultimategym_logo.png" style='width:19%'>
                </div>
            </div>
            <h3>Registration</h3>
            <div class="row" style='margin-left:85px'>
                <div class='col-md-3 col-md-offset-4'>
                    <form method='POST' action="#">
                        <label><strong>Username</strong><input type="text" class='form-control' name = "username" required='required'></label>
                        <div style="margin-top:1px"></div>
                        <label><strong>First name</strong><input type="text" class='form-control' name = "fname" required='required'></label>
                        <div style="margin-top:1px"></div>
                        <label><strong>Last name</strong><input type="text" class='form-control' name= 'lname' required='required'></label>
                        <div style="margin-top:1px"></div>
                        <label><strong>Password</strong><input type="password" class='form-control' name='password' required='required'></label>
                        <div style="margin-top:1px"></div>
                        <label><strong>Confirm password</strong><input type="password" class='form-control' name = 'confirm' required='required'></label>
                        <div style="margin-top:1px"></div>
                        <button class='button' style="border-radius:5em" name='submit'><strong>Submit</strong></button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    
    <script src="js/jquery-3.3.1.min.js">
    </script>
</html>