<?php
function dbConnect($usertype, $connectionType = 'mysqli') {
    if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] =='PhpStorm 7.1') {
        $host = 'localhost';
    } else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
        $host = 'codepengcom.ipagemysql.com';
    }
  $db = 'phpsols';
  if ($usertype  == 'read') {
	$user = 'zpzp1988';
	$pwd = '12995025';
  } elseif ($usertype == 'write') {
	$user = 'zpzp1988';
	$pwd = '12995025';
  } else {
	exit('Unrecognized connection type');
  }
    return new mysqli($host, $user, $pwd, $db);
  if ($connectionType == 'mysqli') {
	// return new mysqli($host, $user, $pwd, $db) or die ('Cannot open database'); Don't use like that, or it have problem
      return new mysqli($host, $user, $pwd, $db);
  } else {
    try {
      return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
    } catch (PDOException $e) {
      echo 'Cannot connect to database';
      exit;
    }
  }
}
