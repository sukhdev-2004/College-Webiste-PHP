<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .login-container label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        .login-container input {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }
        a{
            text-decoration: none;
            color: black;
            text-align: center;
        }
        a:hover{
            text-decoration: underline;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
       
        <form  method="POST">
            <label for="admin_id">Admin ID</label>
            <input type="password" id="admin_id" name="id" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="pass" required>

            <button type="submit" name="submit">Login</button><br><br>
           <center> <a href="stud.php">Go Back</a></center>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST["submit"]))
    {   $id = $_POST["id"];
        $pass = $_POST["pass"];
        if($id == "het_admin_2225" && $pass == "het_2225")
        {
            echo "<script>alert('Welcome Admin!');</script>";
            echo "<script>location.href='admin.php';</script>";
        }
        else
        {
            echo "<script>alert('Invalid Id or Password!');</script>";
        }
    }
?>
