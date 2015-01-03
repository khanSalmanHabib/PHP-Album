<?php 
require 'connect.inc.php';
 //Checks if there is a login cookie

 if(isset($_COOKIE['ID_my_site']))


 //if there is cookie, it logs you in and directes you to the members page

 { 
 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site'];

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());

 	while($info = mysql_fetch_array( $check )) 	

 		{

 		if ($pass != $info['password']) 

 			{

 			}

 		else

 			{

 			header("Location: members.php");

			}

 		}

 }


 //if the login form is submitted 

 if (isset($_POST['submit'])) { // if form has been submitted



 // makes sure they filled it in

 	if(!$_POST['username'] | !$_POST['pass']) {

 		die('You did not fill in a required field.');

 	}

 	// checks it against the database



 

 	$check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());



 //Gives error if user dosen't exist

 $check2 = mysql_num_rows($check);

 if ($check2 == 0) {

 		die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');

 				}

 while($info = mysql_fetch_array( $check )) 	

 {

 $_POST['pass'] = stripslashes($_POST['pass']);

 	$info['password'] = stripslashes($info['password']);

 	



 //gives error if the password is wrong

 	if ($_POST['pass'] != $info['password']) {

 		die('Incorrect password, please try again.');

 	}
	 else 

 { 

 
 // if login is ok then we add a cookie 

 	 $_POST['username'] = stripslashes($_POST['username']); 

 	 $hour = time() + 3600; 

 setcookie(ID_my_site, $_POST['username'], $hour); 

 setcookie(Key_my_site, $_POST['pass'], $hour);	 

 

 //then redirect them to the members area 

 header("Location: members.php"); 

 } 

 } 

 } 

 else 

{	 

 

 // if they are not logged in 

 ?> 


<html lang="en"> 
<head> 
	<meta charset="utf-8"/>
	<title>Album</title>
	<link rel="stylesheet" href="openTest.css"/>
</head>
<body>
<div id="big_wrapper">

<header id="the_header">
 <p>ALBUM</p>
</header>
 
 
<nav>
 
</nav>
 
<div id="new_div">
<section id="main_section">
 <img src="violet-paint.jpg" height="500" width="660"/>
</section>
 
 
<aside id="log_in">
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post"> 

 <table border="0"> 

 <tr><td colspan=2><h1>Login</h1></td></tr> 

 <tr><td>Username:</td><td> 

 <input type="text" name="username" maxlength="40"> 

 </td></tr> 

 <tr><td>Password:</td><td> 

 <input type="password" name="pass" maxlength="50"> 

 </td></tr> 

 <tr><td colspan="2" align="right"> 

 <input type="submit" name="submit" value="  Sign  In  "> 

 </td></tr>

 </table> 
 
 
 </form> 
 <a href="Registration.php"><input type="submit" name="submit" value="   Sign Up   "></a>
</aside>
</div>

<footer id="the_footer">
 copyright album 2012.
</footer>

</div>
</body>

</html>
 


 <?php 

 } 
 ?> 

 