<?php
session_start();
include('includes/config.php');

error_reporting(0);
// var_dump($_POST);
if(strlen($_SESSION['login'])==0 or strlen($_SESSION['pcode'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$staffregno=$_POST['staffregno'];
$pincode=$_POST['Pincode'];
$session=$_POST['session'];
$dept=$_POST['department'];
$level=$_POST['level'];
$course=$_POST['course'];
$sem=$_POST['sem'];
$ret=mysqli_query($con,"insert into courseenrolls(staffRegno,pincode,session,department,level,course,semester) values('$staffregno','$pincode','$session','$dept','$level','$course','$sem')");
if($ret)
{
$_SESSION['msg']="Enroll Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Not Enroll";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Language Course Enroll</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Language Course Enroll </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Language Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($con,"select * from staff where StaffRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
<div class="form-group">
    <label for="studentname">Teacher Name  </label>
    <input type="text" class="form-control" id="studentname" name="staffname" value="<?php echo htmlentities($row['staffName']);?>"  readonly/>
  </div>

 <div class="form-group">
    <label for="studentregno">Teacher Reg No   </label>
    <input type="text" class="form-control" id="staffregno" name="staffregno" value="<?php echo htmlentities($row['StaffRegno']);?>"  placeholder="Student Reg no" readonly />
    
  </div>



<div class="form-group">
    <label for="Pincode">Pincode  </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>   

<!-- <div class="form-group">
    <label for="Pincode">Teacher Photo  </label>
   <?php if($row['staffPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['staffPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
 <?php } ?> -->

<div class="form-group">
    <label for="Session">Session  </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select Session</option>   
   <?php 
$sql=mysqli_query($con,"select * from session");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['session']);?></option>
<?php } ?>

    </select> 
  </div> 



<div class="form-group">
    <label for="Department">Department  </label>
    <select class="form-control" name="department" required="required">
   <option value="">Select Depertment</option>   
   <?php 
$sql=mysqli_query($con,"select * from department");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['department']);?></option>
<?php } ?>

    </select> 
  </div> 


<div class="form-group">
    <label for="Level">Level  </label>
    <select class="form-control" name="level" required="required">
   <option value="">Select Level</option>   
   <?php 
$sql=mysqli_query($con,"select * from level");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['level']);?></option>
<?php } ?>

    </select> 
  </div>  

<div class="form-group">
    <label for="Semester">Semester  </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Semester</option>   
   <?php 
$sql=mysqli_query($con,"select * from semester LIMIT 0, 2");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['semester']);?></option>
<?php } ?>

    </select> 
  </div>


<div class="form-group">
    <label for="Course">Course  </label>
    <select class="form-control" name="course" id="course"  required="required">
   <option value="">Select Course</option>   
   <?php 
$sql=mysqli_query($con,"select * from courses");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['courseId']);?>"><?php echo htmlentities($row['courseName']." ".$row['courseCode']);?></option>
<?php } ?>
    </select> 
    <span id="course-availability-status1" style="font-size:12px;">
  </div>




  <!-- <div class="form-group">
    <label for="CourseCode">Course Code</label>
    <select class="form-control" name="course_code" id="course_code" onBlur="courseAvailability()" required="required">
   <option value="">Select Course Code</option>   
   <?php 
$sql=mysqli_query($con,"select * from courses");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities();?></option>
<?php } ?>
    </select> 
    <span id="course-availability-status1" style="font-size:12px;">
  </div> -->

 <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
<script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'cid='+$("#course").val(),
type: "POST",
success:function(data){
$("#course-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


</body>
</html>
<?php } ?>
