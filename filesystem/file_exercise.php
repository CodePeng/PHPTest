<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Read a Text File into an Array</title>
</head>

<body>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $fileName = '/Users/pengzhou/private/filetest_02.txt';
} else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
    $fileName = '/home/users/web/b1060/ipg.codepengcom/private/filetest_02.txt';
}

// read the file into an array called $users
if (file_exists($fileName) && is_readable($fileName)) {
    $file = fopen($fileName, 'r');
    $contents = fread($file, filesize($fileName));
    fclose($file);
    echo nl2br($contents);
} else {
    echo "Can't open {$fileName}";
}
?>
</body>
</html>