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
        <p>User Name: <input type="text" name="userName" placeholder="Enter user name"></p>
        <p>Password: <input type="password" name="password" placeholder="Enter password"></p>
        <button type="submit" name="button">Sign in</button>
      </form>
      <br>
      <p>or, Already have an account? <a href="login_page.php">Log in</a></p>
    </div>

  </body>
</html>
