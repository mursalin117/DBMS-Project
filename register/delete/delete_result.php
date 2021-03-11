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

        if ($bookID == null || $bookName == null) {
          $value = "invalid";
        }
        else {
          $value = $conn->query("SELECT bookID FROM book WHERE bookID = '$bookID' and bookName = '$bookName'")->rowCount();
          if ($value > 0){
            $value = "found";
            $conn->query("DELETE FROM book WHERE bookID = '$bookID' AND bookName = '$bookName'");
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
          echo "<p>Book ID or Book Name.</p>";
          echo "<p>Please <a href='delete_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
        elseif ($value == "not found") {
          echo "<h2>Sorry,</h2>";
          echo "<p>Book ID and Book Name not found.</p>";
          echo "<p>Please <a href='delete_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
        elseif ($value == "found") {
          echo "<h2>Successfully</h2>";
          echo "<p>The row has been deleted.</p>";
          echo "<p>Please go back to <a href='../register_page.php'>home page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong.</p>";
          echo "<p>Please <a href='delete_page.php'>try again</a> or <a href='../register_page.php'>back to home page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
