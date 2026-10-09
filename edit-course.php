
<?php
session_start();//Start new or resume existing session
error_reporting(0);//if error exists it ignore and doesnot show on screen
include('includes/config.php');// includes file as if that code is present here
if(strlen($_SESSION['login'])==0)//takes string from login and check the user enter coreect login details then he redirect to change password page otherwise goto index page
    {   
header('location:index.php');//if login details are wrong directs to the index file
}
else{
$id=intval($_GET['id']);//An associative array of variables passed to the current script via the URL parameters.
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );//time is taken from internet or your pc
if(isset($_POST['submit']))
{
  $coursecode=$_POST['coursecode'];//takes value of string and save in the coursecode
  $coursename=$_POST['coursename'];
  $sessionname=$_POST['sessionname'];
  $semestername=$_POST['semestername'];

$ret=mysqli_query($con,"update student set courseCode='$coursecode',courseName='$coursename',sessionName='$sessionname',semesterName='$semestername' ,updationDate='$currentTime' where id='$id'");
if($ret)
{
$_SESSION['msg']="Course Updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Course not Updated";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" /><!--The charset attribute specifies the character encoding for the HTML document.-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /><!--Fix the website according to the device-->
    <meta name="description" content="" /><!-- show the description of wesite -->
    <meta name="author" content="" /><!--show the name of author who create the website....such as Designed by Shivam-->
    <title>student| enrollment| Course</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" /><!--fetch the style from web called as bootstrap-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" /><!-- decribe the font of website-->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")//if teacher logins sucessfully
{
 include('includes/menubar.php');//goes to menubar
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"> Language Course  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">

<form name="dept" method="post">
<?php
$sql=mysqli_query($con,"select * from student where id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
  $courseName = $row['courseName'];
  $semesterName = $row['semesterName'];
  
?>
<p><b>Last Updated at</b> :<?php echo htmlentities($row['updationDate']);?></p><!--updationDate is converted into html tag--> 
   <div class="form-group">
    <label for="coursecode">Course Code  </label>
    
  <span>:</span>
										<select name="coursecode">
                                        <?php
                                            $result = mysqli_query($con, "SELECT * FROM courses");
                                            while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <option value="<?php echo $row['courseName']." ".$row['courseCode'];?>"><?php echo $row['courseName']." ".$row['courseCode'];?></option>
                                            <?php
                                            }
                                            ?>
										</select>
  </div>
 <div class="form-group">
    <label for="coursename">Student Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" value="<?php echo htmlentities($courseName);?>" required /><!--here required means this field is not empty-->
  </div>
<div class="form-group">
    <label for="sessionname">Session  </label>
    <!-- <input type="text" class="form-control" id="sessionname" name="sessionname" placeholder="Session Name" required /> -->
    
    <select class="form-control" id="sessionname" name="sessionname">
                                        <?php
                                            $result = mysqli_query($con, "SELECT * FROM session");
                                            while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <option value="<?php echo $row['session'];?>"><?php echo $row['session']." ".$row['courseCode'];?></option>
                                            <?php
                                            }
                                            ?>
										</select>
  
  </div>
  <div class="form-group">
    <label for="semestername">Semester  </label>
    <select class="form-control" id="sessionname" name="semestername">
                                        <?php
                                            $result = mysqli_query($con, "SELECT * FROM semester LIMIT 0, 2");
                                            while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <option value="<?php echo $row['semester'];?>"><?php echo $row['semester']." ".$row['courseCode'];?></option>
                                            <?php
                                            }
                                            ?>
										</select>
   </div>


<!-- <div class="form-group">
    <label for="seatlimit">Seat no  </label>
    <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Seat no" required />
  </div>    -->
  <?php } ?>
  <button type="submit" name="submit" class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                
            </div>





        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
