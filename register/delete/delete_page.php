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
        <p>Book ID: <input type="text" name="bookID" placeholder="Enter book id"></p>
        <p>Book Name: <input type="text" name="bookName" placeholder="Enter book name"></p>
        <button type="submit" name="button">Delete</button>
      </form>
    </div>

  </body>
</html>
