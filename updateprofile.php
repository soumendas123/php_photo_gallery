<?php
session_start();
 require_once("header.php");
require_once("dbconnect.php");
?>
<?php
if(isset($_POST['sub']))
	{
	
$sqlupdate="UPDATE  student SET 
name='$_POST[name]',
fathername='$_POST[fname]',
mobile='$_POST[mobile]',
address='$_POST[address]',
email='$_POST[email]',
password='$_POST[pass]'
WHERE id='$_SESSION[userId]'";

echo "<pre>";
print_r($sqlupdate);
//print_r($_FILES);
echo "</pre>";
	if(mysqli_query($con,$sqlupdate)){
		echo "Record was updated successfully."; 
	}
	else
	{
		echo "not update";
	}




	
}
?>
 <h1>UPDATE YOUR PROFILE</h1>
 <form action="" method="POST" enctype="multipart/form-data">
 <table>
 <tr>
 
<td> name</td><td>:</td><td><input type="text" name="name" placeholder="enter your name" value="<?php echo $_SESSION['username'];?>"> </td>
</tr>
 <tr>
 
 <td>Father's Name</td><td>:</td><td><input type="text" name="fname" placeholder="enter your name" value="<?php echo $_SESSION['fathername'];?>"></td>
 </tr>
 <tr>
 <td>E-mail</td><td>:</td><td><input type="text" name="email" placeholder="enter your email" value="<?php echo $_SESSION['email'];?>"><b style="color:red">*</b></td>
 </tr>
 <tr>
 
 <td>password</td><td>:</td><td><input type="password" name="pass" placeholder="enter your password" value="<?php if(isset($_POST['pass'])){echo $_POST['pass'];}?>"><b style="color:red">*</b></td>
 </tr>
 <tr>
 
 <td>Confirm-Password</td><td>:</td><td><input type="password" name="cpass" placeholder="enter your confirm password" value="<?php if(isset($_POST['cpass'])){echo $_POST['cpass'];}?>" ><b style="color:red">*</b></td>
 </tr>
<td> Mobile</td> <td>:</td><td><input type="text" name="mobile" placeholder="enter your mobile number" value="<?php echo $_SESSION['mobile'];?>"></td>
</tr>
 <tr>
 <td>Address</td><td>:</td><td><textarea rows="7" cols="31" name="address" placeholder="enter your address" value="<?php echo $_SESSION['address'];?>"    ></textarea></td>
 </tr>
 <tr>
 
 <td>profile picture</td><td>:</td><td><input type="file" name="image" placeholder="enter your profile pic" > <img src="<?php echo $_SESSION['image'];?>" ></td>
 </tr>
 
 <tr>
<td></td><td></td> <td><input type="submit" name="sub" value="update"></td>
 </tr>
 </table>
</form>	