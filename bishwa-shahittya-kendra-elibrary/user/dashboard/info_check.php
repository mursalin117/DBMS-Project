<?php
  // start the session
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>

    <?php
      $value = $_POST['button'];
      if ($value == '1') {
        header("Location: info_result.php");
        $_SESSION['info'] = "Returned";
      }
      else {
        header("Location: info_result.php");
        $_SESSION['info'] = "Not Returned";
      }
    ?>

  </body>
</html>
