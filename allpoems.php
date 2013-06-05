<?php
	require_once 'connect.inc.php';
	require_once 'core.inc.php';
	require_once 'html_codes.php';
	header('Content-Type: text/html;charset=utf-8');
	?>
<html>
<head>
<title>كل القصائد
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
    <th>العنوان</th>
  </tr>
  <?php 
  $getPoemQuey = "select title from poems";
  $getPoemRun = RunSelectQuery($getPoemQuey);
  
  if($getPoemRun != 'Fail')
  {
  	while ($row = mysql_fetch_array($getPoemRun, MYSQL_ASSOC)) {
  		echo '<tr><td><a href="showpoem.php?title='.$row["title"].'">'.$row["title"].'</a></td></tr>';
		}
  	
  	mysql_free_result($getPoemRun);
  } 
  ?>
  
</table>
</section>
<?php footer(); ?>
</div>
</body>
</html>