<?php
//create short variable name
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

//$orders= file("$DOCUMENT_ROOT/../orders/orders.txt");
$orders= file("$DOCUMENT_ROOT/PMW/orders/orders.txt"); //file函数返回数组

$number_of_orders = count($orders);
if ($number_of_orders == 0) {
  echo "<p><strong>No orders pending.
       Please try again later.</strong></p>";
}

for ($i=0; $i<$number_of_orders; $i++) {
  echo $orders[$i]."<br />";
}
?>
