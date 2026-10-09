
<?php
session_start();//Start new or resume existing session
include('includes/config.php');// includes file as if that code is present here
error_reporting(0);//if error exists it ignore and doesnot show on screen
// var_dump($_POST);
if(strlen($_SESSION['login'])==0) //takes string from login and check the user enter coreect login details then he redirect to change password page otherwise goto index page
    {   
header('location:index.php');//directs to the index.php
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );//takes time from internet if connected otherwise take time from the pc clock.


if(isset($_POST['submit']))//if it has value then its submit the form otherwise show error
{
$sql=mysqli_query($con,"SELECT password FROM  staff where password='".md5($_POST['cpass'])."' AND StaffRegno='".$_SESSION['login']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $sql=mysqli_query($con,"update staff set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where StaffRegno='".$_SESSION['login']."'");
$_SESSION['msg']="Password Changed Successfully !!";
$is_red = false;
}
else
{
$_SESSION['msg']="Current Password not match !!";
$is_red = true;
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
    <title>Admin | Staff Password</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" /><!--fetch the style from web called as bootstrap-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" /><!-- decribe the font of website-->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Current Password Filed is Empty !!");//cahnge password and confirm password field is not empty but new password field is empty
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.newpass.value=="")
{
alert("New Password Filed is Empty !!");//cahnge password and new password field is not empty but confirm password is empty
document.chngpwd.newpass.focus();
return false;
}
else if(document.chngpwd.cnfpass.value=="")
{
alert("Confirm Password Filed is Empty !!");//change password and confirm password field is not empty but new passpowrd field is empty.
document.chngpwd.cnfpass.focus();
return false;
}
else if(document.chngpwd.newpass.value!= document.chngpwd.cnfpass.value)
{
alert("Password and Confirm Password Field do not match  !!");//password and confirm password field does not match
document.chngpwd.cnfpass.focus();
return false;
}
return true;//all fields are not empty and confirm and new password is same so thats why it is true
}
</script>
<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper"><!--tag is used as a container for HTML elements - which is then styled with CSS or manipulated with JavaScript. -->
        <div class="container">
              <div class="row"><!--tag is used as a container for HTML elements - which is then styled with CSS or manipulated with JavaScript. -->
                    <div class="col-md-12">
                        <h1 class="page-head-line">Staff Change Password </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading"><!--tag is used as a container for HTML elements - which is then styled with CSS or manipulated with JavaScript. -->
                           Change Password
                        </div>
                        <?php
                        if($is_red){?>
                          <font color="red" align="center">
                          <?php
                        }
                        else{?>
                          <font color="green" align="center">
                        <?php
                        }
                        
                        ?>
<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font><!--Convert all applicable characters to HTML entities..-->


                        <div class="panel-body">
                       <form name="chngpwd" method="post" onSubmit="return valid();">
   <div class="form-group">
    <label for="exampleInputPassword1">Current Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="cpass" placeholder="Password" />
  </div>
   <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="newpass" placeholder="Password" />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword3" name="cnfpass" placeholder="Password" />
  </div>
 
  <button type="submit" name="submit" class="btn btn-default">Submit</button>
                           <hr />
						    <hr />
   



</form>
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
