<?php
include 'teacher_nav.php';
include 'conn.php';
$select_teacher = mysqli_query($conn, "SELECT * FROM `teacher` WHERE `status` = 'Accept'");
$tot_teacher = mysqli_num_rows($select_teacher);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Profiles</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, rgb(241, 87, 192),rgb(63, 180, 242),rgb(118, 245, 92));
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
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #6c63ff;
        }

        .card h2 {
            font-size: 20px;
            margin: 10px 0;
            color: #333;
        }

        .card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .card p span {
            font-weight: bold;
            color: #333;
        }

        @media (max-width: 768px) {
            .card {
                width: 90%;
            }
        }

        @media (max-width: 480px) {
            .container {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <h1>All Faculties</h1>
    <div class="container">
        <?php
        if ($tot_teacher > 0) {
            while ($row_teacher = mysqli_fetch_assoc($select_teacher)) {
                $nm = $row_teacher['nm'];
                $profile_img = $row_teacher['profile'];
                $education = $row_teacher['education'];

                echo '
                    <div class="card">
                    <img src="./teacher_profile/' . $profile_img . '" alt="Profile Picture">
                    <h2>' . $nm . '</h2>
                    <p><span>Education Qualification:</span> ' . $education . '</p>
                    </div>';
            }
        } else {
            echo '<p>No teachers found in this department.</p>';
        }
        ?>
    </div>
</body>
</html>
