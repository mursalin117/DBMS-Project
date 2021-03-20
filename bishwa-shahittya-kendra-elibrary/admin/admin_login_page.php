<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../css/login/login_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Log in Page (Admin)</h2>
      <hr>
      <p class="one">Welcome. Please log in to contune.</p>
      <br>
      <form action="admin_login_result.php" method="post">
        <p>Admin Name: <input type="text" name="userName" placeholder="Enter admin name"></p>
        <p>Password: <input type="password" name="password" placeholder="Enter admin password"></p>
        <button type="submit" name="button">Log in</button>
      </form>
      <br>
      <p>or, Log in as <a href="../login/login_page.php">user</a></p>
      <p>or, Don't have an account? <a href="../login/signup_page.php">Sign up</a> as user</p>
    </div>

  </body>
</html>
