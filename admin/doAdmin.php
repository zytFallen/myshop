<?php
function logout() {
   $_SESSION=array();
   if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(),"",time()-1);
   }
   echo"<script>alert('注销成功！');window.location.href='login.php'</script>";
   session_destroy();   
}
$act=$_REQUEST['act'];
if($act=="logout"){
    logout();
}