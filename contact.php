<!DOCTYPE html>
<html>

<head>
    <title>Contact | The Ultimate Gym</title>
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
		<p>PROFILE</p></a> <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" href="program.php"><i class="fa fa-th-list w3-xxlarge"></i>
		<p>PROGRAMS</p></a> <a class="w3-bar-item w3-button w3-padding-large w3-black" href="#"><i class="fa fa-envelope w3-xxlarge"></i>
		<p>CONTACT</p></a>
        <a class="w3-bar-item w3-button w3-padding-large w3-hover-black" onclick="document.getElementById('logout').style.display='block';">
            <i class="fa fa-sign-out-alt w3-xxlarge"></i>
            <p>LOG OUT</p>
        </a>
    </nav>
    <div class="w3-padding-large" id="main">
        <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
            <br>
            <br>
            <h2 class="w3-text-light-grey">Contact Us</h2>
            <hr class="w3-opacity" style="width:200px">
            <div class="w3-section">
                <p><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> 2nd Floor G7 Building above KFC facing USC Talamban Campus, Nasipit, Talamban, Cebu City, Cebu 6000</p>
                <p><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: +63 (905) 521 0329</p>
                <p><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Email: theultimategym@gmail.com</p>
            </div>
            <br>
            <p>Need assistance? Have questions, suggestions, complaints, or recommendations? Get in touch.</p>
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