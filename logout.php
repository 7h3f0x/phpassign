<?php
if (isset($_COOKIE['user'])) {
unset($_COOKIE['user']);
setcookie('user','',time()-3600,'/');	
}
header("Location: login.php");
?>