
<?php
session_start();
session_destroy();
setcookie("cookie", "", time()-1);
header("Location: login.php");?>