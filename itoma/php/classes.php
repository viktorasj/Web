<?php
class info extends dbh {
  public function getTables () {
    $sql = "SELECT cars.number,
                   cars.year_made,
                   cars.model,
                   statuses.name as status_name,
                   segments.name as segments_name,
                   users.name as users_name,
                   (SELECT name FROM users WHERE id = (SELECT user_id FROM car_management k1 WHERE car_management.date_from = k1.date_to)) AS previous_manager,
                   (SELECT name FROM segments WHERE id = (SELECT user_id FROM car_management k1 WHERE car_management.date_from = k1.date_to)) AS previous_manager_segment
            FROM cars
            LEFT JOIN  car_status ON cars.id = car_status.cars_id
            INNER JOIN  statuses ON car_status.status_id = statuses.id
            INNER JOIN  car_management ON cars.id = car_management.cars_id AND car_management.date_to = '0000-00-00'
            INNER JOIN segments ON car_management.segments_id = segments.id
            INNER JOIN users ON car_management.user_id = users.id
            ";
    $result = $this->connect()->query($sql);
    return $result;
    mysqli_close(connect());
  }
}
?>
