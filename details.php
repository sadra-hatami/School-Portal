
<?php
session_start();//Start new or resume existing session
include('includes/config.php');// includes file as if that code is present here
error_reporting(0);//if error exists it ignore and doesnot show on screen
if(strlen($_SESSION['login'])==0)//takes string from login and check the user enter coreect login details then he redirect to change password page otherwise goto index page
    {   
header('location:index.php');//if username and password is incorrect it goes to the main page
}
else{

if(isset($_POST['submit']))
{
$coursecode=$_POST['coursecode'];//save the data of courcode in variable
$studentname=$_POST['studentname'];//save the data of studentname in variable
$ret=mysqli_query($con,"insert into course(courseCode,studentName,) values('$coursecode','$studentname',)");//insert data into course table and attribute is coursecode and student name
if($ret)//if couse didnot exits it show that student created sucessfully
{
$_SESSION['msg']="student Created Successfully !!";
}
else
{
  $_SESSION['msg']="Error : student not created";
}
}
if(isset($_GET['del']))
      {
              mysqli_query($con,"delete from course where id = '".$_GET['id']."'");//select the course id and delte the specific course from the list
                  $_SESSION['delmsg']="Course deleted !!";
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
<?php if($_SESSION['alogin']!="")//if it is not login it goesto menubar.php
{
 include('includes/menubar.php');
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
                           Enrol student into the Academy Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="coursecode">Course Code  </label>
    <input type="text" class="form-control" id="coursecode" name="coursecode" placeholder="Course Code" required />
  </div>

 <div class="form-group">
    <label for="studentname">student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Student Name" required />
  </div>



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
                                            <th>Course Code</th>
                                            <th>Course Name </th>
                                            <th>Creation Date</th>
                                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from course");//first establish connection and select all the attributes from course table
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['courseCode']);?></td>
                                            <td><?php echo htmlentities($row['courseName']);?></td>
                                            
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
                                            <a href="edit-course.php?id=<?php echo $row['id']?>"><!--this is selected by idand edit the details-->
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a> <!--edit button-->                                       
  <a href="course.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><!--system open a popup that is are you sure to delete it-->
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
