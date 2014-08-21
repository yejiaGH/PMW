<?php

$now = date('Y-m-d h:i:s');
$from_name = '测试寄件人';
$from_email = '0613080206@163.com';
$headers = "From: $from_name <$from_email>";
$to = '740860827@qq.com';  //收件人邮件地址
$body = "嗨, \n 这是一封测试邮件来自 $from_name <$from_email>.";
$subject = "[$now] 测试邮件发送";
if (mail($to, $subject, $body, $headers)) {
echo 'success!';
} else {
echo 'fail…';
}

?>
