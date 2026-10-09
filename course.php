
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$coursecode=$_POST['coursecode'];
$coursename=$_POST['coursename'];
$sessionname=$_POST['sessionname'];
$semestername=$_POST['semestername'];

// $seatlimit=$_POST['seatlimit'];
// $ret=mysqli_query($con,"insert into student(courseCode,courseName,sessionName,semesterName,noofSeats) values('$coursecode','$coursename','$sessionname','$semestername','$seatlimit')");
$ret=mysqli_query($con,"insert into student(courseCode,courseName,sessionName,semesterName) values('$coursecode','$coursename','$sessionname','$semestername')");
if($ret)
{
$_SESSION['msg']=" Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error :  not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from student where id = '".$_GET['id']."'");
                  $_SESSION['delmsg']=" deleted !!";
      }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>student| enrollment| Course</title>
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
  
  </div>
  <div class="form-group">
    <label for="semestername">Semester  </label>
    <select class="form-control" id="semestername" name="semestername">
    <?php
                                            $result = mysqli_query($con, "SELECT * FROM semester");
                                            while($row = mysqli_fetch_array($result)){
                                                ?>
                                                <option value="<?php echo $row['semester'];?>"><?php echo $row['semester'];?></option>
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
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course</th>
                                            <th>Student Name </th>
                                           <th>Session </th>
										   <th>Semester </th>
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
                                            <td><?php echo htmlentities($row['courseCode']);?></td>
                                            <td><?php echo htmlentities($row['courseName']);?></td>
											<td><?php echo htmlentities($row['sessionName']);?></td>
											<td><?php echo htmlentities($row['semesterName']);?></td>
                                            
                                             <!-- <td><?php //echo htmlentities($row['noofSeats']);?></td> -->
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
											<?php echo $row['noofseats']?>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo $row['id']?>">
											
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
