<?php


	session_start();
    $name=$_SESSION['Account'];
    $password=$_SESSION['password'];
    $type=$_SESSION['type'];
	

	$stock_name=$_POST['stock_name'];
	$buy_type=$_POST['buy_type'];
	$quantity=$_POST['quantity'];


	$serverName = "(local)";
    $connectionInfo =  array("UID"=>"sa","PWD"=>"123456","Database"=>"mytest");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if($buy_type=="buy")
    {
    	$querystring="select * from mytest.dbo.[Stock] where Sname='$stock_name'";
        $query=sqlsrv_query($conn,$querystring);
        $row=sqlsrv_fetch_array($query);
        //var_dump($row);
        if($row!=null)
        {
        	$SID=$row['SID'];	
        	$price=$row['Price'];	//股票单价

        	$querystring="select * from mytest.dbo.[buysome] where SID=$SID and AID=$name";
        	$query=sqlsrv_query($conn,$querystring);
	        $row=sqlsrv_fetch_array($query);
	        //var_dump($row);
	        if($row!=null)
	        {
	        	$update_quantity=$quantity+$row['Quantity'];
	        	$querystring="select * from mytest.dbo.[Account] where  AID=$name";
        		$query=sqlsrv_query($conn,$querystring);
        		$Account_inf=sqlsrv_fetch_array($query);
        		if($quantity*$price<=$Account_inf['Balance'])
        		{
        			//echo $quantity."*".$price."<=".$Account_inf['Balance'];
        			$balance_update=$Account_inf['Balance']-$quantity*$price;
        			$querystring="update mytest.dbo.[Account] set Balance=$balance_update where AID=$name";
        			//var_dump($querystring);
        			$query=sqlsrv_query($conn,$querystring);
        			$querystring="update mytest.dbo.[buysome] set Quantity=$update_quantity where SID=$SID and AID=$name";
        			//var_dump($querystring);
        			$query=sqlsrv_query($conn,$querystring);
        			//Header("Location:http://localhost/database/login.php");
        		}
        		else
        			echo "your balance is not enough!";
	        }
	        else
	        {
	        	$update_quantity=$quantity;
	        	$querystring="select * from mytest.dbo.[Account] where  AID=$name";
        		$query=sqlsrv_query($conn,$querystring);
        		$Account_inf=sqlsrv_fetch_array($query);
        		if($quantity*$price<=$Account_inf['Balance'])
        		{
        			$time=time();
        			//echo $quantity."*".$price."<=".$Account_inf['Balance'];
        			$balance_update=$Account_inf['Balance']-$quantity*$price;
        			$querystring="update mytest.dbo.[Account] set Balance=$balance_update where AID=$name";
        			//var_dump($querystring);
        			$query=sqlsrv_query($conn,$querystring);
        			$querystring="insert into  mytest.dbo.[buysome] (AID,SID,BuyDate,Quantity) values ($name,$SID,null,$quantity)";
        			//var_dump($querystring);
        			$query=sqlsrv_query($conn,$querystring);
    
        		}
        		else
        			echo "your balance is not enough!";
	        }
        }
        else
        {
        	echo "the stock is not available!";
        }
    }
    else  		//sale
    {

    	$querystring="select * from mytest.dbo.[Stock] where Sname='$stock_name'";
        $query=sqlsrv_query($conn,$querystring);
        $row=sqlsrv_fetch_array($query);
        //var_dump($row);
        if($row!=null)
        {
        	$SID=$row['SID'];	
        	$price=$row['Price'];	//股票单价

        	$querystring="select * from mytest.dbo.[buysome] where SID=$SID and AID=$name";
        	$query=sqlsrv_query($conn,$querystring);
	        $row=sqlsrv_fetch_array($query);
	        //var_dump($row);
	        if($row!=null)
	        {
	        	$update_quantity=$row['Quantity']-$quantity;
	        	$querystring="select * from mytest.dbo.[Account] where  AID=$name";
        		$query=sqlsrv_query($conn,$querystring);
        		$Account_inf=sqlsrv_fetch_array($query);
        		if($update_quantity>=0)
        		{
        			//echo $quantity."*".$price."<=".$Account_inf['Balance'];
        			$balance_update=$Account_inf['Balance']+$quantity*$price;
        			$querystring="update mytest.dbo.[Account] set Balance=$balance_update where AID=$name";
        			//var_dump($querystring);
        			$query=sqlsrv_query($conn,$querystring);
        			$querystring="update mytest.dbo.[buysome] set Quantity=$update_quantity where SID=$SID and AID=$name";
        			//var_dump($querystring);
        			$query=sqlsrv_query($conn,$querystring);
        			//Header("Location:http://localhost/database/login.php");
        		}
        		else
        			echo "you haven't buy enough stock!";
	        }
	        else
	        	echo "you haven't buy this stock!";
        }
        else
        {
        	echo "the stock is not available!";
        }
    }





    sqlsrv_close( $conn);
    Header("Location:http://localhost/database/login.php");
?>