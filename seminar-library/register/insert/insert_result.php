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
        include '../../css/login/signup_result.css';
      ?>
    </style>
  </head>
  <body>

    <?php
      $servername = "localhost";
      $username = "register";
      $password = "12345";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=book-library-db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully!<br>";

        $bookID = $_POST['bookID'];
        $bookName = $_POST['bookName'];
        $bookWriter = $_POST['bookWriter'];
        $bookPublication = $_POST['bookPublication'];
        $bookEdition = $_POST['bookEdition'];
        $bookAvailability = $_POST['bookAvailability'];
        $bookCategory = $_POST['bookCategory'];
        $bookLocation = $_POST['bookLocation'];
        $bookForYear = $_POST['bookForYear'];
        $bookForSemester = $_POST['bookForSemester'];
        $bookPrice = floatval ($_POST['bookPrice']);

        if ($bookID == null || $bookName == null || $bookWriter == null || $bookPublication == null || $bookCategory == null) {
          $value = "invalid";
        }
        else {
          $value = $conn->query("SELECT bookID FROM book WHERE bookID = '$bookID'")->rowCount();
          if ($value > 0){
            $value = "same";
          }
          else {
            $conn->query("INSERT INTO book
            VALUE('$bookID',
              '$bookName',
              '$bookWriter',
              '$bookPublication',
              '$bookEdition',
              '$bookAvailability',
              '$bookCategory',
              '$bookLocation',
              '$bookForYear',
              '$bookForSemester',
              $bookPrice)");

            $value = $conn->query("SELECT bookID FROM book WHERE bookID = '$bookID'");
            if ($value->rowCount() > 0) {
              $value = "ok";
            }
            else {
              $value = "not inserted";
            }
          }
        }
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

    <div class="middle">
      <?php
        if ($value == "invalid") {
          echo "<h2>Invalid</h2>";
          echo "<p>All *field must be filled.</p>";
          echo "<p>Please <a href='insert_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
        elseif ($value == "same") {
          echo "<h2>Sorry,</h2>";
          echo "<p>Same Book ID found.</p>";
          echo "<p>Please <a href='insert_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
        elseif ($value == "ok") {
          echo "<h2>Successfully</h2>";
          echo "<p>A row has been added to the Data Base.</p>";
          echo "<p>Please go back to <a href='../register_page.php'>home page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nothing inserted.</p>";
          echo "<p>Please <a href='insert_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
