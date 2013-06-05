<?php

require_once 'connect.inc.php';
require_once 'core.inc.php';

if(!IsLoggedIn())
{
	if(isset($_POST['username']) && isset($_POST['password'])
		&& isset($_POST['pass_con']) && isset($_POST['firstname'])
		&& isset($_POST['surname']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$pass_con = $_POST['pass_con'];
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];
		
		if(!empty($username) && !empty($password)
				&& !empty($pass_con) && !empty($firstname)
				&& !empty($surname))
		{
			if($password === $pass_con)
			{
				$pass_hash = md5($password);
				$existantUser = "select username from users where username='$username'";
				
				$existantUserRun = RunSelectQuery($existantUser);
				
				if($existantUserRun === 'Fail')
				{
					$inserQuery = "insert into users values('', '".mysql_real_escape_string($username)."','".mysql_real_escape_string($pass_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
					//echo $inserQuery;
					if(RunInsertQuery($inserQuery) === 'Success')
					{
						echo 'You have successfully registered';
					}
					else
					{
						$error_message = 'We couldn\'t register you now, please try later.';
					}
				}
				else 
				{
					$error_message =  'The Username '.mysql_result($existantUserRun, 0, 'username').' is taken, please enter another.';
				}
			}
			else 
			{
				 $error_message = 'Please make sure that password and password confirmation fields are equl.';
			}
		}
		else
		{
			$error_message =  'All fields are required.';
		}
	}
?>

<html>
<head>
<title>Register
</title>
<link rel="stylesheet" href="css/main_en.css"/>
<link rel="stylesheet" href="css/forms_en.css"/>
<link rel="stylesheet" href="css/register_en.css"/>
</head>
<body>
<div id="wrapper">
<?php 
require_once 'html_codes.php';
headerAndSearchBar(); ?>
<div>
<aside id="left_side">
<img src="images/register.jpg" width="490px">
</aside>
<section id="right_side">
<form action="register.php" id="generalform" method="post">
<h3>Enter you registration info:</h3>
<?php if(isset($error_message)) echo'.<span class="error">'.$error_message.'</span>.';?>
	<div class="field">
	<label for="username">Username:</label>
	<input class="field" type="text" name="username" maxlength="30" value="<?php if(!empty($username)) {echo $username;} ?>">
	<p class="hint">30 characters max(letters and numbers only)</p>
	</div>
	<div class="field">
	<label for="password">Password:</label>
	<input class="field" type="password" name="password" >
	<p class="hint">32 characters max</p>
	</div>
	<div class="field">
	<label for="pass_con">Password Confirmation:</label>
	<input class="field" type="password" name="pass_con" >
	<p class="hint">32 characters max</p>
	</div>
	<div class="field">
	<label for="firstname">First Name:</label>
	<input class="field" type="text" name="firstname" value="<?php if(!empty($firstname)) {echo $firstname;} ?>">
	<p class="hint">40 characters max</p>
	</div>
	<div class="field">
	<label for="surname">Surname:</label>
	<input class="field" type="text" name="surname" value="<?php if(!empty($surname)) {echo $surname;} ?>">
	<p class="hint">40 characters max</p>
	</div>
	<input type="submit" class="button" name="submit" value="Register">
</form>
</section>
</div>
<?php footer(); ?>
</div>
</body>
</html>


<?php
}
else if(IsLoggedIn())
{
	header('Location: index.php');
}

?>