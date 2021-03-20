<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  </head>
  <body>

    <?php
      $value = $_POST['button'];
      if ($value == '1') {
        header("Location: insert_page.php");
      }
      else {
        header("Location: update_page.php");
      }
    ?>

  </body>
</html>
