<html>
<head>
    <title></title>
</head>
<body>

<?php
  $name =$_POST['name'];
  $password =$_POST['password'];
  $type =$_POST['find'];
  //echo $name.'<br />';
  //echo $password.'<br />';
  //echo $type.'<br />';
  //phpinfo();
  
  $serverName = "(local)";
  $connectionInfo =  array("UID"=>"sa","PWD"=>"123456","Database"=>"mytest");
  $conn = sqlsrv_connect( $serverName, $connectionInfo);
  if( $conn ){
      //echo "Connection established.".'<br/>';
  }else{
      echo "Connection could not be established.\n";
      die( var_dump(sqlsrv_errors()));
  }


  
  
  if($name=="0")
  {
    printf("dsdsdsfsjfadhuivhffuisdhfi");
    header("location:stock.html");

  }
  else
  {
    echo "<script type='text/javascript'>alert('您输入的用户名和密码不正确');history.back();</script>";
  }
    
  /*
  $query=sqlsrv_query($conn,"select * from mytest.dbo.J");
  while($row=sqlsrv_fetch_array($query))
  {
      echo $row['JNO'].'<br />';
  }
  sqlsrv_close( $conn);
  */
?>
</body>
</html>

