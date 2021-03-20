<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
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

        $adminName = $_POST['userName'];
        $adminPass = $_POST['password'];


        if ($adminName == null || $adminPass == null) {
          $value = null;
        }
        else {
          $value = $conn->query("SELECT * FROM admin WHERE adminName = '$adminName' AND adminPassword = '$adminPass'");

          if ($value->rowCount() > 0) {
            $value = ok;
          }
          else {
            $value = null;
          }
        }

        if ($value == null) {
          header("Location: admin_login_page_unsuccessful.php");
          // die;
        }
        else {
          header("Location: admin_page.php");
        }
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

  </body>
</html>
