<?php 

$plate = isset($_POST['plate']) ? $_POST['plate']:"";
$brand = isset($_POST['brand']) ? $_POST['brand'] :"";
$model = isset($_POST['model']) ? $_POST['model']:"";
$year = isset($_POST['year']) ? $_POST['year']:0;
$color = isset($_POST['color']) ? $_POST['color']:"";
$price = isset($_POST['price']) ? $_POST['price']:1;
$image = isset($_POST['image']) ? $_POST['image']:"";

$mysqli = new mysqli("localhost", "root", "", "bd_stand_ze", 3306);
$statement = $mysqli->prepare("

       INSERT INTO cars VALUES (?, ?, ?, ?, ?, ?, ?)

   ");

$statement->bind_param("sssisis", $plate, $brand, $model, $year, $color, $price, $image);

$insertResult = $statement->execute();

if ($insertResult) {
    header('Location: ./showCars.php');
} else {
    echo ("Something went wrong...");
}

?>