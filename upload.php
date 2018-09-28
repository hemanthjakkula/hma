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