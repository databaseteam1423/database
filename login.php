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
      {
          printf("dsdsdsfsjfadhuivhffuisdhfi");
          header("location:stock.html");
      }
      else
      {
          echo "<script type='text/javascript'>alert('您输入的用户名和密码不正确');history.back();</script>";
      }
          
  }



  
  sqlsrv_close( $conn);
      }
  
?>
</body>
</html>

