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
<div style="background-color:#ccdd99;width:100%;height:30px;border-radius:7px;display:block;-moz-border-radius:7px;-webkit-border-radius:7px;">
<label>:نتائج البحث</label>
</div>
<table >
  <tr>
    <th>العنوان</th>
  </tr>
  <?php 
  
  if(isset($_GET['keywords'])){
  	$searchText = htmlentities($_GET['keywords']);
  }
  else{
  	$searchText = ' ';
  }
  
  $getPoemQuey = "select title from poems where title like '%".mysql_real_escape_string($searchText)."'";
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