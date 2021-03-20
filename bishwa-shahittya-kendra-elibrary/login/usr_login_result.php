<?php
  // Start the session
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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
        $usrPass = $_POST['password'];
        // echo "$usrName and $usrPass";

        if ($usrName == null || $usrPass == null) {
          $value = null;
          // echo "null value";
        }
        else {
          $value = $conn->query("SELECT * FROM usr WHERE usrName = '$usrName' AND usrPassword = '$usrPass'");

          if ($value->rowCount() < 1) {
            $value = null;
            // echo "khuje pay nai";
          }
          else {
            $value = "ok";
            $_SESSION['userName'] = $usrName;
            // echo "milla gechhe...";
          }
        }

        if ($value == null) {
          header("Location: usr_login_page_unsuccessful.php");
          // die;
        }
        elseif ($value == "ok") {
          header("Location: ../user/usr_index.php");
        }
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

  </body>
</html>
