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

        $usrName = $_POST['userName'];
        $bookCode = $_POST['bookCode'];
        $bookReturn = $_POST['info'];

        if ($bookCode == null || $usrName == null) {
          $value = "null";
        }
        else {
          $result = $conn->query("SELECT bookReturn FROM bookInfo WHERE bookCode = '$bookCode' AND usrName = '$usrName'");
          if ($result->rowCount() > 0) {
            $conn->query("UPDATE bookInfo SET bookReturn = '$bookReturn' WHERE bookCode = '$bookCode' AND usrName = '$usrName'");
            $value = "ok";
          }
          else {
            $value = "invalid";
          }
        }
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

    <div class="middle">
      <?php
        if ($value == "invalid") {
          echo "<h2>Invalid.</h2>";
          echo "<p>The Book Code or User Name did not match.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or back to <a href='user_info_page.php'>user info page</a></p>";
        }
        elseif ($value == "null") {
          echo "<h2>Sorry,</h2>";
          echo "<p>The Book Code and User Name can not be empty.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or back to <a href='user_info_page.php'>user info page</a></p>";
        }
        elseif ($value == "ok") {
          echo "<h2>Successfully</h2>";
          echo "<p>The row has been updated to the Data Base.</p>";
          echo "<p>Please go back to <a href='user_info_page.php'>user info page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nothing updated.</p>";
          echo "<p>Please <a href='update_page.php'>try again</a> or back to <a href='user_info_page.php'>user info page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
