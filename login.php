<html>
<head>
    <title></title>
</head>
<body>
<?php
  session_start();
  $name=$_SESSION['Account'];
  $password=$_SESSION['password'];
  $type=$_SESSION['type'];

  $serverName = "(local)";
  $connectionInfo =  array("UID"=>"sa","PWD"=>"123456","Database"=>"mytest");
  $conn = sqlsrv_connect( $serverName, $connectionInfo);
  if($type=="user")
  {
      $querystring="select * from mytest.dbo.Account where AID=$name";
      $query=sqlsrv_query($conn,$querystring);
      $row=sqlsrv_fetch_array($query);
      //var_dump($row);
      if(strcmp(rtrim($row['Key']), $password)==0)
      {
          $balance=$row['Balance'];
          //printf("dsdsdsfsjfadhuivhffuisdhfi");
          //header("location:stock.html");
          $querystring="select * from mytest.dbo.[Open] where AID=$name";
          //var_dump($querystring);
          $query=sqlsrv_query($conn,$querystring);
          //var_dump($query);
          $row=sqlsrv_fetch_array($query);
          $Account_CID=$row['CID'];
          $querystring="select * from mytest.dbo.[Client] where CID=$Account_CID";
          $query=sqlsrv_query($conn,$querystring);
          $row=sqlsrv_fetch_array($query);
          echo "Hello, ".$row['CName']."!<br/>";
          echo "Your balance is ".$balance.".<br/>";
          //echo '"Hello, $row['CName']!".<br />';
      }
      else
      {
          echo "<script type='text/javascript'>alert('您输入的用户名和密码不正确');history.back();</script>";
      }
          
  }
  else if($type=="administrator")
  {


  }



  
  sqlsrv_close( $conn);
  
?>

</td>
</body>
</html>

