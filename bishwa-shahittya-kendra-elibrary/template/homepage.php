<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seminar Library, CSE, RU</title>
    <style media="screen">
      <?php
       include 'mystyle.css';
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
        //echo "Connected successfully!<br>";

        $result = $conn->query("SELECT * FROM book");
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
      <a class="home" href="#home">Home</a>
      <a href="#about">About</a>
      <a href="#contact">Contact</a>
      <div class="search-container">
        <form action="/result_page.php">
          <input type="text" placeholder="Search by book or category.." name="search">
          <button class="src" type="submit">Search</button>
          <button class="login" type="submit" formaction="/login.php">Login/Register</button>
        </form>
      </div>
    </div>

    <div class="middle">
      <div class="sidebar">
        <p class="showing">Category</p>
        <a class="active" href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
      </div>
      <div class="content">
        <h2>Responsive Sidebar Example</h2>
        <p>This example use media queries to transform the sidebar to a top navigation bar when the screen size is 700px or less.</p>
        <p>We have also added a media query for screens that are 400px or less, which will vertically stack and center the navigation links.</p>
        <h3>Resize the browser window to see the effect.</h3>
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
