<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../css/mystyle.css';
      ?>
    </style>
  </head>
  <body>

    <?php
      $servername = "localhost";
      $username = "anonymous";
      $password = "123";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=elibrary", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully!<br>";

        $value = $_POST['search'];
        if ($value == null) {
          $result = null;
        }
        else {
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookCategory = '$value' OR bookName LiKE '%$value%'");

          if ($result->rowCount() < 1) {
            $result = null;
          }
        }

        echo $value;
        $resultCat = $conn->query("SELECT bookCategory FROM book GROUP BY bookCategory");
        $conn = null;

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

    <div class="header">
      <h1>Welcome to e-Library!!</h1>
      <h3>A digital version of mobile libray from</h3>
      <h3>Bishwa Shahitto Kendra.</h3>
    </div>

    <div class="topnav">
      <a class="home" href="../index.php">Home</a>
      <a href="../photo/gallery_page.php">Gallery</a>
      <a href="../schedule/schedule_page.php">Schedule</a>
      <a href="https://www.google.com/maps/place/Computer+Science+and+Technology+Department/@24.3691865,88.6368115,19z/data=!4m13!1m7!3m6!1s0x39fbefa96a38d031:0x10f93a950ed6f410!2sRajshahi!3b1!8m2!3d24.3745146!4d88.604166!3m4!1s0x39fbf1ae9c3737c7:0xac8aa9d7a4eb8db0!8m2!3d24.3695806!4d88.6372293">Location</a>
      <div class="search-container">
        <form action="search_result_page.php" method="post">
          <input type="text" placeholder="Search by book or category.." name="search">
          <button class="src" type="submit"><i class="fa fa-search"></i></button>
          <button class="login" type="submit" formaction="../login/login_page.php">Log in / Sign up</button>
        </form>
      </div>
    </div>

    <div class="middle">
      <div class="sidebar">
        <p class="showing">Category</p>
        <form action="../category/category_result_page.php" method="post">
          <?php
            foreach ($resultCat as $row) {
              echo "<button type='submit' name='button' value=$row[bookCategory]>$row[bookCategory]</button>";
            }
          ?>
        </form>
      </div>
      <div class="content">
        <!-- <h2>Responsive Sidebar Example</h2>
        <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
        <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
        <h3>Resize the browser window to see the effect.</h3> -->
        <?php
        if ($result == null) {
            echo "Nothing found";
        }
        else {
          echo "<table border='1'>";
            echo "<tr>";
              // echo "<th>ID</th>";
              echo "<th>Book Name</th>";
              echo "<th>writer</th>";
              echo "<th>Publication</th>";
              echo "<th>Edition</th>";
              echo "<th>Category</th>";
              echo "<th>Availability</th>";
              echo "<th>Location</th>";
              // echo "<th>For Eng. Program</th>";
              // echo "<th>For Semester</th>";
              // echo "<th>price</th>";
            echo "</tr>";

            foreach ($result as $row) {
              echo "<tr>";
                // echo "<td>$row[bookID]</td>";
                echo "<td>$row[bookName]</td>";
                echo "<td>$row[bookWriter]</td>";
                echo "<td>$row[bookPublication]</td>";
                echo "<td>$row[bookEdition]</td>";
                echo "<td>$row[bookCategory]</td>";
                echo "<td>$row[bookAvailability]</td>";
                echo "<td>$row[bookLocation]</td>";
                // echo "<td>$row[bookForYear]</td>";
                // echo "<td>$row[bookForSemester]</td>";
                // echo "<td>$row[bookPrice]</td>";
              echo "</tr>";
            }
          echo "</table>";
        }
        ?>
      </div>
    </div>

    <div class="footer">
      <div class="about">
        <h3>About</h3>
        <p>This is a test project for the Seminar Library of Dept. of Computer Science and Engineering, University of Rajshahi. <br>
        All rights of this project are preserved to the authors. This was only created for the DBMS project.</p>
      </div>
      <div class="contact">
        <h3>Contact</h3>
        <p>To know more about us you can send mail as<br>
          <ul class="contactlist">
            <li>abc - abc@gmail.com</li>
            <li>abc - abc@gmail.com</li>
            <li>abc - abc@gmail.com</li>
            <li>abc - abc@gmail.com</li>
          </ul>
        </p>
      </div>
    </div>

  </body>
</html>
