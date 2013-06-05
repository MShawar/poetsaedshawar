<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(isset($_POST['name']) && !empty($_POST['name'])
	&& isset($_POST['body']) && !empty($_POST['body'])
		&& isset($_POST['poemid']) && !empty($_POST['poemid']))
{
	$name = $_POST['name'];
	$body = $_POST['body'];
	$poemid = $_POST['poemid'];
	
	//echo 'running insert query';
	$inserQuery = "insert into comments values('', '".$poemid."', '".mysql_real_escape_string($name)."','".mysql_real_escape_string($body)."','0')";
	//echo $inserQuery;
	if(RunInsertQuery($inserQuery) === 'Success')
	{
		echo '.تم إضافة التعليق بنجاح, سيتم إضافة التعليق على الصفحة بعد مراجعته';
	}
	else
	{
		$error_message = '.لا يمكن إضافة التعليق الآن';
	}
	
} else {
	echo '.الرجاء تعبئة جميع الحقول';
}

?>