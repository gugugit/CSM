<?php
$arr1 = array(
		/*'DB_TYPE' => 'mysql',
		'DB_HOST' => 'localhost',
		'DB_NAME' => 'test',
		'DB_USER' => 'root',
		'DB_PWD'  => '',
		'DB_PORT' => '3306',
		*/
		'URL_MODEL' => 1,
			'MAIL_HOST' => 'smtp.163.com',//smtp服务器名称
			'MAIL_SMTPAUTH' => TRUE,
			'MAIL_USERNAME' =>'13120310025@163.com',//发件人邮箱名
			'MAIL_PASSWORD' =>'beijin7795285608',//发件人授权密码
			'MAIL_FROM' =>'13120310025@163.com',//发件人邮箱地址
			'MAIL_FROMNAME' =>'dinglf',//发件人姓名
			'MAIL_CHARSET' =>'utf-8',//邮件编码
			'MAIL_ISHTML' =>TRUE,
		);
$arr2 = include './config.inc.php';
return array_merge($arr1,$arr2);
