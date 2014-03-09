<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Read a Text File into an Array</title>
</head>

<body>
<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $textFile = '/Users/pengzhou/private/filetest_02.txt';
} else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
    $textFile = '/home/users/web/b1060/ipg.codepengcom/private/filetest_02.txt';
}

// read the file into an array called $users
if (file_exists($textFile) && is_readable($textFile)) {
    $users = file($textFile);
// loop through the array to process each line
    for ($i = 0; $i < count($users); $i++) {
        // separate each element and store in a temporary array
        $tmp = explode(', ', $users[$i]);
        // assign each element of the temporary array to a named array key
        $users[$i] = array('name' => $tmp[0], 'password' => rtrim($tmp[1]));
    }
} else {
    echo "Can't open {$textFile}";
}
?>
<pre>
<?php print_r($users); ?>
</pre>
</body>
</html>