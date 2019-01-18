<?php require_once("header.php");
require_once("dbconnect.php");
session_start();
?>
    <h1>welcome to signin page</h1>
<form action="" method="POST">
<table>
<tr>
<td>
E-mail</td><td>:</td><td><input type="email" name="email" placeholder="enter your profile email"></td>
</tr>
<tr>
<td>Password</td><td>:</td><td><input type="password" name="pass" placeholder="enter your password"></td>
</tr>
<tr>
<td></td><td></td><td><input type="submit" name="login" value="signin"></td>
</tr>

</table>

</form>
<?php 
echo "<pre>";
echo print_r($_POST);
echo "</pre>";
?>
<?php 
if(isset($_POST['login'])){
	$sqlselect="SELECT * FROM student WHERE email='$_POST[email]' and password=md5('$_POST[pass]')";
	echo $sqlselect;
	$record=mysqli_query($con,$sqlselect);
	$count=mysqli_num_rows($record);
	if($count>0){
		$field=mysqli_fetch_array($record);
		//echo "login success";
		//echo $field;
	$_SESSION['userId']=$field['id'];
	$_SESSION['username']=$field['name'];
	$_SESSION['fathername']=$field['father_name'];
	$_SESSION['mobile']=$field['mobile'];
	$_SESSION['address']=$field['address'];
	$_SESSION['image']=$field['image'];
	$_SESSION['email']=$field['email'];
	$_SESSION['password']=$field['password'];
		echo "<script language=javascript>document.location.href='profile.php'</script>";
	}
	else
	{
		echo "login failed";
	}
	
}

?>