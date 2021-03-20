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

        if ($bookCode == null || $bookName == null) {
          $value = "invalid";
        }
        else {
          $value = $conn->query("SELECT bookID FROM book WHERE bookCode = '$bookCode' and bookName = '$bookName'")->rowCount();
          if ($value > 0){
            $conn->query("DELETE FROM book WHERE bookCode = '$bookCode' AND bookName = '$bookName'");
            $result = $conn->query("SELECT bookID FROM book WHERE bookCode = '$bookCode'");
            if ($result->rowCount() > 0) {
              $value = "not deleted";
            }
            else {
              $value = "deleted";
            }
          }
          else {
            $value = "not found";
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
          echo "<p>Book Code or Book Name.</p>";
          echo "<p>Please <a href='delete_page.php'>try again</a> or <a href='../admin_page.php'>back to home page</a></p>";
        }
        elseif ($value == "not found") {
          echo "<h2>Sorry,</h2>";
          echo "<p>Book Code and Book Name not found.</p>";
          echo "<p>Please <a href='delete_page.php'>try again</a> or <a href='../admin_page.php'>back to home page</a></p>";
        }
        elseif ($value == "deleted") {
          echo "<h2>Successfully</h2>";
          echo "<p>The row has been deleted.</p>";
          echo "<p>Please go back to <a href='../admin_page.php'>home page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nothing deleted.</p>";
          echo "<p>Please <a href='delete_page.php'>try again</a> or <a href='../admin_page.php'>back to home page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
