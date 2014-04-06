<?php
if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['pwd']);
    $retyped = trim($_POST['conf_pwd']);
    if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] =='PhpStorm 7.1') {
        $userfile = '/Users/pengzhou/private/encrypted.txt';
    } else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
        $userfile = '/home/users/web/b1060/ipg.codepengcom/private/encrypted.txt';
    }
    require_once('../includes/register_user_text.inc.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Register User</title>
<style>
label {
	display:inline-block;
	width:115px;
	text-align:right;
	padding-right:2px;
}
input[type="submit"] {
	margin-left:122px;
}
</style>
</head>

<body>
<h1>Register User</h1>
<?php
if (isset($errors) || isset($result)) {
    echo '<ul>';
    if (!empty($errors)) {
        foreach ($errors as $item) {
            echo "<li>$item</li>";
        }
    } else {
        echo "<li>$result</li>";
    }
    echo '</ul>';
}
?>
<form action="" method="post" id="form1">
  <p>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="pwd">Password:</label>
    <input type="password" name="pwd" id="pwd">
  </p>
  <p>
    <label for="conf_pwd">Retype Password:</label>
    <input type="password" name="conf_pwd" id="conf_pwd">
  </p>
  <p>
    <input type="submit" name="register" id="register" value="Submit">
  </p>
</form>
</body>
</html>