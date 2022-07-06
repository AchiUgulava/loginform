<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Sign up form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
    <div class="nav">
        <div class="nav-link">
            <a href="userlist.php" class="">
                <h1 class="plus">Users</h1>
            </a>
        </div>
        <div class="nav-link">
            <a href="index.php" class="">
                <h1 class="plus">Sign up</h1>
            </a>
        </div>
    </div>
    <div id="signupform" class="container">
        <form id="signform">
            <div class="form">
                <div class="formgroup">
                    <p>First Name</p>
                    <input name="sfirstname" id="sfirstname" type="text">
                </div>
                <div class="formgroup">
                    <p>Last Name</p>
                    <input name="slastname" id="slastname" type="text" >
                </div>
                <div class="formgroup">
                    <p>Email</p>
                    <input name="semail" id="semail" type="text">
                </div>
                <div class="formgroup">
                    <input type="hidden" name="action_type" value="add" />
                    <button type="button" id="signupbutton" class="btn"><span id="signtext">Sign Up</span></button>
                </div>
            </div>
        </form>
    </div>
    <div id="myalert" class="alert">
        <span id="alerttext" class="alerttext"></span>
    </div>

    <script src="signup.js"></script>
</body>

</html>