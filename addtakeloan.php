<?php
include_once("config.php");
if(isset($_POST["submit"]))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$profession=$_POST['profession'];
	$amount=$_POST['amount'];
	$loanterm=$_POST['loanterm'];
	$purpose=$_POST['purpose'];
	$description=$_POST['description'];
	$sessionid=$_POST['session'];

      $query=mysqli_query($con,"SELECT name FROM takeloan WHERE name='$name'");
  $count=mysqli_num_rows($query);
  if($count!=0)
  {
      header("Location:alreadytaken.php");
  }
  else
  {
      
	if($amount<=100000)
	{
		$sql="INSERT INTO takeloan(name,phone,profession,amount,loantearm,purpose,description,session_id) values('$name','$phone','$profession','$amount','$loanterm','$purpose','$description','$sessionid')";
	if(mysqli_query($con,$sql))
	{
		?>
		<script type="text/javascript">
				alert("loan is Taken Successfully")
			</script> 
			<?php
			header ("refresh:0; url=takeloan.php");
	}
	else
	{
		?>
		<script type="text/javascript">
				alert("Something is worng! Try Again")
			</script> 
			<?php
			header ("refresh:30; url=takeloan.php");
	}

	}
	else
	{
		?>
		<script type="text/javascript">
				alert("You Can Take Loan Maximum 1 lux!Thank you")
			</script> 
			<?php
			header ("refresh:0; url=takeloan.php");

	}

}

}
?>



