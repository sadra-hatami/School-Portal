<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
  var_dump($_POST);
$staffname=$_POST['studentname'];
if($_FILES["photo"]["name"]!=""){//it will uplaod the pic on database
  $photo=$_FILES["photo"]["name"];
  move_uploaded_file($_FILES["photo"]["tmp_name"],"staffphoto/".$_FILES["photo"]["name"]);//photo will move to temp folder
  $ret1=mysqli_query($con,"update staff set staffPhoto='$photo'  where StaffRegno='".$_SESSION['login']."'");

}

$ret2=mysqli_query($con,"update staff set staffName='$staffname' where StaffRegno='".$_SESSION['login']."'");


if($ret1 || $ret2)//if both condtions are true then it will show a message that record updated sucessfully
{
$_SESSION['msg']=" Record updated Successfully !!";
}
else
{
  $_SESSION['msg']="Error :  Record not update";
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
    <title>Teacher Profile</title>
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
                        <h1 class="page-head-line">Teacher Registration  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Teacher Registration
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($con,"select * from staff where StaffRegno='".$_SESSION['login']."'");//this will take all information from the staffno
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Teacher Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['staffName']);?>"  />
  </div>

 <div class="form-group">
    <label for="studentregno">Teacher Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StaffRegno']);?>"  placeholder="Staff Reg no" readonly />
    
  </div>



<div class="form-group">
    <label for="Pincode">Pincode  </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>   

 


<div class="form-group">
    <label for="Pincode">Staff Photo  </label>
   <?php if($row['staffPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="staffphoto/<?php echo htmlentities($row['staffPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
<div class="form-group">
    <label for="Pincode">Upload New Photo  </label>
    <input type="file" class="form-control" id="photo" name="photo"  value="<?php echo htmlentities($row['staffPhoto']);?>" />
  </div>


  <?php } ?>

 <button type="submit" name="submit" id="submit" class="btn btn-default">Update</button>
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


</body>
</html>
<?php } ?>
