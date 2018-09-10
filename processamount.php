<?php
require 'connect_db.php';

foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}
echo "-------------<br><br>";

echo "Using this data make update db and redirect to appropriate using header <br>";
echo "Example: header('Location: layout.php')";
mysqli_close($connect);
?>