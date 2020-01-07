<?php
include_once("config.php");
if(isset($_POST["submit"]))
{
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$amount=$_POST['amount'];
	$pdate=$_POST['date'];
	$problems=$_POST['description'];
	$sessionid=$_POST['session'];


       $result=mysqli_query($con,"SELECT * FROM takeloan Where name='$name'");
 while($res = mysqli_fetch_array($result))
          {
          	$balance=$res['amount'];
          	
          	
          }
          if($amount>=250 && $balance>=$amount)
          {
          	 $updatebalance=$balance-$amount;
         $sql=mysqli_query($con,"UPDATE takeloan SET amount='$updatebalance' where name='$name'");
          }
            

      
	if($amount>=250 && $balance>=$amount)
	{

		 $sql="INSERT INTO weeklyloan(name,phone,Amount,Payment_date,Problems,session_id) values('$name','$phone','$amount','$pdate','$problems','$sessionid')";
	if(mysqli_query($con,$sql))
	{
		?>
		<script type="text/javascript">
				alert("Payment Successfully")
			</script> 
			<?php
			header ("refresh:0; url=weeklyloan.php");
	}
	else
	{
		?>
		<script type="text/javascript">
				alert("Something is worng! Try Again")
			</script> 
			<?php
			header ("refresh:30; url=weeklyloan.php");
	}

	
	}
	else
	{
        ?>
		<script type="text/javascript">
				alert("Your Payment Money Minimum 250tk & maximum Your loan Balance!Thank you sir")
			</script> 
			<?php
			header ("refresh:0; url=weeklyloan.php");
    }

}

?>



