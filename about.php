<?php
	require_once 'connect.inc.php';
	require_once 'core.inc.php';
	require_once 'html_codes.php';
	header('Content-Type: text/html;charset=utf-8');
	?>
<html>
<head>
<title>نبذه عن الشاعر
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
<?php echo'معلومات عن الشاعر';?>
</section>
</div>
</body>
</html>