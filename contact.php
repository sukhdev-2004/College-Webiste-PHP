<?php
require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .contact-container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            margin-top: 120px;
            margin-bottom: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
        
        .navbar {
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: flex-start;
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
            margin-right: 20px;
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
    <div class="contact-container">
        <h2>Contact Us</h2>
        <form method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <input type="submit" name="send" value="Send Message">
        </form>
    </div>
</body>
</html>

<?php
if(isset($_POST["send"]))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    $query = mysqli_query($conn,"INSERT INTO `contact`(`name`, `email`, `subject`, `message`) VALUES ('$name','$email','$sub','$msg')");

    if($query)
    {
        echo "<script>alert('Message Send Successfully!');</script>";
    }
    else
    {
        echo "<script>alert('Erro : Try Again Later!');</script>";
    }
}
?>
