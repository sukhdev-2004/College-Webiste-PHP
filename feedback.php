<?php
    include 'conn.php';
    include 'stud_nav.php';
    session_start();
    $id = $_SESSION['uid'];
    session_abort();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg,rgb(200, 53, 114),rgb(203, 228, 37),rgb(32, 204, 115));
            background-size: 300% 300%;
            animation: gradientBG 6s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 0%; }
            50% { background-position: 100% 100%; }
            100% { background-position: 0% 0%; }
        }

        /* Feedback card styles */
        .feedback-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            padding: 30px;
            text-align: center;
        }

        .feedback-card h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

        .feedback-card form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .feedback-card input, 
        .feedback-card textarea, 
        .feedback-card button {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: border 0.3s;
        }

        .feedback-card input:focus, 
        .feedback-card textarea:focus {
            border-color: #6c63ff;
        }

        .feedback-card input[type="text"], 
        .feedback-card input[type="email"] {
            width: 100%;
        }

        .feedback-card textarea {
            height: 100px;
            resize: none;
        }

        .feedback-card button {
            background-color: #6c63ff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .feedback-card button:hover {
            background-color: #5548c8;
        }
    </style>
</head>
<body>
    <div class="feedback-card">
        <h2>Feedback Form</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Feedback" required></textarea>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $nm = $_POST['name'];
        $email = $_POST['email'];
        $feedback = $_POST['message'];
        $query = "INSERT INTO `feedback`(`name`, `email`, `feedback`, `user_email`) VALUES ('$nm','$email','$feedback','$id')";
        $insert = mysqli_query($conn,$query);
        if($insert)
        {
            echo "<script>alert('Feedback submitted successfully')</script>";
            echo "<script>window.location.href='home.php'</script>";
        }
        else
        {
            echo "<script>alert('Error : Try Again Later!')</script>";
        }
    }
?>