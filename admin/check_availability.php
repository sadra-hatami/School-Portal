
<?php 
error_reporting(0);
require_once("includes/config.php");
if(!empty($_POST["regno"])) {
	$regno= $_POST["regno"];
	
		$result =mysqli_query($con,"SELECT StudentRegno FROM staff WHERE StaffRegno='$regno'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> Staff with this Regno Already Registered.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	

}
}


?>
