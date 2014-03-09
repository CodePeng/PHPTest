<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $fileName = '/Users/pengzhou/private/filetest_03.txt';
} else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
    $fileName = '/home/users/web/b1060/ipg.codepengcom/private/filetest_03.txt';
}
// if the form has been submitted, process the input text
if (isset($_POST['putContents'])) {
  // open the file in write-only mode
  $file = fopen($fileName, 'w');
  // write the contents
  fwrite($file, $_POST['contents']);
  // close the file
  fclose($file);
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Write only</title>
</head>

<body>
<form id="writeFile" name="writeFile" method="post" action="">
    <p>
        <label for="contents">Write this to file:</label>
        <textarea name="contents" cols="40" rows="6" id="contents"></textarea>
    </p>
    <p>
        <input name="putContents" type="submit" id="putContents" value="Write to file">
    </p>
</form>
</body>
</html>
