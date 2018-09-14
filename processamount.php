<?php
require 'connect_db.php';

foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}
 $query = "SELECT amount_given FROM amount_details WHERE userid = '$key' ";
    $qwerty = "SELECT balance_amount FROM amount_details WHERE userid = '$key' ";
    $result = mysqli_query($connect, $query);
    mysqli_query($connect, $qwerty);
    while ($row = $result->fetch_assoc()) {
                    echo $row['amount_given']."<br>";
                    }
    $e = (int)$query;
    $f = (int)$qwerty;
    $g = (int)$key;
    $h = (int)$value;
    $a = $e + $h;
    $b = $f - $h;
    echo $a;
    $i = (int)$a;
    $j = (int)$b;
    $c = "UPDATE amount_details SET amount_given = '$i' WHERE userid = '$key' ";
    $d = "UPDATE amount_details SET amount_given = '$j' WHERE userid = '$key' ";
    mysqli_query($connect, $c);
    mysqli_query($connect, $d);
echo "-------------<br><br>";

//echo "Using this data make update db and redirect to appropriate using header <br>";
//echo "Example: header('Location: layout.php')";
mysqli_close($connect);
?>