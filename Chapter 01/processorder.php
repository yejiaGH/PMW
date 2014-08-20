<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php
  //$tireqty = $_POST['tireqty'];
  //$oilqty = $_POST['oilqty'];
  //$sparkqty = $_POST['sparkqty'];
  echo 'isset($tireqty): '.isset($tireqty).'<br/>'; //测试变量状态isset()
  echo 'isset($nothere): '.isset($nothere).'<br/>';
  echo 'empty($tireqty): '.empty($tireqty).'<br/>'; //测试变量状态empty()
  echo 'empty($nothere): '.empty($nothere).'<br/>';
  echo '<p>Order processed at ';
  echo date('H:i, jS F'); //the Date function by PHP return like: 08:12, 20th August
  echo '</p>';
  echo '<p>Your order is as follows: </p>';
  echo $tireqty.' tires<br />'; //the same as code: echo "$tireqty tires<br/>";  
  echo $oilqty.' bottles of oil<br />';
  echo $sparkqty.' spark plugs<br />';

  $totalqty = 0;
  $totalamount = 0.00;

  $totalqty = 0;
  $totalqty = $tireqty + $oilqty + $sparkqty;
  echo 'Items ordered: '.$totalqty.'<br />';

  $totalamount = 0.00;

  define('TIREPRICE', 100); //用define来定义常量
  define('OILPRICE', 10);
  define('SPARKPRICE', 4);

  $totalamount = $tireqty * TIREPRICE //常量前面没有$, phpinfo() 可以看到许多PHP预先定义的常量
               + $oilqty * OILPRICE
               + $sparkqty * SPARKPRICE;

  echo 'Subtotal: $'.number_format($totalamount,2).'<br />';

  $taxrate = 0.10;  // local sales tax is 10%
  $totalamount = $totalamount * (1 + $taxrate);
  echo 'Total including tax: $'.number_format($totalamount,2).'<br />'; //number_format()PHP的Math库内置函数格式化输出格式

?>

<?php
  switch($find){
    case "a": echo "<p>a</p>";
    break;
    case "b": echo "<p>b</p>";
    break;
    case "c": echo "<p>c</p>";
    break;
    case "d": echo "<p>d</p>";
    break;
    default: 
    echo "<p>Regular customer</p>";
    break;
  }
?>
</body>
</html>

