<?php
    require ("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #74ebd5, #9face6);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            transition: background 1s;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
            margin: 1rem;
            box-sizing: border-box;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        h1 {
            margin-bottom: 1.5rem;
            color: #1a73e8;
        }

        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }

        input, select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        input:focus, select:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 5px rgba(26, 115, 232, 0.5);
            outline: none;
        }

        button {
            background: #1a73e8;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s;
        }

        button:hover {
            background: #0c47a1;
        }

        @media (max-width: 600px) {
            .container {
                padding: 1rem;
            }

            input, select, button {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            button {
                padding: 0.5rem 1rem;
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
    <div class="container">
        <h1>Student Registration</h1>
        <form id="registrationForm" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label for="name">Profile Photo:</label>
                <input type="file" id="name" name="profile" required>
            </div>
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="course">Course:</label>
                <select id="course" name="course" required>
                    <option value="BSC CA & IT">BSC CA & IT</option>
                    <option value="BCA">BCA</option>
                </select>
            </div>
         
            <button type="submit" name="submit">Register</button><br><br>
            Already Have An Account ?<a href="stud.php"> Login</a><br><br>
            Registration As Teacher ? <a href="teacher_sign_up.php">Registration</a>
        </form>
    </div>

    <script>
         const today = new Date().toISOString().split('T')[0];
        document.getElementById('dob').setAttribute('max', today);
        const colors = ['#74ebd5', '#9face6', '#ffecd2', '#fcb69f', '#ff9a9e'];
        let index = 0;

        function changeBackgroundColor() {
            document.body.style.background = colors[index];
            index = (index+1) % colors.length;
        }

        setInterval(changeBackgroundColor, 3000); // Change color every 3 seconds
    </script>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    require("conn.php");

    $photo = $_FILES['profile']['name'];
    $tmp_name = $_FILES['profile']['tmp_name'];  // Temporary file name
    $nm = $_POST['name']; 
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob']; // This is in yyyy-mm-dd format
    $course = $_POST['course'];
    $pass = $_POST['password'];
    $c_pass = $_POST['confirm_password'];
    
    $phone_len = strlen($phone);

    if($phone_len == 10){
        if($pass == $c_pass)
        {
            // Convert the date from yyyy-mm-dd to dd/mm/yyyy
            $dob_formatted = date("d/m/Y", strtotime($dob));

            $img = move_uploaded_file($tmp_name, "profile/" . $photo);
            $insert = mysqli_query($conn, "INSERT INTO `stud` (`profile`, `nm`, `email`, `phone`, `dob`, `course`, `pass`,`roll_no`) VALUES ('$photo','$nm','$email','$phone','$dob_formatted','$course','$pass','0')");

            if($insert && $img)
            {
                echo "<script>alert('Registration Success!');</script>";
                echo "<script>window.location.href='stud.php';</script>";
            }
            else
            {
                echo "<script>alert('Registration Failed!');</script>";
            }
            
        }
        else
        {
            echo "<script>alert('Password Not Match!');</script>";
        }
    }
    else
    {
        echo "<script>alert('Invalid Phone Number!');</script>";
    }
}
?>
