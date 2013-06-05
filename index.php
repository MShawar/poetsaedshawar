<?php
	require_once 'connect.inc.php';
	require_once 'core.inc.php';
	require_once 'html_codes.php';
	header('Content-Type: text/html;charset=utf-8');
	?>
<html>
<head>
<title>الرئيسية
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

<!-- 	<img src="generate.php?email=Mumtag.Kwaish@dattebayo.com"> -->
<section id="main_section">
<h1>الصفحه الرئيسية</h1>
<!-- <object data="files/test.pdf" type="application/pdf" > -->
<!-- alt : <a href="files/test.pdf">test.pdf</a> -->
<!-- </object> -->
<!-- <iframe src="http://docs.google.com/viewer?url=http%3A%2F%2Fresearch.google.com%2Farchive%2Fbigtable-osdi06.pdf&embedded=true" ></iframe> -->
</section>
<?php footer(); ?>
</div>
</body>
</html>
