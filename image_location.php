<?PHP
require 'connect.inc.php';

$location_img = 'images/'; //Image Upload Folder

if(isset($_POST['Submit']))
{

	$fileName = $_FILES['Photo']['name'];
	$tmpName  = $_FILES['Photo']['tmp_name'];
	$fileSize = $_FILES['Photo']['size'];
	$fileType = $_FILES['Photo']['type'];
	$filePath = $location_img. $fileName;
	$result = move_uploaded_file($tmpName, $filePath);
	$Uploder = $_POST['uploder'];
	$Password = $_POST['password'];
	$location = $_POST['location'];
	if (!$result) 
	{
	echo "Error uploading file";
	exit;
	}
	
	if(!get_magic_quotes_gpc())
	{
		$fileName = addslashes($fileName);
		$filePath = addslashes($filePath);
		$Uploder  = addslashes($Uploder);
		$fileSize = addslashes($fileSize);
		$fileType = addslashes($fileType);
		$location  = addslashes($location);
		$Password  = addslashes($Password);
	}

	$query = "INSERT INTO  subject_location ( image,username,password,location,file_name,size,date_created,type ) VALUES ('$filePath','$Uploder','$Password','$location','$fileName','$fileSize',now(),'$fileType')";
	$query_sub = "INSERT INTO  location_index (location)VALUES ('$location')";
	$upcs=mysql_query($query_sub);
	$upc=mysql_query($query);
	if($upc && $query_sub)
	{
	echo'The file has been uploaded successfully';
	 			//header("Location: members.php"); 
	}
	else
	{
	echo'Upload failed';
	mysql_error();
	}
}
?>

<form name="Image" enctype="multipart/form-data" action="image.php" method="POST">
<input type="file" name="Photo" size="20000000" accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png" >
<br/>
Submitted By::
<br/>
<input type="text" name="uploder" value="">
<br /> 
password:
<br/>
<input type="password" name="password" value="">
<br/>
Location::
<br/>
<input type="text" name="location" value=""> 
<br/>
<input type="Submit" name="Submit" value="Submit">
<a href="members.php"><input type="button" class="button" value="main"></a>
</form>
