

<html lang="en"> 
<head> 
	<meta charset="utf-8"/>
	<title>Album</title>
	<link rel="stylesheet" href="Search.css"/>
</head>
<body>
<div id="big_wrapper">

<header id="the_header">
 <p><h1>ALBUM</h1></p>
</header>
 
 
<nav>
  <h1>Search Image By::</h1>
  <br />
</nav>
 
<div id="new_div">
<section id="main_section">

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
File Name:
<br />
<input type="text" name="file_name" maxlength="60">
<br />
<br />
<input type="submit" name="submit" value="   Select   ">
<input type="reset" name="submit" value="   Cancel   ">
</form>
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<br />
Uploader :
<br />
<input type="text" name="username" maxlength="60"> 
<br />
<br />
<input type="submit" name="submit" value="   Select   ">
<input type="reset" name="submit" value="   Cancel   ">
</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<br />
Subject :
<br />
<input type="text" name="subject" maxlength="60"> 
<br />
<br />
<input type="submit" name="submit" value="   Select   ">
<input type="reset" name="submit" value="   Cancel   ">
</form>
 
</section>
 
<aside id="aside">
<?php 
require 'connect.inc.php';
 
 //if the login form is submitted 

 if (isset($_POST['submit'])) 
 { 
		 if (@$_POST['file_name']) 
		 { 
		 $query_name="SELECT * FROM subject_main WHERE file_name LIKE '%".$_POST['file_name']."%'";
			$result = mysql_query($query_name) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
						$n=$row['file_name'];
						echo "<a href=view_image.php?file_name=$n&><img border=\"7\" src=\"".$row['Image']."\" width=\"183\" alt==\"".$row['file_name']."\" height=\"180\"></a>";
						echo "\t";											
				}
		 }
		  if (@$_POST['username']) 
		 { 
		 $query_username="SELECT * FROM subject_main WHERE username LIKE '%".$_POST['username']."%'";
				$result = mysql_query($query_username) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
						$n=$row['file_name'];
						echo "<a href=view_image.php?file_name=$n&><img border=\"7\" src=\"".$row['Image']."\" width=\"183\" alt==\"".$row['file_name']."\" height=\"180\"></a>";
						echo "\t";
				}
		 }
		  if (@$_POST['subject']) 
		 { 
		 $query_subject="SELECT * FROM subject_main WHERE subject LIKE '%".$_POST['subject']."%'";
			$result = mysql_query($query_subject) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
						$n=$row['file_name'];
						echo "<a href=view_image.php?file_name=$n&><img border=\"7\" src=\"".$row['Image']."\" width=\"183\" alt==\"".$row['file_name']."\" height=\"180\"></a>";
						echo "\t";
				}
		 }
		
		
		
 }
?> 
</aside>
</div>

<footer id="the_footer">
 copyright album 2012.
</footer>

</div>
</body>

</html>
 


