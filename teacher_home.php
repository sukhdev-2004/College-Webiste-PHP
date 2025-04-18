<?php
require ('conn.php');

session_start();
$teacher_id = $_SESSION['teacher_id'];
session_abort();
$teacher = mysqli_query($conn,"SELECT * FROM `teacher` WHERE `email` = '$teacher_id'");
$data = mysqli_fetch_assoc($teacher);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dash_css.css">
</head>
<body>
<h1><?php echo $data['nm']; ?> Welcome To Shri D.N.Institute of Computer Application</h1>
    <div class="container">
        <div class="card">
            <a href="t_faculty.php"><img alt="Faculty Search Icon" src="https://storage.googleapis.com/a1aa/image/gxeFfTeg3gFV6Ii3dFunwnno8VVRe8yggRTbi44f8f0ScK9eJA.jpg"/></a>
            <p>Faculties</p>
        </div>
        <div class="card">
            <a href="t_profile.php"><img alt="Personal Info Icon" src="https://storage.googleapis.com/a1aa/image/eLrfQautKqr9uEUqMohPZwVEFgXSLFbn71ntWJDr6Da0p07TA.jpg"/></a>
            <p>Personal Info</p>
        </div>
        <div class="card">
           <a href="t_feedback.php"> <img alt="Feedback Forms Icon" src="https://storage.googleapis.com/a1aa/image/gnaAWJsxnBIYI1TIeLnv82lSlGBPm9wETqpR06028Oi2U69JA.jpg"/></a>
            <p>Feedback</p>
        </div>
        <div class="card">
            <a href="t_stud.php"><img alt="Student Icon" src="https://storage.googleapis.com/a1aa/image/gxeFfTeg3gFV6Ii3dFunwnno8VVRe8yggRTbi44f8f0ScK9eJA.jpg"/></a>
            <p>Students</p>
        </div>
    </div>
</body>
</html>