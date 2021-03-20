<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="mystyle.css"> -->
    <title>e-Library</title>
    <style media="screen">
      <?php
        include '../../css/register/insert_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Insert Page</h2>
      <hr>
      <p class="one">This operation will insert a new row in Data-Base.</p>
      <br>
      <form action="insert_result.php" method="post">
        <p>Book Code*: <input type="text" name="bookCode" placeholder="Enter book code"></p>
        <p>Book Name*: <input type="text" name="bookName" placeholder="Enter book name"></p>
        <p>Writer*: <input type="text" name="bookWriter" placeholder="Enter writer name"></p>
        <p>Publication*: <input type="text" name="bookPublication" placeholder="Enter publication name"></p>
        <p>Edition: <input type="text" name="bookEdition" placeholder="Enter book edition"></p>
        <p>Availability: <input type="text" name="bookAvailability" placeholder="Enter book availability"></p>
        <p>Category*: <input type="text" name="bookCategory" placeholder="Enter book category"></p>
        <p>Location: <input type="text" name="bookLocation" placeholder="Enter book location"></p>
        <p>Price: <input type="text" name="bookPrice" placeholder="Enter book price"></p>
        <button type="submit" name="button">Insert</button>
      </form>
      <p>* field cannot be empty.</p>
    </div>

  </body>
</html>
