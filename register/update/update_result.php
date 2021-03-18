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

        if ($bookID == null) {
          $value = "null";
        }
        // else if ($bookName == $bookWriter == $bookPublication == $bookEdition == $bookAvailability == $bookCategory == $bookLocation == $bookForYear == $bookForSemester == $bookPrice == null) {
        //   $value = "not right";
        // }
        else {
          $value = $conn->query("SELECT bookID FROM book WHERE bookID = '$bookID'")->rowCount();
          if ($value < 1){
            $value = "invalid";
          }
          else {
            if ($bookName != null) {
              $conn->query("UPDATE book SET bookName = '$bookName' WHERE bookID = '$bookID'");
            }
            if ($bookWriter != null) {
              $conn->query("UPDATE book SET bookWriter = '$bookWriter' WHERE bookID = '$bookID'");
            }
            if ($bookPublication != null) {
              $conn->query("UPDATE book SET bookPublication = '$bookPublication' WHERE bookID = '$bookID'");
            }
            if ($bookEdition != null) {
              $conn->query("UPDATE book SET bookEdition = '$bookEdition' WHERE bookID = '$bookID'");
            }
            if ($bookAvailability != null) {
              $conn->query("UPDATE book SET bookAvailability = '$bookAvailability' WHERE bookID = '$bookID'");
            }
            if ($bookCategory != null) {
              $conn->query("UPDATE book SET bookCategory = '$bookCategory' WHERE bookID = '$bookID'");
            }
            if ($bookLocation != null) {
              $conn->query("UPDATE book SET bookLocation = '$bookLocation' WHERE bookID = '$bookID'");
            }
            if ($bookForYear != null) {
              $conn->query("UPDATE book SET bookForYear = '$bookForYear' WHERE bookID = '$bookID'");
            }
            if ($bookForSemester != null) {
              $conn->query("UPDATE book SET bookForSemester = '$bookForSemester' WHERE bookID = '$bookID'");
            }
            if ($bookPrice != null) {
              $conn->query("UPDATE book SET bookPrice = $bookPrice WHERE bookID = '$bookID'");
            }
            $value = "ok";
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
          echo "<p>The Book ID did not match.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
        elseif ($value == "null") {
          echo "<h2>Sorry,</h2>";
          echo "<p>Book ID can not be empty.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
        elseif ($value == "ok") {
          echo "<h2>Successfully</h2>";
          echo "<p>The row has been updated to the Data Base.</p>";
          echo "<p>Please go back to <a href='../register_page.php'>home page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nothing updated.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
