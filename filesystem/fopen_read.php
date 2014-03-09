<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $fileName = '/Users/pengzhou/private/filetest_02.txt';
} else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
    $fileName = '/home/users/web/b1060/ipg.codepengcom/private/filetest_02.txt';
}
// store the pathname of the file
// open the file in read-only mode
$file = fopen($fileName, 'r');
// read the file and store its contents
$contents = fread($file, filesize($fileName));
// close the file
fclose($file);
// display the contents
echo nl2br($contents);