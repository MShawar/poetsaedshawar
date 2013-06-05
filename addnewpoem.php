<?php

require_once 'connect.inc.php';
require_once 'core.inc.php';

if(isset($_SESSION['admin'])){
	if(isset($_POST['poemname']) && isset($_POST['filename']))
	{
		$poemname = $_POST['poemname'];
		$filename = $_POST['filename'];
		$aboutpoem = $_POST['aboutpoem'];
		
		if(!empty($poemname) && !empty($filename))
		{
				$existantPoemQuery = "select title from poems where title='".mysql_real_escape_string($poemname)."'";
				//echo $existantPoemQuery;
				$existantPoemRun = RunSelectQuery($existantPoemQuery);
				
				if($existantPoemRun === 'Fail')
				{
					//echo 'running insert query';
					$inserQuery = "insert into poems values('', '".mysql_real_escape_string($poemname)."','".mysql_real_escape_string($filename)."','".mysql_real_escape_string($aboutpoem)."')";
					//echo $inserQuery;
					if(RunInsertQuery($inserQuery) === 'Success')
					{
						echo 'Poem added successfully.';
					}
					else
					{
						$error_message = 'Can\'t add poem.';
					}
				}
				else 
				{
					$error_message =  'The Poem '.mysql_result($existantPoemRun, 0, 'title').' is already added.';
				}
		}
		else
		{
			$error_message =  'Poem name and file name are both required.';
		}
	}
?>

<html>
<head>
<title>Register
</title>
<link rel="stylesheet" href="css/main_ar.css"/>
<link rel="stylesheet" href="css/forms_ar.css"/>
<link rel="stylesheet" href="css/register_ar.css"/>
</head>
<body>
<div id="wrapper">
<?php 
require_once 'html_codes.php';
headerAndSearchBar(); ?>
<div class="container">
<form action="addnewpoem.php" id="generalform" method="post">
<h3>:أدخل معلومات القصيده</h3>
<?php if(isset($error_message)) echo'.<span class="error">'.$error_message.'</span>.';?>
	<div class="field">
	<label for="poemname">:عنوان القصيده</label>
	<input class="input" type="text" name="poemname" maxlength="40" value="<?php if(!empty($poemname)) {echo $poemname;} ?>">
	<p class="hint">40 characters max(letters and numbers only)</p>
	</div>
	<div class="field">
	<label for="filename">:إسم الملف</label>
	<input class="input" class="input" type="text" name="filename" >
	<p class="hint">50 characters max</p>
	</div>
	<div class="field">
	<label for="aboutpoem">نبذه عن القصيده</label>
	<textarea class="textarea" name="aboutpoem" rows="3" cols="25"></textarea>
	</div>
	<input type="submit" class="button" name="submit" value="إضافه">
</form>
</div>
<?php footer(); ?>
</div>
</body>
</html>


<?php
}
else 
{
	header('Location: index.php');
}

?>