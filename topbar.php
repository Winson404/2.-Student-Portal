<?php
    session_start();
    include 'config.php';
    if(isset($_SESSION['student']) && isset($_SESSION['student_id'])) {
    $id = $_SESSION['student_id'];
    header("Location: student/dashboard.php");
    } elseif(isset($_SESSION['admin_username']) && isset($_SESSION['admin_id'])) {
    $id = $_SESSION['admin_id'];
    header("Location: admin/dashboard.php");
    } else {
?>

 

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>NLPSC</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- css -->
<link href="index_style/bootstrap.min.css" rel="stylesheet" />

<link href="index_style/flexslider.css" rel="stylesheet" />
<link href="index_style/style.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script src="js/jquery.min.js"></script>

</head>
<body>
<div id="wrapper">
    <!-- start header -->
    <header>
    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                <img src="images/logo.png" alt="logo" width="50" />
                NORTH LUZON PHILIPPINES STATE COLLEGE</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li> 
                    <li><a href="about.php">About Us</a></li>
                    <!-- <li><a href="#courses">Courses</a></li>
                    <li><a href="#announcement">Announcements</a></li> -->
                    <li><a href="contact.php">Contact</a></li>
                    <!-- <li><a href="login.php">Login</a></li> -->
                    <li><a href="">|</a> </li>
                    <li><a href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
    <!-- end header -->
<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//

    }
?>