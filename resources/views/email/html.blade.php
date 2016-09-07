<!DOCTYPE html>
<html>
<head>
    <title>哈哈</title>
</head>
<body>
<h1>测试邮件 email.html</h1>
<div>我是{{ $user->name }}</div>
<img src="<?php echo $message->embedData('abc', 'def'); ?>">
</body>
</html>