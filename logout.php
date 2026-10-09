<?php
session_start();//Start new or resume existing session
include("includes/config.php");// includes file as if that code is present here
$_SESSION['login']=="";//takes string from login and check the user enter coreect login details then he redirect to change password page otherwise goto index page
date_default_timezone_set('Asia/Kolkata');//set time zone
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE studentRegno = '".$_SESSION['login']."' ORDER BY id DESC LIMIT 1");//here he will logout from the session where he login
session_unset();//reset the session
$_SESSION['errmsg']="You have successfully logout";
?>
<script language="javascript">
document.location="index.php";
</script>
