<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../css/login/signup_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Sign up Page (User)</h2>
      <hr>
      <p class="one">Welcome. Please sign up to contune.</p>
      <br>
      <form action="signup_result.php" method="post">
        <p>User Name: <input type="text" name="userName" placeholder="Enter your name"></p>
        <p>User Email: <input type="text" name="userEmail" placeholder="Enter your email"></p>
        <p>Password: <input type="password" name="password" placeholder="Enter your password"></p>
        <button type="submit" name="button">Sign in</button>
      </form>
      <br>
      <p>or, Already have an account? <a href="login_page.php">Log in</a></p>
    </div>

  </body>
</html>
