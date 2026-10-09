
<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$extra="change-password.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
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
            document.getElementById('cancel-admin-signin').addEventListener('click', hide_all_modal_windows);
			document.getElementById('cancel-student-signin').addEventListener('click', hide_all_modal_windows);
            document.getElementById('cancel-join').addEventListener('click', hide_all_modal_windows);
            document.getElementById('student_only').style.display = 'none';  
            
            <?php
                if (isset($display_type))
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
	<img class='header-image top-margin' src='img/gradester-logo.png' style="width: 270px; height:auto"/>
    
    
	<div class="container">
  <div class="row top-margin">
    <div class="col-md-6">
	 
    
    </div>
    <div class="col-md-36">
     <img style="float:right;" id='menu-student-signin' src='img/admin-home-image.png' />
    </div>
  </div>  
		<div class="row">
    <div class="col-md-36">
	
	  
    </div>
   
  </div>  
</div>
	 <div id='blanket'>
    </div>
	<!-- ############################# TEACHER LOGIN MODAL ############################# -->
	<span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <div class="bg-img">
			<form name="admin" method="post"> 
			<div class="container">
			
    <div id='student-signin' class='modal-window'> 
    <div class="row">
      <div class="col-md-5"> 
      <img src="img/student.png" style="max-width:19%">
	  <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
	  
      </div>
      <div class="col-md-17">
	  <div class="col-md-12">
             
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Username : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control" required />
						<hr>
						<button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                        
						
                        <button type="cancel" class="btn btn-info" id='cancel-admin-signin'><span class="glyphicon glyphicon-remove" ></span> cancel </button>&nbsp;
						
                
</div>
                </form>
				
				
                
    <!-- CONTENT-WRAPPER SECTION END-->
    
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script>
    document.getElementById('cancel-admin-signin').addEventListener('click', hide_all_modal_windows);
    </script>
</body>
</html>
