<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../../css/register/delete_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Delete Page</h2>
      <hr>
      <p class="one">This operation will delete an entire row of Data-Base.</p>
      <br>
      <form action="delete_result.php" method="post">
        <p>Book Code: <input type="text" name="bookCode" placeholder="Enter book code"></p>
        <p>Book Name: <input type="text" name="bookName" placeholder="Enter book name"></p>
        <button type="submit" name="button">Delete</button>
      </form>
    </div>

  </body>
</html>
