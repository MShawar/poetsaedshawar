<?php

function getSideMenu()
{
	echo '
	<div id="sideLinksCon">
	<h1>:روابطـ </h1>
	<div id="menu">
	<ul>
	<li><a href="index.php" title="الرئيسية">الرئيسية</a></li>
	<li><a href="allpoems.php" title="عرض جميع القصائد">القصائد</a></li>
	<li><a href="about.php" title="معلومات  عن الشاعر">عن الشاعر</a></li>
	</ul>
	</div>
	</div>
	';
}

//Header and search bar
function headerAndSearchBar(){
	if(isset($_GET['keywords'])){
		$defaultText = htmlentities($_GET['keywords']);
	}
	else{
		$defaultText = '';
	}
	
	echo '
	<header id="main_header">
	<div id="left_align">
	';
	
	//top links here
	topRightLinks();
	
	echo '
	</div>
	<div id="logo">
		<a href="index.php" style="padding:1px;"><img src="images/logo.png" width="500" height="100"/></a>
	</div>
	</header>
	
	<div id="searchContDiv">
	<form name="input" action="search.php" id="top_search" method="get">
	<input type="submit" value="إبحث" class="button"/>&nbsp;
	
	';
	// 	<select name="category" id="category" class="searchBox">
	//categories here
	//createCategoryList();
	//</select>
	echo '
	<input type="text" id="keywords" name="keywords" size="100" class="searchBox" value="'.$defaultText.'"> 
	</form>
	</div>
	';
}

function getAllUnVerifiedComments()
{
	$getCommentsQuey = "select * from comments where isverified = 0";
	$getCommentsRun = RunSelectQuery($getCommentsQuey);
	
	if($getCommentsRun != 'Fail')
	{
		while ($row = mysql_fetch_array($getCommentsRun, MYSQL_ASSOC)) {
			echo'
			<div class="field">
			<div style="width:100%; height:2; background-color:gray;"></div>
			</div>
			<div id="ajaxresponse'.$row["id"].'"></div>
			<div class="field">
			<label for="commentorname">:الإسم</label>
			<input DIR="RTL" type="text" style="float:right;" maxlength="40" value="'.$row["name"].'" disabled="disabled"/>
			</div>
			<div class="field">
			<label for="comment">:التعليق</label>
			<textarea DIR="RTL" class="textarea" disabled>'.$row["body"].'</textarea>
			</div>
			<div class="field">
			<input type="submit" class="button" onclick="allowComment('.$row["id"].');" value="أظهار" />
			</div>
			';
		}
		 
		mysql_free_result($getCommentsRun);
	}
}

function getCommentsAndCommentForm($poemname){
	
	$getPoemQuey = "select id from poems where title='".mysql_real_escape_string($poemname)."'";;
	$getPoemRun = RunSelectQuery($getPoemQuey);
	
	if($getPoemRun != 'Fail')
	{
		$poemid =  mysql_result($getPoemRun, 0, 'id');
	}
	
	$getCommentsQuey = "select * from comments where poem_id='".$poemid."' and isverified = 1";
	$getCommentsRun = RunSelectQuery($getCommentsQuey);
	
	if($getCommentsRun != 'Fail')
	{
  		while ($row = mysql_fetch_array($getCommentsRun, MYSQL_ASSOC)) {
  			echo'
			<div class="field">
			<label for="commentorname">:الإسم</label>
			<input DIR="RTL" type="text" style="float:right;" maxlength="40" value="'.$row["name"].'" disabled="disabled"/>
			</div>
			<div class="field">
			<label for="comment">:التعليق</label>
			<textarea DIR="RTL" class="textarea" disabled>'.$row["body"].'</textarea>
			</div>
			<div class="field">
			<div style="width:100%; height:2; background-color:gray;"></div>
			</div>
			';
			}
  	
  		mysql_free_result($getCommentsRun);
  	} else {
  		echo '
  		<div class="field">
  		<label>لا يوجد تعليقات</label>
  		</div>
  		<div class="field">
		<div style="width:100%; height:2; background-color:gray;"></div>
		</div>';
  	}
	
	echo'
	    <h1>:أضف تعليق جديد</h1>
		<div class="field">
		<label for="commentorname">:الإسم</label>
		<input class="input" id="name" type="text" name="commentorname" maxlength="40" />
		</div>
		<div class="field">
		<label for="comment">:التعليق</label>
		<textarea class="textarea" name="comment" id="body"></textarea>
		</div>
		<div class="field">
		<input type="submit" class="button" onclick="addComment('.$poemid.');" value="أضف التعليق" />
		<div id="ajaxresponse"></div>
		</div>
	';
}

function topRightLinks(){
// 	if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
// 		if($_SESSION['admin'] == 'true'){
// 			echo '<a href="addnewpoem.php">أضف قصيده جديده</a>';// | <a href="LoginForm.php">Login</a>';
// 		}
// 	}
// 	else{
// 		$userid = $_SESSION['user_id'];
// 		//$QueryContent = "select * from messages where receiver='$userid' and status='unread'";
// 		//$result = RunSelectQuery($QueryContent) or die(mysql_error());
// 		$num = 0;//mysql_num_rows($result);
// 		if($num==0)
// 		{
// 			echo '<a href="messages_inbox.php">Messages</a> |';			
// 		}
// 		else{
// 			echo '<span class="usernames"><a href="messages_inbox.php">Messages ('.$num.')</a></span> |';
// 		}
		
// 		echo '<a href="">Add Item</a> | <a href="">My Account</a> | <a href="logout.php">Log Out</a>
		
// 		';
// 	}
}

function createCategoryList(){
	if(ctype_digit($_GET['category']) && isset($_GET['category'])){
		$catNum = $_GET['category'];
	}
	else{
		$catNum = 999;
	}
	
	echo '<option>All Categories</option>';
	
	$i = 0;
	while (1){
		if(numberToCategory($i)=='No Category.'){
			break;
		} else{
			echo '<option value="'.$i.' "';
			if($catNum === $i){ echo ' SELECTED '; }
			echo '>'.numberToCategory($i).'</option>';
		}
		
		$i++;
	}
}

function numberToCategory($number){
	switch ($number){
		case 0:
			return 'Automotives';
			break;
			case 1:
				return 'Books';
				break;
			case 2:
				return 'Cars';
				break;
			case 3:
				return 'Games';
				break;
			default:
				return 'No Category.';
				break;
	}
			
}

function footer(){
	
	echo '
	<footer id="main_footer">
	<h6 style="text-align:center;">
	جميع الحقوق محفوظة
	</h6>
	</footer>';
}

?>