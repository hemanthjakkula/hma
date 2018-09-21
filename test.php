

<?php
foreach ($_POST as $key => $value) {
    echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
}

$array = explode("-", $_POST["reservation"]);

echo "<br>";
for ($i=0; $i < count($array) ; $i++) { 
	${'var'.$i} = $array[$i];
}
echo "var0 is ".$var0;
echo "<br>";
echo "var1 is ".$var1;

?> 