<?php
if(!@mysql_connect('localhost','Mousa','') || !@mysql_select_db('poetss'))
	{
		die('Error in connection.');
	}
?>