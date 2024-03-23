<?php
$pagename =  basename($_SERVER["PHP_SELF"]);

$menu = [
    "showCars.php" => "Homepage",
    "carAddForm.php" => "Add Car",
    "contacts.php" => "Contacts",
    "aboutus.php" => "About us",
]

?>

<header>
    <nav>
        <?php
        foreach ($menu as $key => $value) {
            if ($key == $pagename) {
                echo "<a href='$key' class='activeLink'>$value</a> | ";
            } else {
                echo "<a href='$key'>$value</a> | ";
            }
        }
        ?>
    </nav>
</header>