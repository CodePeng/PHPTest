<?php
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $file ='/Users/pengzhou/private/filetest.txt';
} else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
    $file ='/home/users/web/b1060/ipg.codepengcom/private/filetest.txt';
}


// get the contents of the file
$contents = @file_get_contents($file);
if ($contents === false) {
    echo 'Sorry, there was a problem reading the file.';
} else {
    echo getFirstWords($contents, 4);
}


function getFirstWords($string, $number) {
    $words = explode(' ', $string);
    $first = array_slice($words,0,$number);
    return implode(' ', $first);
}
