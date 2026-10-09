<?php session_start();//Start new or resume existing session
require_once("includes/config.php");//check if the file has already been included, and if so, not include (require) it again.
if(!empty($_POST["cid"])) {//check courseid is not empty
$cid= $_POST["cid"];//put course id in cid
 $regid=$_SESSION['login'];//put teacher id and password
		$result =mysqli_query($con,"SELECT studentRegno FROM 	courseenrolls WHERE course='$cid' and studentRegno=' $regid'");//fetch data from courseenrolls and establish connection
	$count=mysqli_num_rows($result);//execute the query
if($count>0)//after saves result in count check whether it contains the data or not
{
echo "<span style='color:red'> Already Applied for this course.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";//jquery:take submit property and disable it....not clickable
} 
}
if(!empty($_POST["cid"])) {//check course id is empty ...otherwise execute it
	$cid= $_POST["cid"];
	
		
		$result =mysqli_query($con,"SELECT * FROM courseenrolls WHERE course='$cid'");//fetch data from courseenrolls where course is equal to course id
		$count=mysqli_num_rows($result);//count the no of rows from coursenroll
		$result1 =mysqli_query($con,"SELECT noofSeats FROM course WHERE id='$cid'");
		$row=mysqli_fetch_array($result1);//fetch the result in form of associated array
		$noofseat=$row['noofSeats'];//assign a locatopn of noof seat in variable noofseat
if($count>=$noofseat)//
{
echo "<span style='color:red'> Seat not available for this course. All Seats Are full</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";//jquery:take submit property and disable it....not clickable
} 
}

?>
