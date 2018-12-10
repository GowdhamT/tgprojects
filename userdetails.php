<?php
session_start();
//echo $_SESSION['user_id']
$userid=$_SESSION['user_id'];

$file_name='user_data.json';
$getFile=file_get_contents($file_name);
$fileData=json_decode($getFile,true);

foreach ($fileData as $key => $value1) {
	# code...
	foreach ($value1 as $key => $value) {
		# code...
		if($key=='mailid'&&$value==$userid)
		//print_r($value1);
			echo json_encode($value1);
			//echo ($key .':'.$value);
	}
}
?>