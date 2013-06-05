<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';

if(isset($_POST['commentid']) && !empty($_POST['commentid']))
{
	$commentid = $_POST['commentid'];
	
	//echo 'running insert query';
	$inserQuery = "update comments set isverified = '1' where id = '".mysql_real_escape_string($commentid)."'";
	//echo $inserQuery;
	if(RunUpdateQuery($inserQuery) === 'Success')
	{
		echo 'Allowed';
	}
	else
	{
		echo 'ERROR';
	}
}
else {
	echo '.гАялга йзхфи лЦМз гАмчФА';
}

?>