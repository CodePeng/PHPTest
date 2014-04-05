<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$error = '';
if (isset($_POST['login'])) {
    session_start();
//    $username = trim($_POST['username']);
//    $password = sha1($username . $_POST['pwd']);
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    // location of usernames and passwords
    if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] =='PhpStorm 7.1') {
        $userlist = '/Users/pengzhou/private/filetest_02.txt';
    } else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
        $userlist = '/home/users/web/b1060/ipg.codepengcom/private/filetest_02.txt';
    }
    // location to redirect on success
    $redirect = 'http://' . $_SERVER['HTTP_HOST'] . '/Test/sessions/menu.php';
    require_once('../includes/authenticate.inc.php');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
<?php
if ($error) {
    echo "<p>$error</p>";
}
?>
<form id="form1" method="post" action="">
    <p>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </p>
    <p>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd">
    </p>
    <p>
        <input name="login" type="submit" id="login" value="Log in">
    </p>
</form>
</body>
</html>
