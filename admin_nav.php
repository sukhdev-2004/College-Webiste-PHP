<html>
<head>
    <title>Navigation Bar</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            display: flex;
            background-color: #333;
            padding: 10px;
            border-radius: 15px;
        }
        .navbar a {
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            text-align: center;
            flex: 1;
            transition: 0.3s ease-in-out;
            border-radius: 15px;
        }
        .navbar a:hover
        {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="admin.php">Requested Applications</a>
        <a href="accept.php">Accepted Applications</a>
        <a href="reject.php">Rejected Applications</a>
        <a href="all_feedbacks.php">Feedback</a>
    </div>
</body>
</html>