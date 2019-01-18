<?php
session_start();
 require_once("header.php");
require_once("dbconnect.php");
?>
    <h1>welcome to signup page</h1>
 <form action="" method="POST" enctype="multipart/form-data">
 <table>
 <tr>
 
<td> name</td><td>:</td><td><input type="text" name="name" placeholder="enter your name" value="<?php if(isset($_POST['name'])){echo $_POST['name'];}?>"> </td>
</tr>
 <tr>
 
 <td>Father's Name</td><td>:</td><td><input type="text" name="fname" placeholder="enter your name" value="<?php if(isset($_POST['fname'])){echo $_POST['fname'];}?>"></td>
 </tr>
 <tr>
 <td>E-mail</td><td>:</td><td><input type="text" name="email" placeholder="enter your email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>"><b style="color:red">*</b></td>
 </tr>
 <tr>
 
 <td>password</td><td>:</td><td><input type="password" name="pass" placeholder="enter your password" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];}?>"><b style="color:red">*</b></td>
 </tr>
 <tr>
 
 <td>Confirm-Password</td><td>:</td><td><input type="password" name="cpass" placeholder="enter your confirm password" value="<?php if(isset($_POST['cpass'])){echo $_POST['cpass'];}?>" ><b style="color:red">*</b></td>
 </tr>
<td> Mobile</td> <td>:</td><td><input type="text" name="mobile" placeholder="enter your mobile number" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];}?>"></td>
</tr>
 <tr>
 <td>Address</td><td>:</td><td><textarea rows="7" cols="31" name="address" placeholder="enter your address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];}?>"></textarea></td>
 </tr>
 <tr>
 
 <td>profile picture</td><td>:</td><td><input type="file" name="image" placeholder="enter your profile pic"  value="<?php if(isset($_POST['image'])){echo $_POST['image'];}?>"   ></td>
 </tr>
 
 <tr>
<td></td><td></td> <td><input type="submit" name="sub" value="signup"></td>
 </tr>
 </table>
</form>	
<?php
if(isset($_POST['sub'])){
	$error=0;
	if($_POST['pass']!=$_POST['cpass']){
		$mispass="password and confirm password mismatch.<br>";
		$error=1;
	}
	if(strlen($_POST['pass'])<6){
		$mispass="password must be more than 5 charecter.<br>";
		$error=1;
	}
	$sqlcheck="SELECT * FROM student WHERE email='$_POST[email]'";
	$rscheck=mysqli_query($con,$sqlcheck);
	$count=mysqli_num_rows($rscheck);
	if($count>0)
	{
		$exist="already have account for this email. please try another one or <a href='signin.php' >LOGIN";
		echo "<b>".$exist."</b>";
		$error=1;
	}
	
	if(error==0)
	{
	$name=$_POST['name'];
	$father_name=$_POST['fname'];
	$mobile=$_POST['mobile'];
    $image=$_FILES['image']['name'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$password=md5($_POST['pass']);
	
$sql="INSERT INTO student(name,father_name,mobile,address,email,password,image)VALUES('$name','$father_name','$mobile','$address','$email','$password','$image')";

		$lastId=mysqli_insert_id($con);   
	mysqli_query($con,$sql);
	$target="Uploadpic/".basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'],$target);
	//$sqlupdate="UPDATE student SET image='$target' WHERE id='lastId'";  
//mysqli_query($con,$sqlupdate);	
}
}
?>
<?php
echo "<pre>";
print_r($_POST);
print_r($_FILES);
echo "</pre>";

$lastId=mysqli_insert_id($con);
	echo $lastId;
	echo "<br>";
	$sqlselect="SELECT * FROM student WHERE id='$lastId'";
$records=mysqli_query($con,$sqlselect);
$count=mysqli_num_rows($records);
if($count>0)
{
	$field=mysqli_fetch_array($records);
	//echo "<pre>";
	//print_r($field);
	//echo "<pre>";
	//echo "<h1> welcome</h1>" .$field['name'];
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
	echo "not success .try again ";
}	
?>

   
