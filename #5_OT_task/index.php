<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orca Team Task</title>
  <link rel="stylesheet" href="./libs/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css?v=1.0">
</head>

<body>
  <div class="container">
    <!-- Form starts -->
    <div class="p-5 main_comment_form">
    </div>
    <!-- Comments count -->
    <div class="pl-5 pr-5">
      <span class="h3" id="number_of_comments"></span>
      <span class="h3"> Comments</span>
    </div>
    <!-- Comments and replies-->
    <div class="row pl-5 pr-5">
      <div class="col-sm-12" id="comments">
        <?php
        include_once ('./php/comments.php');
        ?>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="./libs/jQuery/jquery-3.2.1.min.js" defer></script>
  <script type="text/javascript" src="./libs/bootstrap/js/bootstrap.min.js" defer></script>
  <script type="text/javascript" src="./js/html_elements.js" defer></script>
  <script type="text/javascript" src="./js/functions.js" defer></script>
  <script type="text/javascript" src="./js/script.js" defer></script>
</body>

</html>
