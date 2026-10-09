
<?php
session_start();//Start new or resume existing session
include('includes/config.php');// includes file as if that code is present here
error_reporting(0);//if error exists it ignore and doesnot show on screen
if(strlen($_SESSION['login'])==0)//takes string from login and check the user enter coreect login details then he redirect to change password page otherwise goto index page
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
    
    
$coursecode=$_POST['coursecode'];
$coursename=$_POST['coursename'];

$seatlimit=$_POST['seatlimit'];
if($_GET['del']=='edit')
      {
              mysqli_query($con,"UPDATE `marks` SET `courseCode`='$coursecode',`courseName`='$coursename',`noofSeats`=$seatlimit WHERE id = ".$_GET['id']);
                  $_SESSION['delmsg']=" Edited !!";
      }
else{
    $ret=mysqli_query($con,"insert into marks(courseCode,courseName,noofSeats) values('$coursecode','$coursename','$seatlimit')");
    if($ret)
    {
    $_SESSION['msg']=" Created Successfully !!";
    }
    else
    {
    $_SESSION['msg']="Error :  not created";
    }
}
}

if($_GET['del']=='delete')
    {
              mysqli_query($con,"delete from marks where id = '".$_GET['id']."'");
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
                        <h1 class="page-head-line"> Student| course | marks </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Student| Course | marks
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="coursecode">Course  </label>
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
    <label for="seatlimit">Average Marks  </label>
    <input type="text" class="form-control" id="seatlimit" name="seatlimit" placeholder="Average " required />
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
                            Manage Course Marks
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            <th>Student Name </th>
                                           
                                            <th>Average marks</th>
                                             <th>Creation Date</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select * from marks");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['courseCode']);?></td>
                                            <td><?php echo htmlentities($row['courseName']);?></td>
                                            
                                             <td><?php echo htmlentities($row['noofSeats']);?></td>
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
     
  <a href="marks.php?id=<?php echo $row['id']?>&del=edit" onClick="return confirm('Are you sure you want to edit?')">
    <button class="btn btn-danger">Edit</button>  
    <a href="marks.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to Delete?')">
    <button class="btn btn-danger">Delete</button>                                          
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
