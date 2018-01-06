<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit or add news</title>
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
    <script src="../libs/jQuery/jquery-3.2.1.min.js" defer></script>
    <script src="../libs/bootstrap/js/bootstrap.min.js" defer></script>

    </head>
  <body>
    <?php
    include_once ('database_functions.php');

     ?>
    <div class="container">

      <div style="display: flex; justify-content: center">
      <input type="button" style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(97, 161, 36)" onclick="location.href='admin.php';" value="Back to AdminSide" />
      </div>
      <br>
      <br>
      <form class="" action="upload_news.php" method="post">
          <table>
              <tr>
                  <th class="text-center"></th>
                  <th class="text-center">Id</th>
                  <th class="text-center">Date</th>
                  <th class="text-center">Title</th>
                  <th class="text-center">Article</th>
              </tr>
              <?php
              $result = getNews ($connection);
              while ($row = mysqli_fetch_array($result)){ ?>
              <tr>
                  <td ><input class="text-center" type="checkbox" name="checkedNews[]" value="<?php echo $row['id'] ?>"></td>
                  <td class="text-center" style="width: 20px; border: 1px solid #000"> <p><?php echo($row['id']) ?></p></td>
                  <td class="text-center" style="width: 100px; border: 1px solid #000"> <p><? echo($row['date']) ?></p></td>
                  <td class="" style="width: 300px; border: 1px solid #000"> <p><? echo($row['title']) ?></p></td>
                  <td class="" style="width: 1000px; border: 1px solid #000"> <p><? echo($row['content']) ?></p></td>
              </tr>
              <?php } ?>
          </table>
          <br>
          <button style="font-size: 20px; background-color: rgb(223, 76, 76)" type="submit" name="deleteSelectedNews">Delete <b>SELECTED</b> News</button>
      </form>
      <br>
      <br>
      <br>

      <div class="" style="padding: 20px; border: 1px solid #000; background-color: rgba(255, 252, 1, 0.57)">

      <form class="" action="upload_news.php" method="post">
        <input type="text" name="title" value="" placeholder="Add title">
        <br>
        <br>
        <textarea type="text" name="content" rows="8" cols="80" placeholder="Add your text here"></textarea>
        <br>
        <button style="font-size: 20px; background-color: rgb(6, 254, 141)" type="submit" name="sumbited_news">Send news to my newsfeed</button>
      </form>
    </div>









    </div>

  </body>
</html>
