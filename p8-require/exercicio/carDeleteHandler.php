<?php
$plate = isset($_GET["id"]) ? $_GET["id"] : "";

$mysqli = new mysqli("127.0.0.1", "root", "", "bd_stand_ze", 3306);
$statement = $mysqli->prepare("

       DELETE FROM cars WHERE plate = ?

   ");

$statement->bind_param("s", $plate);

$deleteResult = $statement->execute();

if ($deleteResult) {
    header('Location: ./showCars.php');
} else {
    echo ("Something went wrong...");
}