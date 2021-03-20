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

        if ($bookCode == null || $usrName == null || $bookReturn == null) {
          $value = "invalid";
        }
        else {
          $result = $conn->query("SELECT bookID FROM book WHERE bookCode = '$bookCode'")->rowCount();
          if ($result > 0){
            $result = $conn->query("SELECT usrID FROM usr WHERE usrName = '$usrName'")->rowCount();
            if ($result > 0) {
              $conn->query("INSERT INTO bookInfo(usrName, bookCode, bookReturn)
              VALUE('$usrName', '$bookCode', '$bookReturn')");
              $result = $conn->query("SELECT infoID FROM bookInfo WHERE bookCode = '$bookCode' AND usrName = '$usrName'")->rowCount();
              if ($result > 0) {
                $value = "ok";
              }
              else {
                $value = "something wrong";
              }
            }
            else {
              $value = "no user";
            }
          }
          else {
            $value = "no book";
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
          echo "<p>Please <a href='insert_page.php'>try again</a> or back to <a href='user_info_page.php'>user info page</a></p>";
        }
        elseif ($value == "no user") {
          echo "<h2>Sorry,</h2>";
          echo "<p>No user name found.</p>";
          echo "<p>Please <a href='insert_page.php'>try again</a> or back to <a href='user_info_page.php'>user info page</a></p>";
        }
        elseif ($value == "no book") {
          echo "<h2>Sorry,</h2>";
          echo "<p>No book found.</p>";
          echo "<p>Please <a href='insert_page.php'>try again</a> or back to<a href='user_info_page.php'>user info page</a></p>";
        }
        elseif ($value == "ok") {
          echo "<h2>Successfully</h2>";
          echo "<p>A row has been added to the Data Base.</p>";
          echo "<p>Please go back to <a href='user_info_page.php'>user info page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nothing inserted.</p>";
          echo "<p>Please <a href='insert_page.php'>try again</a> or back to<a href='user_info_page.php'>user info page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
