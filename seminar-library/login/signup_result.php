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
        include '../css/login/signup_result.css';
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

        $usrName = $_POST['userName'];
        $usrPass = $_POST['password'];

        $result = $conn->query("SELECT registerID FROM register WHERE registerName = '$usrName'")->rowCount();
        if ($result > 0) {
          $value = "same";
        }
        elseif ($usrName == null or $usrPass == null) {
          $value = "else";
        }
        else {
          $conn->query("INSERT INTO register(registerName, registerPassword)
          VALUE('$usrName', '$usrPass')");

          $result = $conn->query("SELECT registerID FROM register WHERE registerName = '$usrName' AND registerPassword = '$usrPass'")->rowCount();
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
