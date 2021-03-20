<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../../css/login/signup_result.css';
      ?>
    </style>
  </head>
  <body>

    <?php
      $servername = "localhost";
      $username = "admin";
      $password = "12345";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=elibrary", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully!<br>";

        $bookCode = $_POST['bookCode'];
        $bookName = $_POST['bookName'];
        $bookWriter = $_POST['bookWriter'];
        $bookPublication = $_POST['bookPublication'];
        $bookEdition = $_POST['bookEdition'];
        $bookAvailability = $_POST['bookAvailability'];
        $bookCategory = $_POST['bookCategory'];
        $bookLocation = $_POST['bookLocation'];
        $bookPrice = floatval ($_POST['bookPrice']);

        if ($bookCode == null) {
          $value = "null";
        }
        else if ($bookName == null && $bookWriter == null && $bookPublication == null && $bookEdition == null && $bookAvailability == null && $bookCategory == null && $bookLocation == null && $bookPrice == null) {
          $value = "not right";
        }
        else {
          $value = $conn->query("SELECT bookID FROM book WHERE bookCode = '$bookCode'")->rowCount();
          if ($value < 1){
            $value = "invalid";
          }
          else {
            if ($bookName != null) {
              $conn->query("UPDATE book SET bookName = '$bookName' WHERE bookCode = '$bookCode'");
            }
            if ($bookWriter != null) {
              $conn->query("UPDATE book SET bookWriter = '$bookWriter' WHERE bookCode = '$bookCode'");
            }
            if ($bookPublication != null) {
              $conn->query("UPDATE book SET bookPublication = '$bookPublication' WHERE bookCode = '$bookCode'");
            }
            if ($bookEdition != null) {
              $conn->query("UPDATE book SET bookEdition = '$bookEdition' WHERE bookCode = '$bookCode'");
            }
            if ($bookAvailability != null) {
              $conn->query("UPDATE book SET bookAvailability = '$bookAvailability' WHERE bookCode = '$bookCode'");
            }
            if ($bookCategory != null) {
              $conn->query("UPDATE book SET bookCategory = '$bookCategory' WHERE bookCode = '$bookCode'");
            }
            if ($bookLocation != null) {
              $conn->query("UPDATE book SET bookLocation = '$bookLocation' WHERE bookCode = '$bookCode'");
            }
            if ($bookPrice != null) {
              $conn->query("UPDATE book SET bookPrice = $bookPrice WHERE bookCode = '$bookCode'");
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
          echo "<p>The Book Code did not match.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or <a href='../admin_page.php'>back to home page</a></p>";
        }
        elseif ($value == "null") {
          echo "<h2>Sorry,</h2>";
          echo "<p>Book Code can not be empty.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or <a href='../admin_page.php'>back to home page</a></p>";
        }
        elseif ($value == "ok") {
          echo "<h2>Successfully</h2>";
          echo "<p>The row has been updated to the Data Base.</p>";
          echo "<p>Please go back to <a href='../admin_page.php'>home page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nothing updated.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or <a href='../admin_page.php'>back to home page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
