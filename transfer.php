<?php


	$transfer_name =$_POST['transfer_name'];
 	$transfer_ammount =$_POST['transfer_ammount'];

  	session_start();
  	$name=$_SESSION['Account'];
  	$password=$_SESSION['password'];
 	$type=$_SESSION['type'];

	$serverName = "(local)";
	$connectionInfo =  array("UID"=>"sa","PWD"=>"123456","Database"=>"mytest");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	$querystring="select * from mytest.dbo.Account where AID=$transfer_name";
    $query=sqlsrv_query($conn,$querystring);
    $transfer_row=sqlsrv_fetch_array($query);
    if($transfer_row==null)
    {
    	
    	echo "<script type='text/javascript'>alert('your transfer account does not exist!');</script>";
    	echo '<script>window.location.href = "http://localhost/database/login.php";</script>';
    	
    }
    else
    {
    	$querystring="select * from mytest.dbo.Account where AID=$name";
    	$query=sqlsrv_query($conn,$querystring);
    	$row=sqlsrv_fetch_array($query);
    	if($row['Balance']<$transfer_ammount)
    	{
    		echo "<script type='text/javascript'>alert('you do not have enough balance!');</script>";
    		echo '<script>window.location.href = "http://localhost/database/login.php";</script>';
    	}
    	else
    	{
    		$up=$transfer_row['Balance']+$transfer_ammount;
    		$querystring="update mytest.dbo.Account set Balance=$up where AID=$transfer_name";
    		//var_dump($querystring);
    		$query=sqlsrv_query($conn,$querystring);
    		$up=$row['Balance']-$transfer_ammount;
    		$querystring="update mytest.dbo.Account set Balance=$up where AID=$name";
    		//var_dump($querystring);
    		$query=sqlsrv_query($conn,$querystring);
    		echo "<script type='text/javascript'>alert('trasfer succeed!');</script>";
    		echo '<script>window.location.href = "http://localhost/database/login.php";</script>';
    	}
    }
	?>