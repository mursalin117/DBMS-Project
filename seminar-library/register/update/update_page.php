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
        include '../../css/register/update_page.css';
      ?>
    </style>
  </head>
  <body>

    <div class="middle">
      <h2>Update Page</h2>
      <hr>
      <p class="one">This operation will update an existing row in Data-Base using the Book ID.</p>
      <br>
      <form action="update_result.php" method="post">
        <p>Book ID: <input type="text" name="bookID" placeholder="Enter book id"></p>
        <p>Book Name: <input type="text" name="bookName" placeholder="Enter book name"></p>
        <p>Writer: <input type="text" name="bookWriter" placeholder="Enter book id"></p>
        <p>Publication: <input type="text" name="bookPublication" placeholder="Enter book name"></p>
        <p>Edition: <input type="text" name="bookEdition" placeholder="Enter book id"></p>
        <p>Availability: <input type="text" name="bookAvailability" placeholder="Enter book name"></p>
        <p>Category: <input type="text" name="bookCategory" placeholder="Enter book id"></p>
        <p>Location: <input type="text" name="bookLocation" placeholder="Enter book name"></p>
        <p>Year: <input type="text" name="bookForYear" placeholder="Enter book id"></p>
        <p>Semester: <input type="text" name="bookForSemester" placeholder="Enter book name"></p>
        <p>Price: <input type="text" name="bookPrice" placeholder="Enter book id"></p>
        <button type="submit" name="button">Update</button>
      </form>
    </div>

  </body>
</html>
