<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Login</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://example.com/campus.jpg') no-repeat center center fixed; /* Replace with your image URL */
            background-size: cover;
            color: #fff;
        }

        /* Overlay to enhance readability */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }

        /* Login Form Container */
        .login-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 100%;
            max-width: 400px;
            transition: 0.7s ease-in-out;
        }

        .login-container h2 {
            margin-bottom: 30px;
            font-size: 24px;
            color: #fff;
        }
        .login-container:hover{
            transition: 0.7s ease-in-out;
            box-shadow: 0 0 30px white;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 90%;
            padding: 15px;
            margin: 10px 0;
            background: #333;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 15px;
            background: #0066cc;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            margin-top: 20px;
            transition: background 0.3s ease;
        }

        .login-container input[type="submit"]:hover {
            background: #004d99;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
            }
        }
        .a1{
            color: white;
            text-decoration: none;
        }
        .a1:hover{
                color: cyan;
                text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    
    <div class="login-container">
        <h2>Login As Teacher</h2>
        <form method="POST">
            <input type="text" name="id" placeholder="Email Id" required>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <a href="forgot.php" class="a1">Forgot Password ?</a><br><br>
            <a href="stud.php" class="a1">Login As Student</a><br><br>
            <a href="admin_login.php" class="a1">Login As Admin</a>
            <input type="submit" name="login" value="Login"><br><br>
            No Have An Account ? <a class="a1" href="teacher_sign_up.php">Registration</a>
        </form>
    </div>
</body>
</html>

<?php

require ("conn.php");
if(isset($_POST['login']))
{
    $id = $_POST['id'];
    $pass = $_POST['password'];

    $login = mysqli_query($conn,"SELECT * FROM `teacher` WHERE `email` = '$id' AND `pass` = '$pass'");
    $tot_rows = mysqli_num_rows($login);
    $found = mysqli_fetch_assoc($login);

    if($found['status'] == "Pending")
    {
        echo "<script>alert('Your Application Under Process!');</script>";
    }
    else if($found['status'] == "Reject")
    {
        echo "<script>alert('Your Application Rejected!');</script>";
    }
    else
    {
        if($tot_rows == 1)
        {
            session_start();
            $_SESSION['teacher_id'] = $found['email'];
            echo "<script>alert('Login Success');</script>";
            echo "<script>window.location.href='teacher_home.php';</script>";
        }   
        else
        {
            echo "<script>alert('Invalid Id Or Password!');</script>";
            echo "<script>window.location.href='teacher.php';</script>";
        }       
    }
}

?>
