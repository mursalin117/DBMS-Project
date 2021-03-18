<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Weclome to Seminar Library, CSE, University of Rajshahi</title>
    <style media="screen">
      <?php
        include '../../css/mystyle.css';
      ?>
    </style>
  </head>
  <body>

    <?php
      $servername = "localhost";
      $username = "anonymous";
      $password = "123";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=book-library-db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully!<br>";


        $value = $_POST['button'];
        if ($value == "1") {
          echo "1y1s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-I' AND bookForSemester = 'Odd'");
        }
        else if ($value == "2") {
          echo "1y2s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-I' AND bookForSemester = 'Even'");
        }
        else if ($value == "3") {
          echo "2y1s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-II' AND bookForSemester = 'Odd'");
        }
        else if ($value == "4") {
          echo "2y2s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-II' AND bookForSemester = 'Even'");
        }
        else if ($value == "5") {
          echo "3y1s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-III' AND bookForSemester = 'Odd'");
        }
        else if ($value == "6") {
          echo "3y2s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-III' AND bookForSemester = 'Even'");
        }
        else if ($value == "7") {
          echo "4y1s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-IV' AND bookForSemester = 'Odd'");
        }
        else {
          echo "4y2s<br>";
          $result = $conn->query("SELECT bookName, bookWriter, bookPublication, bookEdition, bookCategory, bookAvailability, bookLocation
            FROM book
            WHERE bookForYear = 'Part-IV' AND bookForSemester = 'Even'");
        }

        if ($result->rowCount() < 1) {
          $result = null;
        }

        $resultCat = $conn->query("SELECT bookCategory FROM book GROUP BY bookCategory");
        $conn = null;

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

    <div class="header">
      <h1>Welcome to the Seminar Library!!</h1>
      <h3>Dept. of Computer Science and Engineering,</h3>
      <h3>University of Rajshahi.</h3>
    </div>

    <div class="topnav">
      <a class="home" href="../usr_index.php">Home</a>
      <a href="yearly_book_page.php">Yearly Book</a>
      <a href="../photo/gallery_page.php">Gallery</a>
      <a href="https://www.google.com/maps/place/Computer+Science+and+Technology+Department/@24.3691865,88.6368115,19z/data=!4m13!1m7!3m6!1s0x39fbefa96a38d031:0x10f93a950ed6f410!2sRajshahi!3b1!8m2!3d24.3745146!4d88.604166!3m4!1s0x39fbf1ae9c3737c7:0xac8aa9d7a4eb8db0!8m2!3d24.3695806!4d88.6372293">Map</a>
      <div class="search-container">
        <form action="../search/search_result_page.php" method="post">
          <input type="text" placeholder="Search by book or category.." name="search">
          <button class="src" type="submit"><i class="fa fa-search"></i></button>
          <button class="login" type="submit" formaction="../../index.php">Log out</button>
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
        <h2>Responsive Sidebar Example</h2>
        <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
        <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
        <h3>Resize the browser window to see the effect.</h3>
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
