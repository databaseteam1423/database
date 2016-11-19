<html>
<head>
    <title></title>
</head>
<body>

<?php
  $name =$_POST['name'];
  $password =$_POST['password'];
  $type =$_POST['find'];
  $serverName = "(local)";
  $connectionInfo =  array("UID"=>"sa","PWD"=>"123456","Database"=>"mytest");
  $conn = sqlsrv_connect( $serverName, $connectionInfo);
  if($type=="user")
  {
      $querystring="select * from mytest.dbo.Account where AID=$name;";
      $query=sqlsrv_query($conn,$querystring);
      $row=sqlsrv_fetch_array($query);
      if(strcmp(rtrim($row['Key']), $password)==0)
          echo "Your password is correct!";
      else 
          echo "Your password is not correct!";
          
  }



  
  





  
  sqlsrv_close( $conn);
  
?>
</body>
</html>

