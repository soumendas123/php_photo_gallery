<?php
session_start();
 require_once("header.php");
require_once("dbconnect.php");

?>
<p>all user data </p>
<?php
 
 $user="SELECT * FROM student ORDER BY  id  DESC";
 $countt=mysqli_query($con,$user);
 $recorss=mysqli_num_rows($countt);
 //print_r ($recors);
 
 if($recorss>0)
 {
	$row=mysqli_fetch_array($countt);
		echo "<pre>";
		print_r($row);
		echo "</pre>";
	 
 }
	 else
	 {
		 
		 echo "no result found";
		 
	 }
	 
 
 //print_r ($count);
 ?>
