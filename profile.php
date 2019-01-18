<?php
session_start();
 require_once("header.php");
require_once("dbconnect.php");

if(isset($_SESSION['email'])){
?>
<h1> your profile here </h1>
<img src="Uploadpic/22815145_1331664113612462_9148424518366178788_n.jpg" width="311">
<?php 
echo $_SESSION['email'];
echo"<br>";

echo $_SESSION['mobile'];


?>


<?php
}
else
{
	echo "<script language=javascript>document.location.href='signin.php'</script>";
}

?>
<div><a href="updateprofile.php">update your profile</a></div>