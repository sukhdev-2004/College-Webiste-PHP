<?php
include 'conn.php';
include 'stud_nav.php';
session_start();
$id = $_SESSION['uid'];
$sql = "SELECT * FROM `stud` WHERE `email` = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
session_abort();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4, #fbc2eb);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .info-card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 500px;
            text-align: center;
            margin-top: 60px;
        }

        .info-card h2 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .info-card p {
            font-size: 1rem;
            color: #555;
            margin: 10px 0;
            line-height: 1.5;
        }

        .info-card .label {
            font-weight: bold;
            color: #000;
        }

        .info-card .icon {
            font-size: 3rem;
            color: #6c63ff;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #6c63ff;
            color: #ffffff;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background: #4e4db8;
            transform: translateY(-3px);
        }
        img{
            transition: 0.2s ease-in-out;
            border: 3px black dotted;
            border-radius: 50%;
        }
        img:hover{
            transition: 0.5s ease-in-out;
            transform: scale(1.7);
        }
    </style>
</head>
<body>
    <div class="info-card">
        <div class="icon">
            <img src="./profile/<?php echo $row['profile'];?>" alt="" height="100px" width="100px">
        </div>
        <h2>Personal Information</h2>
        <p><span class="label">Name :</span> <?php echo $row['nm'] ?></p>
        <p><span class="label">Roll No :</span> <?php echo $row['roll_no'] ?></p>
        <p><span class="label">Course :</span> <?php echo $row['course'] ?></p>
        <p><span class="label">Email :</span> <?php echo $row['email'] ?></p>
        <p><span class="label">Phone :</span> <?php echo $row['phone'] ?></p>
       
        <p><span class="label">Date of Birth:</span> <?php echo $row['dob'] ?></p>
    </div>
</body>
</html>
