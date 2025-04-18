<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Navigation bar styles */
        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color:rgb(237, 152, 16);
            padding: 10px 0;
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            border: 3px dashed black;
        }

        .navbar a {
            text-decoration: none;
            color: black;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 85px;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .navbar a:hover {
            background-color: black;
            color: white;
            transform: scale(1.1);
        }


        /* Ensure content doesn't overlap the navbar */
        .content {
            margin-top: 80px; /* Height of navbar */
            padding: 20px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="stud_profile.php" >Profile</a>
        <a href="stud_faculty.php">Faculties</a>
        <a href="home.php">Dashboard</a>
        <a href="stud_friends.php">Students</a>
        <a href="feedback.php">Feedback</a>
    </div>
</body>
</html>
