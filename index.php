<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Welcome Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f6f7fb;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .navbar {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: flex-start; /* Align items to the left */
            align-items: center;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar img {
            max-height: 50px;
            margin-right: 20px; /* Space between logo and nav items */
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .navbar ul li a:hover {
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .hero {
            width: 100%;
            max-width: 1200px;
            text-align: left;
            padding: 100px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 50px;
            margin-top: 0px;
        }

        .hero .content {
            max-width: 600px;
        }

        .hero h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .hero .cta-buttons {
            display: flex;
            gap: 20px;
        }

        .hero .cta-buttons a {
            padding: 15px 25px;
            background-color: #333;
            color: #fff;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .hero .cta-buttons a:hover {
            background-color: #555;
        }

        .hero img {
            border-radius: 10px;
            height: 380px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <img src="logo_img.png" alt="College Logo">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="photos.php">Photos</a></li>
        </ul>
    </div>

    <div class="hero">
        <div class="content">
            <h1>Welcome To Shri D N Institute of Computer Application</h1>
            <p>Shri Dadabhai Naoroji Institute of Computer Application, Anand formally known as Shri D N Institute of Computer Application in short it calls DNICA, established in April 2011.It is affiliated to Sardar Patel University, Vallabh Vidyanagar & managed by Charotar Education society, Anand, which was established on 16th April 1916 .</p>
            <div class="cta-buttons">
                <a href="stud.php">Login</a>
                <a href="sign_up.php">Sign up</a>
            </div>
        </div>
        <img src="stud_img.png" alt="Student Image">
    </div>

</body>
</html>
