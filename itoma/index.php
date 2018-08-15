<?php
include_once('./php/db_conn.php');
include_once('./php/classes.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itoma uzduotis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Year made</th>
          <th scope="col">Model</th>
          <th scope="col">Status</th>
          <th scope="col">Manager name</th>
          <th scope="col">Previous manager name</th>
        </tr>
      </thead>
    <tbody>
    <?php
    $info = new info();
    $result = $info -> getTables();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>
          <tr>
            <td><?php echo($row['number'])?></td>
            <td><?php echo($row['year_made'])?></td>
            <td><?php echo($row['model'])?></td>
            <td><?php echo($row['status_name'])?></td>
            <td><?php echo($row['users_name']." (".$row['segments_name'].")")?></td>
            <td><?php echo($row['previous_manager']." (".$row['previous_manager_segment'].")")?></td>
          </tr>
    <?php
          }
        }
    ?>
    </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer></script>
  </body>
</html>
