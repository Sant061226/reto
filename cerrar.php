<?php
session_start();
PHP_SESSION_DISABLED;
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Location: index.php");
session_destroy(); 
exit();
?>
