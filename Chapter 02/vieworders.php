<?php
  //create short variable name
  $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
<head>
  <title>Bob's Auto Parts - Customer Orders</title>
</head>
<body>
<h1>Bob's Auto Parts</h1>
<h2>Customer Orders</h2>
<?php
    
   //@$fp = fopen("$DOCUMENT_ROOT/../orders/orders.txt", 'rb');
   @$fp = fopen("$DOCUMENT_ROOT/PMW/orders/orders.txt", 'rb');  //用只读方式打开orders.txt
   
   //在不打开文件的前提下检查一个文件是否存在
   if(file_exists("$DOCUMENT_ROOT/PMW/orders/orders.txt")){
    echo 'There are orders waiting to be processed.';
   }else{
    echo 'There are currently no orders.';
   }
   flock($fp, LOCK_SH); //LOCK FILE FOR READING
   if (!$fp) {
     echo "<p><strong>No orders pending.
           Please try again later.</strong></p>";
     exit;
   }
   
   while (!feof($fp)) { //使用feof作为文件结束的测试条件
      $order= fgets($fp, 999); //从文件中每次读取一行内容
      echo $order."<br />";
      //$order = fgetcsv($fp, 100, "\t"); 输出Array ?      
   }
   
   /*while (!feof($fp)){
    $char=fgetc($fp);
    if (!feof($fp)) echo ($char=="\n"?"<br/>":$char);
   }*/
   //string fread(resource fp, int length);
   echo "Final position of the file pointer is ".(ftell($fp));
   echo "<br />";
   rewind($fp); //rewind(), fseek(), ftell()对文件指针进行操作，或确定发现它在文件中的位置
   echo "After rewind, the position is ".(ftell($fp));
   echo "<br />";
   flock($fp, LOCK_UN); //release read lock
   fclose($fp);    

   //readfile("$DOCUMENT_ROOT/PMW/orders/orders.txt"); //打开输出再关闭文件
   //fpassthru($fp); //必须先用fopen打开输出再关闭
   //$filearray = file("$DOCUMENT_ROOT/PMW/orders/orders.txt"); //将整个文件读入数组，每一行作为一个元素
   //file_get_contents(); //返回字符串形式的文件内容，而不是回显到浏览器中

?>
</body>
</html>
