<?php
require_once 'connect.inc.php';
require_once 'core.inc.php';
require_once 'html_codes.php';

//session_start();
header('Content-Type: text/html;charset=utf-8');

if (!isset($_SERVER['PHP_AUTH_USER'])) {
	
	header('WWW-Authenticate: Basic realm="Admin"');
	header('HTTP/1.0 401 Unauthorized');
    echo 'You don\'t have access.';
    exit;
} else {
	if (!empty($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']) && !empty($_SERVER['PHP_AUTH_PW'])) {
		if($_SERVER['PHP_AUTH_USER'] === 'mousashawar' && $_SERVER['PHP_AUTH_PW'] === 'Ci51251988'){
			$_SESSION['admin'] = 'true';
?>
<html>
<head>
<title>Admin
</title>
<script type="text/javascript" src="js/script.js"></script>
<link rel="stylesheet" href="css/main_ar.css"/>
<link rel="stylesheet" href="css/forms_ar.css"/>
</head>
<body>
<div id="wrapper">
<?php headerAndSearchBar(); ?>
<aside id="main_aside">
<?php getSideMenu(); ?>
</aside>
<section id="main_section">
<table>
  <tr>
    <th>Options:</th>
  </tr>
  <tr><td><a href="addnewpoem.php">أضف قصيده جديده</a></td></tr>
  
</table>
 <?php 
 getAllUnVerifiedComments();
  ?>
</section>
<?php footer(); ?>
</div>
</body>
<?php 
		}else{
			echo 'You don\'t have access.';
		}
	}
}
	
?>
