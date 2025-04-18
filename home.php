<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
   <link rel="stylesheet" href="dash_css.css">
</head>
<body>
    <?php 
    include 'conn.php';
    session_start();
    $id = $_SESSION['uid'];
    $sql = "SELECT * FROM `stud` WHERE `email` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $nm = $row['nm'];
    session_abort();
    ?>
    
    <h1><?php echo $nm; ?> Welcome To Shri D.N.Institute of Computer Application</h1>
    <div class="container">
        <div class="card">
            <a href="stud_faculty.php"><img alt="Faculty Search Icon" src="https://storage.googleapis.com/a1aa/image/gxeFfTeg3gFV6Ii3dFunwnno8VVRe8yggRTbi44f8f0ScK9eJA.jpg"/></a>
            <p>Faculties</p>
        </div>
        <div class="card">
            <a href="stud_profile.php"><img alt="Personal Info Icon" src="https://storage.googleapis.com/a1aa/image/eLrfQautKqr9uEUqMohPZwVEFgXSLFbn71ntWJDr6Da0p07TA.jpg"/></a>
            <p>Personal Info</p>
        </div>
        <div class="card">
           <a href="feedback.php"> <img alt="Feedback Forms Icon" src="https://storage.googleapis.com/a1aa/image/gnaAWJsxnBIYI1TIeLnv82lSlGBPm9wETqpR06028Oi2U69JA.jpg"/></a>
            <p>Feedback</p>
        </div>
        <div class="card">
            <a href="stud_friends.php"><img alt="Student Icon" src="https://storage.googleapis.com/a1aa/image/gxeFfTeg3gFV6Ii3dFunwnno8VVRe8yggRTbi44f8f0ScK9eJA.jpg"/></a>
            <p>Students</p>
        </div>
    </div>
</body>
</html>
