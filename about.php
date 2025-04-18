<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Our College</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f6f7fb;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        .about-section {
            width: 100%;
            max-width: 1200px;
            text-align: left;
            padding: 100px 20px;
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 50px;
        }

        .about-section .content {
            max-width: 600px;
        }

        .about-section h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .about-section p {
            font-size: 1.2em;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .about-section img {
            border-radius: 10px;
            max-width: 500px;
            height: auto;
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

    <div class="about-section">
        <div class="content">
            <h1>About Our College</h1>
            <p>Shri Dadabhai Naoroji Institute of Computer Application, Anand formally known as Shri D N Institute of Computer Application in short it calls DNICA, established in April 2011. It is affiliated to Sardar Patel University, Vallabh Vidyanagar & managed by Charotar Education society, Anand, which was established on 16th April 1916 by the Gem of Charotar Shri Motibhai Amin Saheb with a view to developing higher education in the Charotar Pradesh, the region between the Mahi and Vatrak rivers extending from Vasad to Kheda. 
            </p>
            <p>    
            The constitution of the society was framed by Shri Vithalbhai Patel, the elder brother of Sardar Vallabhabhai Patel, who played an active role in the preparation of the Indian Constitution. In the beginning the Society was managed by the brothers Shri IshwarbhaiJ. Patel and Shri Vitthalbhai J. Patel. Shri IshwarbhaiJ. Patel had been the Vice Chancellor of international universities as well as the Vice Chancellor of many universities of Gujarat.The Charotar Education Society is spread over 41 acares of land and has 4 big campuses in which K.G.to P.G.education is provided to the needful students.The society runs P.T.C, Education, Arts, Commerce, Science and physical education degree colleges and has also started P.G.self financed courses in Science, Education, Arts & Physical education.Shri Dadabhai Naoroji Institute of Computer Application offers Bachelor of Computer Application, Bachelor of Science in IT.

            </p></div>

        <img src="camp.jpg" height="600px" width="400px" style="margin-right: 50px;" alt="Campus Image" >
    </div>

</body>
</html>
