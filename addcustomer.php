<?php
include_once("config.php");
if(isset($_POST["submit"]))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$profession=$_POST['profession'];
	$pass=$_POST['password'];
	$enpass=md5($pass);

	$filename=$_FILES["uploadfile"] ["name"];
	$tempname=$_FILES["uploadfile"] ["tmp_name"];
	$folder="images/".$filename;
	move_uploaded_file($tempname,$folder);

	$query=mysqli_query($con,"SELECT first_name FROM customerinfo WHERE first_name='$fname'");
	$count=mysqli_num_rows($query);


	if($count!=0)
	{
		?>
		<script type="text/javascript">
				alert("This Name Already Exist")
			</script> 
			<?php
			header ("refresh:0; url=customer.php");

	}
	else
	{

$sql="INSERT INTO customerinfo(first_name,last_name,phone_number,age,gender,city,address,profession,image,password) values('$fname','$lname','$phone','$age','$gender','$city','$address','$profession','$folder','$enpass')";
	if(mysqli_query($con,$sql))
	{
		?>
		<script type="text/javascript">
				alert("Data is successfully added")
			</script> 
			<?php
			header ("refresh:0; url=customer.php");
	}
	else
	{
		?>
		<script type="text/javascript">
				alert("Data is not successfully added")
			</script> 
			<?php
			header ("refresh:0; url=customer.php");
	}
}
}
?>



