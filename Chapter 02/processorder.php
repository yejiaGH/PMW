<?php
  // create short variable names
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $address = $_POST['address'];
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
  echo $DOCUMENT_ROOT;
  $date = date('H:i, jS F Y');
?>
<html>
<head>
  <title>Bob's Auto Parts - Order Results</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Order Results</h2>
<?php

	echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";

	echo "<p>Your order is as follows: </p>";

	$totalqty = 0;
	$totalqty = $tireqty + $oilqty + $sparkqty;
	echo "Items ordered: ".$totalqty."<br />";


	if ($totalqty == 0) {

	  echo "You did not order anything on the previous page!<br />";

	} else {

	  if ($tireqty > 0) {
		echo $tireqty." tires<br />";
	  }

	  if ($oilqty > 0) {
		echo $oilqty." bottles of oil<br />";
	  }

	  if ($sparkqty > 0) {
		echo $sparkqty." spark plugs<br />";
	  }
	}


	$totalamount = 0.00;

	define('TIREPRICE', 100);
	define('OILPRICE', 10);
	define('SPARKPRICE', 4);

	$totalamount = $tireqty * TIREPRICE
				 + $oilqty * OILPRICE
				 + $sparkqty * SPARKPRICE;

	$totalamount=number_format($totalamount, 2, '.', ' ');

	echo "<p>Total of order is $".$totalamount."</p>";
	echo "<p>Address to ship to is ".$address."</p>";

	$outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t"
					.$sparkqty." spark plugs\t\$".$totalamount
					."\t". $address."\n";



	// open file for appending
	//@ $fp = fopen("$DOCUMENT_ROOT/../orders/orders.txt", 'ab');
	$filename = "$DOCUMENT_ROOT/PMW/orders/orders.txt";
	$dir = dirname($filename);		
	if(!is_dir($dir))mkdir($dir,0777,true);	//mkdir 的用法， 第二个参数是什么意思 0777表示最大的访问权限
	@ $fp = fopen("$DOCUMENT_ROOT/PMW/orders/orders.txt", 'ab');
	flock($fp, LOCK_EX); //锁定或释放文件， LOCK_EX 要取得共享锁定（读取的程序）

	if (!$fp) {
	  echo "<p><strong> Your order could not be processed at this time.
		    Please try again later.</strong></p></body></html>";
	  exit;
	}

	fwrite($fp, $outputstring, strlen($outputstring)); //strlen来获得字符串长度
	flock($fp, LOCK_UN); // LOCK_UN要释放锁定，无论共享或独占
	fclose($fp);

	echo "<p>Order written.</p>";
?>
</body>
</html>
