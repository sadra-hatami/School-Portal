
<?php
session_start();//Start new or resume existing session
include('includes/config.php');// includes file as if that code is present here
error_reporting(0);//if error exists it ignore and doesnot show on screen
if(strlen($_SESSION['login'])==0) //takes string from login and check the user enter coreect login details then he redirect to change password page otherwise goto index page
    {   
header('location:index.php'); //if login details are wrong directs to the index file
}
else{

if(isset($_POST['submit']))
{
$coursecode=$_POST['coursecode'];//takes value of string and save in the coursecode
$coursename=$_POST['coursename'];
$sessionname=$_POST['sessionname'];
$semestername=$_POST['semestername'];

$seatlimit=$_POST['seatlimit'];
$ret=mysqli_query($con,"insert into student(courseCode,courseName,sessionName,semesterName,noofSeats) values('$coursecode','$coursename','$sessionname','$semestername','$seatlimit')");//it will create a new course
if($ret)
{
$_SESSION['msg']=" Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error :  not created";//if not made give error
}
}
if(isset($_GET['del']))//if you press delete button
      {
              mysqli_query($con,"delete from student where id = '".$_GET['id']."'");//it will take id and delete the row from the database
                  $_SESSION['delmsg']=" deleted !!";//after deleted it will show message
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
<?php if($_SESSION['login']!="")//if teacher logins sucessfully
{
 include('includes/menubar.php');//goes to menu bar
}
 ?>
    <!-- MENU SECTION END-->
    <!--these div classes are part of css-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"> student| enrollment </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           student| enrollment Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                        <form name="dept" method="post">
   <div class="form-group">
    <label for="coursecode">Course  </label>
    
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
                                        <!--here these lines firstly establish a connection with localhost and fetch the result in the form of arraywhere coursecode are shown in the
                                        form of array with the  attributes named as course name -->
  </div>
 <div class="form-group">
    <label for="coursename">Student Name  </label>
    <input type="text" class="form-control" id="coursename" name="coursename" placeholder="Student Name" required />
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
  <!--this code will show thr seesion name with course code-->
  </div>
  <div class="form-group">
    <label for="semestername">Semester  </label>
    <!-- <input type="text" class="form-control" id="semestername" name="semestername" placeholder="Semester Name" required /> -->
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

 <button type="submit" name="submit" class="btn btn-default">Submit</button>
</form>
                            </div>
                            </div>
                    </div>
                  
                </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead><!--table head-->
                                        <tr><!--table row-->
                                            <th>#</th><!--header cell in an HTML table.-->
                                            <th>Course</th>
                                            <th>Student Name </th>
                                           <th>Session  </th>
										   <th>Semester</th>
                                            <!-- <th>Seat no</th> -->
                                             <th>Creation Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from student");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['courseCode']);?></td><!--convert course code into html attribute-->
                                            <td><?php echo htmlentities($row['courseName']);?></td>
											<td><?php echo htmlentities($row['sessionName']);?></td>
											<td><?php echo htmlentities($row['semesterName']);?></td>
                                            
                                             <!-- <td><?php //echo htmlentities($row['noofSeats']);?></td> -->
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
											<style="color:blue;margin-right: 11px"><?php echo $row2['count(noofSeats)']; ?></span></span>
											
                                            <td>
											<a href="edit-course.php?id=<?php echo $row['id']?>">
                                            <button class="btn btn-danger">Edit</button>
</a>
                                       
  <a href="course.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
</a>
                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
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
