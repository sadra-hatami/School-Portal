<?php
session_start();//Start new or resume existing session

error_reporting(0);
include("includes/config.php"); // includes file as if that code is present here
if(isset($_POST['submit'])) //checks if passes variable exists
{

    $regno=$_POST['regno'];
    $password=md5($_POST['password']); // md5 creates 128-bit hash string unique for every unique string
$query=mysqli_query($con,"SELECT * FROM staff WHERE StaffRegno='$regno' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="change-password.php";
// setting up session variables
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['staffRegno'];
$_SESSION['sname']=$num['staffName'];
$uip=$_SERVER['REMOTE_ADDR']; // tells us server remote address
$status=1; // successfull login
$log=mysqli_query($con,"insert into userlog(staffRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$host=$_SERVER['HTTP_HOST']; // returns host name
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\'); // removes directed characters from string
header("location:http://$host$uri/$extra");
exit(); // stops execution of script
}
else
{
$_SESSION['errmsg']="Invalid Teacher ID or Password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>


<!DOCTYPE html>

<html>
<head>
    <title>LANGUAGE ACADEMY INFORMATION SYSTEM PORTAL</title>	
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <script>
        window.addEventListener('load', function() {
            document.getElementById('menu-student-signin').addEventListener('click', show_student_signin_modal_window);
			document.getElementById('menu-teacher-signin').addEventListener('click', show_teacher_signin_modal_window);
            document.getElementById('menu-join').addEventListener('click', show_join_modal_window);
            document.getElementById('blanket').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-teacher-signin').addEventListener('click', hide_all_modal_windows);
			document.getElementById('cancel-student-signin').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-join').addEventListener('click', hide_all_modal_windows);
            // document.getElementById('student_only').style.display = 'none';
            
            <?php
                if (isset($display_type)) // tells if we want to sign in or join
                    if ($display_type == 'signin')
                        echo 'show_signin_modal_window();';
                    else if ($display_type == 'join')
                        echo 'show_join_modal_window();';
                    else
                        ;
            ?>
        });
        function show_student_signin_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('student-signin').style.display = 'block';
        }
		function show_teacher_signin_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('teacher-signin').style.display = 'block';
        }			
        function show_join_modal_window() {
            document.getElementById('blanket').style.display = 'block';
            document.getElementById('join').style.display = 'block';
        }
        function hide_all_modal_windows() {
            document.getElementById('blanket').style.display = 'none';
            document.getElementById('student-signin').style.display = 'none';
			document.getElementById('teacher-signin').style.display = 'none';
            document.getElementById('join').style.display = 'none';
        }
    </script>

    
</head>

<body>
<img class='header-image top-margin' src='img/gradester-logo.png' style="width: 270px; height:auto" />
    
    
	<div class="container">
  <div class="row top-margin">
    <div class="col-md-6">
	 
    
    </div>
    <div class="col-md-36">
     <img style="float:right;" id='menu-student-signin' src='img/student-home-image1.png' />
     
	 
    </div>

  </div>  
		<div class="row">
    <div class="col-md-36">
	  
    </div>
   
  </div>  
</div>
	 <div id='blanket'>
    </div>
    <!-- ############################# STUDENT LOGIN MODAL ############################# -->
	
            <div class="bg-img">
			<form name="admin" method="post"> 
			<div class="container">
			
    <div id='student-signin' class='modal-window'> 
    <div class="row">
      <div class="col-md-5"> 
      <img src="img/student.png" style="max-width:19%">
	  <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
      </div>
      <div class="col-md-7">
	  <div class="col-md-6">
                     <label>Enter your Teacher ID: </label>
                        <input type="text" name="regno" class="form-control"  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr/>
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                <hr>
				
				<button type="cancel" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-remove"></span> &nbsp;cancel </button>&nbsp;
				</div>
  </form>
</div>


</body>
</html>

    