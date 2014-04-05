<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
ob_start();
// if sessions variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
  //header('http://' . $_SERVER['HTTP_HOST'] . '/Test/sessions/login.php');
    header("Location: http://{$_SERVER['HTTP_HOST']}/Test/sessions/login.php");
  exit;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset=iso-"utf-8">
<title>Secret menu</title>
</head>

<body>
<h1>Restricted area</h1>
<p><a href="secretpage.php">Another secret page</a> </p>
<?php include('../includes/logout.inc.php'); ?>
</body>
</html>
