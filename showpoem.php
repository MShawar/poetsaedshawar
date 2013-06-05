<?php
	require_once 'connect.inc.php';
	require_once 'core.inc.php';
	require_once 'html_codes.php';
	header('Content-Type: text/html;charset=utf-8');
	
	if(isset($_GET['title']) && !empty($_GET['title']))
	{
		$poemname = $_GET['title'];
		$getPoemQuey = "select title,filename from poems where title='".mysql_real_escape_string($poemname)."'";;
		$getPoemRun = RunSelectQuery($getPoemQuey);
		
		if($getPoemRun != 'Fail')
		{
			$filename =  mysql_result($getPoemRun, 0, 'filename');
		}
	}
	?>
<html>
<head>
<title><?php if(!empty($poemname)) {echo $poemname;}  ?></title>
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
<iframe src="files/<?php if(!empty($filename)) {echo $filename;} else { echo 'error.htm'; }  ?>" id="iframe" onload="resizeIframe(this);"></iframe>

<div id="commentsCont">
<h1>:التعليقات</h1>
<?php  if(!empty($poemname)) { getCommentsAndCommentForm($poemname); } ?>
</div>

</section>
<?php footer(); ?>
</div>
</body>
</html>