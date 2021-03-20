<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../../css/register/update_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Update Page</h2>
      <hr>
      <p class="one">This operation will update an existing row in Data-Base using the Book Code.</p>
      <br>
      <form action="update_result.php" method="post">
        <p>Book Code: <input type="text" name="bookCode" placeholder="Enter book code"></p>
        <p>Book Name: <input type="text" name="bookName" placeholder="Enter book name"></p>
        <p>Writer: <input type="text" name="bookWriter" placeholder="Enter writer name"></p>
        <p>Publication: <input type="text" name="bookPublication" placeholder="Enter publication name"></p>
        <p>Edition: <input type="text" name="bookEdition" placeholder="Enter book edition"></p>
        <p>Availability: <input type="text" name="bookAvailability" placeholder="Enter book availability"></p>
        <p>Category: <input type="text" name="bookCategory" placeholder="Enter book category"></p>
        <p>Location: <input type="text" name="bookLocation" placeholder="Enter book location"></p>
        <p>Price: <input type="text" name="bookPrice" placeholder="Enter book price"></p>
        <button type="submit" name="button">Update</button>
      </form>
    </div>

  </body>
</html>
