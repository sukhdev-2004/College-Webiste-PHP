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
        <h1>Requested Applications</h1>
        
        <?php
            require ("conn.php");

            // Student ---------------------------------------

            $stud_query = mysqli_query($conn,"SELECT * FROM `stud` WHERE `status` = 'Pending'");
            $tot_stud = mysqli_num_rows($stud_query);
            $no = 1;

            if($tot_stud > 0)
            {
                echo '<div class="section-title">Student Pending Requests</div>';
                echo '<table>';
                echo '<tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Phone NO.</th>
                        <th>D.O.B</th>
                        <th>Course</th>
                        <th>Roll No(if Accept)</th>
                        <th>Action</th>
                        
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
                            <td><input type="number" size="5" name="rno" placeholder="Ex.21"></td>
                            <td><button name="s_<?php echo $no?>">Accept</button>
                            <button name="r_<?php echo $no?>">Reject</button></td>
                      
                          </tr>
                          </form>
                          <?php
                          if (isset($_POST["s_$no"]))
                          {
                            $rno = $_POST['rno'];
                            if($rno == "")
                            {
                                echo "<script>alert('Please Enter Roll No.');</script>";
                            }
                            else
                            {
                                
                                if($row['course'] == "BSC CA & IT")
                                {
                                    $roll_no = "BSCIT_$rno";
                                }
                                else
                                {
                                    $roll_no = "BCA_$rno";
                                }
                                
                                $new_id = $row['email'];
                                $update_status = mysqli_query($conn,"UPDATE `stud` SET `status`='Accept' ,`roll_no` = '$roll_no' WHERE `email` = '$new_id'");
                                if($update_status)
                                {
                                    echo "<script>alert('Student Accepted!');</script>";
                                    echo "<script>location.href='admin.php';</script>";
                                }
                                else
                                {
                                    echo "<script>alert('Error Occured!');</script>";
                                    echo "<script>location.href='admin.php';</script>";
                                }
                               
                            }
                          }
                          if (isset($_POST["r_$no"]))
                          {
                                $new_id = $row['email'];
                                $update_status = mysqli_query($conn,"UPDATE `stud` SET `status`='Reject' WHERE `email` = '$new_id'");
                                echo "<script>alert('Student Rejected!');</script>";
                                echo "<script>location.href='admin.php';</script>";
                          }
                          $no++;
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

            $teacher_query = mysqli_query($conn,"SELECT * FROM `teacher` WHERE `status` = 'Pending'");
            $tot_teacher = mysqli_num_rows($teacher_query);
            $no1=1;
            if($tot_teacher > 0)
            {
                echo '<form method=post>';
                echo '<div class="section-title">Teacher Pending Requests</div>';
                echo '<table>';
                echo '<tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Email ID</th>
                        <th>Phone NO.</th>
                        <th>Qualification</th>
                        <th>Department</th>
                        <th>Action</th>
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
        
                    <td> <button name="s1_<?php echo $no1?>">Accept</button>
                     <button name="r1_<?php echo $no1?>">Reject</button></td>
                     </form>
                  </tr>
                  <?php
                  
                  if (isset($_POST["s1_$no1"]))
                  {
                        $new_id = $row['email'];
                        $update_status = mysqli_query($conn,"UPDATE `teacher` SET `status`='Accept' WHERE `email` = '$new_id'");
                        echo "<script>alert('Teacher Accepted!');</script>";
                        echo "<script>location.href='admin.php';</script>";
                  }
                  if (isset($_POST["r1_$no1"]))
                  {
                        $new_id = $row['email'];
                        $update_status = mysqli_query($conn,"UPDATE `teacher` SET `status`='Reject' WHERE `email` = '$new_id'");
                        echo "<script>alert('Teacher Rejected!');</script>";
                        echo "<script>location.href='admin.php';</script>";
                  }
                  $no1++;
                }
                echo '</table>';
                echo '</form>';
            }
            else
            {
                ?>
                    <table>
                        <tr>
                            <th>Teacher Pending Requests</th>
                        </tr>
                        <tr>
                            <td>No Requests Found !!!</td>
                        </tr>
                    </table>
                <?php
            }
        ?>
    </div>
</body>
</html>