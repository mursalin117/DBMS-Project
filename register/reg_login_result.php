<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Weclome to Seminar Library, CSE, University of Rajshahi</title>
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

        $regName = $_POST['userName'];
        $regPass = $_POST['password'];


        if ($regName == null || $regPass == null) {
          $value = null;
        }
        else {
          $value = $conn->query("SELECT * FROM register WHERE registerName = '$regName' AND registerPassword = '$regPass'");

          if ($value->rowCount() < 1) {
            $value = null;
          }
        }

        if ($value == null || $regName != 'register') {
          header("Location: reg_login_page_unsuccessful.php");
          // die;
        }
        else {
          header("Location: register_page.php");
        }
      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
    ?>

  </body>
</html>
