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
      <h2>Insert Page for User Info</h2>
      <hr>
      <p class="one">This operation will insert a new row in Data-Base.</p>
      <br>
      <form action="insert_result.php" method="post">
        <p>User Name*: <input type="text" name="userName" placeholder="Enter user name"></p>
        <p>Book Code*: <input type="text" name="bookCode" placeholder="Enter book code"></p>
        <p>Book Info*:
          <select name="info">
            <option value="Not returned">Not returned</option>
            <option value="Returned">returned</option>
          </select>
        </p>
        <button type="submit" name="button">Insert</button>
      </form>
      <p>* field cannot be empty.</p>
    </div>

  </body>
</html>
