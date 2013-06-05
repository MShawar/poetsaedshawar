<?php
ob_start();
session_start();

$current_file = $_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']))
	$http_referer = $_SERVER['HTTP_REFERER'];
else 
	$http_referer = 'index.php';

function IsLoggedIn()
{
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function getPoemName($id)
{
	
// 	$uid = $_SESSION['userid'];
// 	$query = "select firstname, surname from users where id='$uid'";
	
// 	//echo $query.'<br>';
	
// 	if($qRun = mysql_query($query) or die(mysql_error()))
// 	{
// 		if(mysql_num_rows($qRun) == 1)
// 		{
// 			$firstname = mysql_result($qRun, 0, 'firstname');
// 			$surname = mysql_result($qRun, 0, 'surname');
			
// 			return $fullname = $firstname.$surname;
// 		}
// 		else
// 			echo 'cant get name';
// 	}
}

function RunSelectQuery($QueryContent)
{
	//echo $QueryContent.'<br>';
	if($qResult = mysql_query($QueryContent) or die(mysql_error()))
	{
		if(mysql_num_rows($qResult) > 0)
		{
			return $qResult;
		}
		else
			return 'Fail';
	}
}

function RunInsertQuery($QueryContent)
{
	//echo $QueryContent.'<br>';
	if($qResult = mysql_query($QueryContent) or die(mysql_error()))
	{
		return 'Success';
	}
	else
	{
		return 'Fail';
	}

}

function RunUpdateQuery($QueryContent)
{
	//echo $QueryContent.'<br>';
	if($qResult = mysql_query($QueryContent) or die(mysql_error()))
	{
		return 'Success';
	}
	else
	{
		return 'Fail';
	}

}

ob_end_flush();
?>