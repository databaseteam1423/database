
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
          echo '
<html>
<head>
  <meta charset="utf-8">
  <title>股票页面</title>
  <style type="text/css">
  thstyle{width:200px; height:40px;}
  </style>
</head>

<body>
  <h3 style="text-align:center"> This is a stock html</h3>
    <a href="login.html"><input style="float:right" type="button" value="登出"></a>
    <br><br>
    <form action="http://localhost/database/trade.php" method="post">
    <table align="center">
  <tr><td width="300px"><h3 style="color:#CC00CC">用户名</td>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
  
    <td width="300px"><h3 style="color:#CC00CC"/>账户余额</td>

    <tr><td>';

          echo $row['CName'];
          echo '</td><td>';
          echo $balance;
          echo '</table>
    <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <p style="margin-left:1000px"/><a href="transfer.html"><input type="button" value="转账"/></a></p>
    <table align="center" border="3" class="thstyle">
        <tr>
            <td>请输入操作股票名称</td>
            <td>选择您要做的操作</td>
            <td>请输入数量</td>
            <td></td>
        </tr>
        <tr>
            <td ><input type="text" name="stock_name" size="20"></td>
            <td ><select box-sizing="border-box" name="buy_type">
                <option  value="buy">购买</option>
                <option  value="sell">出售</option></select></td>
            <td ><input type="number" name="quantity" size="20"></td> 
            <td class="tdstyle"><input type="submit" value="确定"/></a></td> 

        </tr>
    </table>';
          echo '</table>
    <br><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br> <table align="center" border="1" class="thstyle">
      <thead>
        <tr>
          <th width="100px">股票名称</th>
          <th width="100px">现有股份额数</th>
          <th width="100px">股票单价</th>
          <th width="100px">股票利润</th>
        </tr>
      </thead>
      <tbody>';
      
          //echo "Your balance is ".$balance.".<br/>";
          $querystring="select * from mytest.dbo.[buysome] where AID=$name";
          $query=sqlsrv_query($conn,$querystring);
          $number=1;
          while($row=sqlsrv_fetch_array($query))
          {
              $SID=$row['SID'];
              $quantity=$row['Quantity'];
              $querystr="select * from mytest.dbo.[Stock] where SID=$SID";
              $Stockquery=sqlsrv_query($conn,$querystr);
              $Stockinf=sqlsrv_fetch_array($Stockquery);
              $Stock_name=$Stockinf['Sname'];
              //echo iconv("GB2312","UTF-8",$Stock_name);
              //echo "    ".$Stockinf['Price']."    ".$Stockinf['Benefit']."    ".$Stockinf['Price']."    ".$quantity."<br/>";
              echo '<tr>
              <td>';
              echo iconv("GB2312","UTF-8",$Stock_name);
              echo '</td>
              <td>'.$quantity.'</td>
              <td>'.$Stockinf['Price'].'</td>
              <td>'.$Stockinf['Benefit'].'</td>
              </tr>
              <br><br><br>';
              $number++;
          }





          echo '</tbody>

          </table>


          <p>
          <h4 style="text-align:center; bottom:0px "/>时间&nbsp;&nbsp;&nbsp;
          <div id="名称" style="text-align:center"> 
          <script language=Javascript> 
          var now=new Date() ;
          document.write(1900+now.getYear()+"-"+(now.getMonth()+1)+"-"+now.getDate()+" ") ;
          </script> 
          </div> </p>
          </body>
          </html>';
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



