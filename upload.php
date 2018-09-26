<?php
// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
?>

<?php 
if (isset($_FILES['fileupload'])) {
	# code...
	$fileupload = $_FILES['fileupload'];
	//getting properties of the file
	$fileupload_name = $fileupload['name'];
	$fileupload_tmp = $fileupload['tmp_name'];
	$fileupload_size = $fileupload['size'];
	$fileupload_error = $fileupload['error'];

	//extension validation
	$fileupload_ext = explode('.', $fileupload_name);
	$fileupload_ext = strtolower(end($fileupload_ext)); 

	$allowed = array('xlsx', 'xls');

	if(in_array($fileupload_ext, $allowed)) {
		if ($fileupload_error === 0) {
			# code...
			//$fileupload_name_new = uniqid('', true).'.'. $fileupload_ext;
			$fileupload_destination = 'uploads/' . $fileupload_name;
		
			if (move_uploaded_file($fileupload_tmp, $fileupload_destination)) {
				# code...
				echo $fileupload_destination;
				//header('location:mis_compare.php');
				echo "<br/>";
				echo "Successfully uploaded in uploads folder";
			}
		}
	}
}
?>