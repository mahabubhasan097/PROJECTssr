<?php

session_start();

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con, 'obe');

$email = $_POST['formGroupEmail'];
$pass = sha1($_POST['formGroupPassword']);

$s = "SELECT * FROM user where email = '$email' && password = '$pass' ";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num == 1){
	header('location:dashboard.php');
} else{
	header('location:log-in.php');
	echo "<script>
          alert('Wrong email and password combination!');
		  </script>";
}

?>