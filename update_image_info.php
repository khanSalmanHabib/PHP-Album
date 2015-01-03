<?php 
require 'connect.inc.php';
 
 //if the login form is submitted 

 if (isset($_POST['submit'])) { 
 // if form has been submitted
$location = 'images/'.$_POST['file_name_new'];
$previous_name='images/'.$_POST['file_name'];
$new_name='images/'.$_POST['file_name_new'];

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
		$update = mysql_query("UPDATE `subject_main` SET `image`='".$location."',`file_name`='".$_POST['file_name_new']."' WHERE file_name = '".$_POST['file_name']."'")or die(mysql_error());
		
		if($update)
		{
			$rename = rename($previous_name,$new_name);
			if($rename)
			{
				header("Location: members.php");
			}
		}
 
	} 

 } 

 } 

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
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

 <table border="0">

 <tr><td>File Name:</td><td>

 <input type="text" name="file_name" maxlength="60">

 </td></tr>
 
 
 <tr><td>File Name(New):</td><td>

 <input type="text" name="file_name_new" maxlength="60">

 </td></tr>
 
 
 <tr><td>Username:</td><td>

 <input type="text" name="username" maxlength="50">

 </td></tr>
 
 <tr><td>Password:</td><td>

 <input type="password" name="pass" maxlength="10">

 </td></tr>


 </table>

 <br />
 <input type="submit" name="submit" value="   U  P  D  A  T  E   ">
 <input type="reset" name="submit" value="  R  E  S  E  T  ">
 </form>


</section>
 
 

</div>

<footer id="the_footer">
 copyright album 2012.
</footer>

</div>
</body>

</html>
 


