<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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

        /* Centering the images and keeping a perfect ratio */
        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 100px; 
            gap: 20px;
            margin-bottom: 30px;
        }

        .image-gallery img {
            width: calc(44% - 20px); 
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer; 
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1001;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
        }

    
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            margin-bottom: 50px;
        }


        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }
        .close:hover{
            color: red;
            border: #f0f0f0;
        }

        .modal-content, .close {
            animation-duration: 0.4s;
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

    <div class="image-gallery">
        <img src="photos/p1.jpeg" alt="">
        <img src="photos/p2.jpeg" alt="">
        <img src="photos/p3.jpg" alt="">
        <img src="photos/p4.jpg" alt="">
        <img src="photos/p5.jpg" alt="">
        <img src="photos/p6.jpg" alt="">
    </div>

    <!-- The Modal -->
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="fullImage">
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("imageModal");

        // Get the image and the modal image placeholder
        var modalImg = document.getElementById("fullImage");

        // Get all images in the gallery
        var images = document.querySelectorAll(".image-gallery img");

        // Get the close button
        var span = document.getElementsByClassName("close")[0];

        // Loop through all images and add click event
        images.forEach(function(image) {
            image.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src; // Set modal image to clicked image source
            };
        });

        // When the close button is clicked
        span.onclick = function() { 
            modal.style.display = "none";
        }

        // Close modal when clicked outside the image
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>
</html>
