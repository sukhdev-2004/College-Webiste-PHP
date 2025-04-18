<?php
require "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        /* Your existing CSS styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        body {
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 110vh;
        }
        .container {
            margin-top: 10px;
            background-color: #ffffff;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 550px;
            width: 100%;
            height: 600px;
        }
        .forgot-password-form h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .forgot-password-form p {
            text-align: center;
            color: #666;
            margin-bottom: 10px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s ease;
            margin-bottom: 10px;
        }
        .input-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .back-login {
            text-align: center;
            margin-top: 20px;
        }
        .back-login a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .back-login a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .cap {
            width: 50%;
        }
        .select {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            color: #333;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 6px;
            cursor: pointer;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            margin-bottom: 20px;
        }
        .select:hover {
            border-color: #007bff;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
        }
        .select option {
            padding: 10px;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" class="forgot-password-form" onsubmit="return validateCaptcha()">
            <h2>Forgot Password</h2>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <input type="number" name="phone" placeholder="Enter Your Phone No" required>
                <select class="select" name="stud_teacher">
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                </select>
                <div class="input-group">
                    <input type="text" class="cap" id="captcha" style="background:url('back_cap.jpg');color:white;width: 100px;font-size: 20px;font-weight:bold;" readonly>
                </div>
                <input type="text" id="captcha_input" placeholder="Enter Above Captcha" name="captcha_check" required>

                <input type="password" name="pass" placeholder="Enter Password" required>
                <input type="password" name="pass1" placeholder="Confirm Password" required>
                <button type="submit" name="submit" class="submit-btn">Reset Password</button>
                <p class="back-login"><a href="stud.php">Back to Login</a></p>
            </div>
        </form>
    </div>

    <script>
        // Function to generate random captcha
        function generateCaptcha() {
            var characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var captcha = '';
            for (var i = 0; i < 5; i++) {
                captcha += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            document.getElementById('captcha').value = captcha;
        }

        // Validate the captcha input on form submission
        function validateCaptcha() {
            var generatedCaptcha = document.getElementById('captcha').value;
            var userCaptcha = document.getElementById('captcha_input').value;

            if (generatedCaptcha === userCaptcha) {
                return true; // Captcha matches, allow form submission
            } else {
                alert('Invalid Captcha!');
                generateCaptcha(); // Regenerate captcha if validation fails
                return false; // Prevent form submission
            }
        }

        // Generate captcha when the page loads
        window.onload = generateCaptcha;
    </script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $stud_teach = $_POST['stud_teacher'];
    $pass = $_POST['pass'];
    $con_pass = $_POST['pass1'];
    $pass_len = strlen($pass);
    if ($stud_teach == "Student") {
        $stud_info = mysqli_query($conn, "SELECT * FROM `stud` WHERE email = '$email' AND phone = '$phone'");
        $tot = mysqli_num_rows($stud_info);
        
        if ($tot == 1)
        {
            if ($pass == $con_pass) 
                {
                if($pass_len > 7 && $pass_len < 20)
                {
                    $stud_update = mysqli_query($conn, "UPDATE `stud` SET pass = '$pass' WHERE email = '$email'");
                    if ($stud_update) {
                        echo "<script>alert('Password Reset Successfully');</script>";
                        echo "<script>window.location.href='stud.php';</script>";
                    } else {
                        echo "<script>alert('Password Reset Failed, Try Again Later!');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Password Must Be 8 to 20 Characters!');</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match!');</script>";
            }
        }
        else {
            echo "<script>alert('Invalid Credentials!');</script>";
        }
    }
    else
    {
         $teacher_info = mysqli_query($conn, "SELECT * FROM `teacher` WHERE email = '$email' AND phone = '$phone'");
        $teacher_tot = mysqli_num_rows($teacher_info);
        
        if ($teacher_tot == 1)
        {
            if ($pass == $con_pass) 
                {
                if($pass_len > 7 && $pass_len < 20)
                {
                    $teacher_update = mysqli_query($conn, "UPDATE `teacher` SET pass = '$pass' WHERE email = '$email'");
                    if ($teacher_update) {
                        echo "<script>alert('Password Reset Successfully');</script>";
                        echo "<script>window.location.href='teacher.php';</script>";
                    } else {
                        echo "<script>alert('Password Reset Failed, Try Again Later!');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Password Must Be 8 to 20 Characters!');</script>";
                }
            } else {
                echo "<script>alert('Passwords do not match!');</script>";
            }
        }
        else {
            echo "<script>alert('Invalid Credentials!');</script>";
        }
    
    }
}
?>
