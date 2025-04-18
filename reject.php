<?php
include 'admin_nav.php'
?>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        img {
            border-radius: 50%;
            border: 2px solid #4CAF50;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            text-align: center;
            margin: 20px 0;
            font-size: 24px;
            color: #333;
        }
        button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #45a049; /* Darker green */
            transform: scale(1.05);
        }

        button:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Rejected Applications</h1>
        
        <?php
            require ("conn.php");

            // Student ---------------------------------------

            $stud_query = mysqli_query($conn,"SELECT * FROM `stud` WHERE `status` = 'Reject'");
            $tot_stud = mysqli_num_rows($stud_query);
            $no = 1;

            if($tot_stud > 0)
            {
                echo '<div class="section-title">Student Rejected Application</div>';
                echo '<table>';
                echo '<tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Phone NO.</th>
                        <th>D.O.B</th>
                        <th>Course</th>
                        
                      </tr>';
                while($row = mysqli_fetch_assoc($stud_query))
                {
                    ?>
                    <form method="post">
                            <tr>
                            <td><img src="./profile/<?php echo $row['profile']?>" alt="" width="50px"></td>
                            <td><?php echo $row['nm']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['phone']?></td>
                            <td><?php echo $row['dob']?></td>
                            <td><?php echo $row['course']?></td>
                      
                          </tr>
                          </form>
                          <?php
                          
                          
                }
                echo '</table>';
            }
            else
            {
                ?>
                    <table>
                        <tr>
                            <th>Student Pending Requests</th>
                        </tr>
                        <tr>
                            <td>No Requests Found !!!</td>
                        </tr>
                    </table>
                <?php
            }       

            // Teacher ----------------------------------------------------

            $teacher_query = mysqli_query($conn,"SELECT * FROM `teacher` WHERE `status` = 'Reject'");
            $tot_teacher = mysqli_num_rows($teacher_query);
            if($tot_teacher > 0)
            {
                echo '<div class="section-title">Teacher Rejected Application</div>';
                echo '<table>';
                echo '<tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Phone NO.</th>
                        <th>Qualification</th>
                        <th>Department</th>
                      </tr>';
                while($row = mysqli_fetch_assoc($teacher_query))
                {
                    ?>
                    <tr>
                    <td><img src="./teacher_profile/<?php echo $row['profile']?>" alt="" width="50px"></td>
                    <td><?php echo $row['nm']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phone']?></td>
                    <td><?php echo $row['education']?></td>
                    <td><?php echo $row['department']?></td>
                     </form>
                  </tr>
                  <?php
                  
                }
                echo '</table>';
            }
            else
            {
                ?>
                    <table>
                        <tr>
                            <th>Teacher Rejected Application</th>
                        </tr>
                        <tr>
                            <td>No Application Found !!!</td>
                        </tr>
                    </table>
                <?php
            }
        ?>
    </div>
</body>
</html>