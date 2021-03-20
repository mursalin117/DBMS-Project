<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../css/login/signup_result.css';
      ?>
    </style>
  </head>
  <body>

    <?php
      $servername = "localhost";
      $username = "usr";
      $password = "1234";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=elibrary", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully!<br>";

        $usrName = $_POST['userName'];
        $usrEmail = $_POST['userEmail'];
        $usrPass = $_POST['password'];

        $result = $conn->query("SELECT usrID FROM usr WHERE usrName = '$usrName'")->rowCount();
        if ($result > 0) {
          $value = "same";
        }
        elseif ($usrName == null or $usrPass == null or $usrEmail == null) {
          $value = "else";
        }
        else {
          $conn->query("INSERT INTO usr(usrName, usrEmail, usrPassword)
          VALUE('$usrName', '$usrEmail', '$usrPass')");

          $result = $conn->query("SELECT usrID FROM usr WHERE usrName = '$usrName' AND usrPassword = '$usrPass'")->rowCount();
          if ($result < 1) {
            $value = "not saved";
          }
          else {
            $value = "ok";
          }
        }
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

    <div class="middle">
      <?php
        if ($value == "same") {
          echo "<h2>Sorry,</h2>";
          echo "<p>User name matched.</p>";
          echo "<p>Please <a href='signup_page.php'>try again</a> or <a href='../index.php'>back to home page</a></p>";
        }
        elseif ($value == "else") {
          echo "<h2>Invalid</h2>";
          echo "<p>user name or password.</p>";
          echo "<p>Please <a href='signup_page.php'>sign up</a> or <a href='../index.php'>back to home page</a></p>";
        }
        elseif ($value == "not saved") {
          echo "<h2>Sorry,</h2>";
          echo "<p>Your data is not saved.</p>";
          echo "<p>Please <a href='signup_page.php'>try again</a> or <a href='../index.php'>back to home page</a></p>";
        }
        elseif ($value == "ok") {
          echo "<h2>Successfully,</h2>";
          echo "<p>You haved signed up.</p>";
          echo "<p>Please <a href='login_page.php'>log in</a> or <a href='../index.php'>back to home page</a></p>";
        }
        else {
          echo "<h2>Sorry,</h2>";
          echo "<p>Something went wrong. Nohting saved.</p>";
          echo "<p>Please <a href='signup_page.php'>sign up</a> or <a href='login_page.php'>log in</a> or <a href='../index.php'>back to home page</a></p>";
        }
      ?>
    </div>

  </body>
</html>
