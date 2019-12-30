
<?php
session_start();
unset($_SESSION['username']);

session_destroy();

header("location:/final_version/first_page.php");

?>