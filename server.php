<!-- 

$connect = mysqli_connect("localhost", "root", "6325", "hma");

//logic after submit button is clicked
if (isset($_POST['submit'])) {
	$name = $_POST['inputName'];
	$email = $_POST['inputEmail'];
	$referee_name = $_POST['inputReferee_name'];
	$referee_mobile = $_POST['inputReferee_mobile'];
	$password = $_POST['password'];
	$joining_date = $_POST['inputJoiningdate'];
	$experience = $_POST['inputExperience'];
	$advance_amount = $_POST['inputAdvanceamount'];
	$address = $_POST['inputAddress'];

	$query = "INSERT INTO user_details (name, email, referee_name, referee_mobile, password, joining_date, experience, advance_amount, address) VALUES ('$inputName', '$inputEmail', '$inputReferee_name', '$inputReferee_mobile', '$password', '$inputJoiningdate', '$inputExperience', '$inputAdvanceamount', '$inputAddress')";

	mysqli_query($connect, $query);
	header('location: addprofile.php'); //redirect to addprofile page after inserting
}

 -->

 <?php

$connect = mysqli_connect("localhost", "root", "6325", "hma");

 if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$referee_name = $_POST['referee_name'];
	$referee_mobile = $_POST['referee_mobile'];
	$password = $_POST['password'];
	$joining_date = $_POST['joining_date'];
	$experience = $_POST['experience'];
	$advance_amount = $_POST['advance_amount'];
	$address = $_POST['address'];

	//conversion of date
	//$converted_date = new DateTime($joining_date);
	//$converted_date->format('Y-m-d');

	$query = "INSERT INTO user_details (name, email, referee_name, referee_mobile, password, joining_date, experience, advance_amount, address) VALUES ('$name', '$email', '$referee_name', '$referee_mobile', '$password', '$joining_date', '$experience', '$advance_amount', '$address')";

	mysqli_query($connect, $query);
	header('location: addprofile.php'); //redirect to addprofile page after inserting
}
mysqli_close($connect);

 ?>