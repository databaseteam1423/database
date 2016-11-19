<?php


	$name =$_POST['name'];
 	$password =$_POST['password'];
  	$type =$_POST['find'];
 	 //echo $name.'<br>';
  	session_start();
  	$_SESSION['Account']=$name;
  	$_SESSION['password']=$password;
 	$_SESSION['type']=$type;
	Header("Location:http://localhost/database/login.php");

	?>