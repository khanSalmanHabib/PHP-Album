<?php 

 // Connects to your Database 
require 'connect.inc.php';
 //checks cookies to make sure they are logged in 

 if(isset($_COOKIE['ID_my_site'])) 

 { 

 	$username = $_COOKIE['ID_my_site']; 

 	$pass = $_COOKIE['Key_my_site']; 

 	 	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysql_fetch_array( $check )) 	 

 		{ 

 

 //if the cookie has the wrong password, they are taken to the login page 

 		if ($pass != $info['password']) 

 			{ 			header("Location: login.php"); 

 			} 

 

 //otherwise they are shown the admin area	 

 	else 

 			{

 			} 

 		} 

 		} 
 ?>

<html lang="en"> 
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta charset="utf-8"/>
<title>Album</title>
<link type="text/css" rel="stylesheet" media="all" href="research web.css">

</head>



<body>
 
<div id="big_wrapper">
 


 
	<div id="SUST-logo">
      <a tabindex="1" accesskey="1" title="" href="Project Web.html"><h1 id="university-name" class="offscreen"></h1></a>
    </div>
 
<header id="the_header">
		 <div id="strap">
				<div id="strap-container">
				<!-- <a href="#" id="directory">A-Z Index</a> -->
						

					<div id="block-menu-menu-audience" class="block block-menu ">

						<div class="content">
									
						<ul class="menu">
							<li class="leaf "><a href="members.php" title="" style="top: 0px; ">Home</a></li>
							<li class="leaf"><a href="image.php" title="" style="top: 0px; ">Upload image</a></li>
							<li class="leaf"><a href="update_image_info.php" title="" style="top: 0px; ">Update image</a></li>
							<li class="leaf"><a href="delete_files.php" title="" style="top: 0px; ">Delete image</a></li>
							<li class="leaf "><a href="Rules.php" title="" style="top: 0px; ">Rules</a></li>
							<li class="leaf "><a href="Visitors.php" title="" style="top: 0px; ">Visitors</a></li>
							<li class="leaf "><a href="Search.php" title="" style="top: 0px; ">Search</a></li>
							<li class="leaf "><a href="Logout.php" title="" style="top: 0px; ">Logout</a></li>
						</ul>
						</div>
					</div>


					
				  <!-- End strap search -->

				  
			  <!-- End strap links -->
			  


				</div>
			<!-- End strap container -->

			</div>
</header>
<nav>
				
	 
</nav>
 <div id="new_div">
 
 <section id="main-section">
 <?php
	//$query_image = "SELECT Image FROM subject_test";
	//$query_name = "SELECT file_name FROM subject_test";
	$query = "SELECT * FROM subject_main ORDER BY p_id";
		//$result_image = mysql_query($query_image) or die(mysql_error());
		//$result_name = mysql_query($query_name) or die(mysql_error());
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
				$n=$row['file_name'];
				echo "<a href=view_image.php?file_name=$n&><img border=\"7\" src=\"".$row['image']."\" width=\"183\" alt==\"".$row['file_name']."\" height=\"180\"></a>";
				echo "\t";
			
				
		}
 
 
 ?>
 </section>

<aside id=""side>
<div id="nav">
				
				
				 
					<div id="block-menu-menu-external-prime" class="block block-menu ">
<div class="content">
									<font color="#fff">SORTING WALLPAPERS BY</font>
									<br>
									<br>
							<ul class="menu">								
								<li class="leaf"><a href="ID.php" title="">Image Id</a></li>
								<br>
								<li class="leaf"><a href="Name.php" title="">Name</a></li>
								<br>
								<li class="leaf"><a href="Subject.php" title="">Subject</a></li>
								<br>
								<li class="leaf"><a href="Uploder.php" title="">Uploder</a></li>
								<br>
								<li class="leaf"><a href="Date Created.php" title="">Date Created</a></li>
								<br>
								<li class="leaf"><a href="Size.php" title="">Size</a></li>
								<br>
								

							</ul>  	
							
						</div>
					</div>


				</div>
</aside>
</div>
  
<footer id="the_footer">
	<div class="content">
					
    	<ul class="menu">
			<li class="leaf first"><a href="" title="">About the home page</a></li>
			<li class="leaf"><a href="" title="">Staff directory</a></li>
		</ul> 	
	</div>
 
 </footer>
 
</div>
		
 
</body>
 
</html>
 

 
 </html>