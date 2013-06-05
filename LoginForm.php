<?php  
require_once 'connect.inc.php';
require_once 'core.inc.php';
require_once 'html_codes.php';

if(isset($_POST['username']) && isset($_POST['password']) )
{
	$username = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$pass_hash = md5($password);
	
	if(!empty($username) && !empty($username))
	{
	$query = "select id from users where username='$username' and password='$pass_hash'";
	
	//echo $query.'<br>';
	
	if($qRun = mysql_query($query))
	{
		if(mysql_num_rows($qRun) == 0)
		{
			$error_message = 'Invalid username and/or password.';
		}
		else 
		{
			$userid = mysql_result($qRun, 0, 'id');
			
			$_SESSION['user_id'] = $userid;
			header('Location: index.php');
		}
	}
	else
	{
		$error_message = mysql_error();
	}
	}
	else
	{
		$error_message = 'You must enter a username and a password to login.';
	}
}else if(isset($_SESSION['user_id']))
{
	header('Location: index.php');
}

?>

<html>
<head>
<title>Login
</title>
<link rel="stylesheet" href="css/main_en.css"/>
<link rel="stylesheet" href="css/forms_en.css"/>
<link rel="stylesheet" href="css/register_en.css"/>
</head>
<body>
<div id="wrapper">
<?php headerAndSearchBar(); ?>
<div>
<aside id="left_side">
<img src="images/login.jpg" width="490px">
</aside>
<section id="right_side">
<form action="<?php echo 'loginform.php'; ?>" id="generalform" method="post">
<h3>Login:</h3>
<?php if(isset($error_message)) echo'.<span class="error">'.$error_message.'</span>.';?>
	<div class="field">
	<label for="username">Username:</label>
	<input class="field" type="text" name="username" maxlength="30" value="<?php if(!empty($username)) {echo $username;} ?>">
	</div>
	<div class="field">
	<label for="password">Password:</label>
	<input class="field" type="password" name="password" >
	</div>
	<input type="submit" class="button" name="submit" value="Login">
</form>
</section>
</div>
<?php footer(); ?>
</div>
</body>
</html>