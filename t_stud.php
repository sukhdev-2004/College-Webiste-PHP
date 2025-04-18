<?php
    include 'teacher_nav.php';
    include 'conn.php';
    $stud = mysqli_query($conn, "SELECT * FROM `stud` WHERE `status` = 'Accept'");
    $stud_count = mysqli_num_rows($stud);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profiles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, rgb(223, 255, 16),rgb(250, 51, 110),rgb(62, 102, 247));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 80px; /* Account for navigation bar height */
            background-size: 200% 200%; /* Enable movement of gradient */
            animation: gradientBG 10s ease infinite;
        }
        @keyframes gradientBG {
    0% {
        background-position: 0% 50%; /* Start from the left */
    }
    50% {
        background-position: 100% 50%; /* Move to the right */
    }
    100% {
        background-position: 0% 50%; /* Return to the left */
    }
}

        h1 {
            color: black;
            text-align: center;
            margin-bottom: 20px;
        }

        .student-container {
            display: inline;
            flex-wrap: wrap;
            justify-content: start;
            gap: 20px;
            padding: 10px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .student-profile {
            display: flex;
            align-items: center;
            padding: 10px;
            margin: 15px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        .student-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 3px dashed  #333;
        }

        .student-profile h2 {
            font-size: 18px;
            color: #333;
        }

        @media (max-width: 768px) {
            .student-profile {
                width: 100%;
                justify-content: flex-start;
            }

            .student-profile img {
                width: 70px;
                height: 70px;
            }
        }

        
    </style>
</head>
<body>
    <h1>All Students In Both Department</h1>
    <div class="student-container">
        <?php
        if ($stud_count > 0) {
            while ($row = mysqli_fetch_assoc($stud)) {
                $nm = $row['nm'];
                $profile = $row['profile'];

                echo '
                    <div class="student-profile">
                        <img src="./profile/' . $profile . '" alt="Profile Picture">
                        <h2>' . $nm . '</h2>
                    </div>';
            }
        } else {
            echo '<p>No students found in this department.</p>';
        }
        ?>
    </div>
</body>
</html>
