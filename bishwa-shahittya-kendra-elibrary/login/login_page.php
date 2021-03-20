<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../css/login/login_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Log in Page (User)</h2>
      <hr>
      <p class="one">Welcome. Please log in to contune.</p>
      <br>
      <form action="usr_login_result.php" method="post">
        <p>User Name: <input type="text" name="userName" placeholder="Enter user name"></p>
        <p>Password: <input type="password" name="password" placeholder="Enter password"></p>
        <button type="submit" name="button">Log in</button>
      </form>
      <br>
      <p>or, Log in as <a href="../admin/admin_login_page.php">admin</a></p>
      <p>or, Don't have an account? <a href="signup_page.php">Sign up</a></p>
    </div>

  </body>
</html>
