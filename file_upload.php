<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
// set the maximum upload size in bytes
$max = 5120000; //5MB
if (isset($_POST['upload'])) {
    // define the path to the upload folder
    if ($_SERVER['SERVER_NAME'] == 'localhost') {
        $destination = '/Users/pengzhou/upload_test/';
    } else if ($_SERVER['SERVER_NAME'] == 'codepeng.com') {
        $destination = '/home/users/web/b1060/ipg.codepengcom/upload_test/';
    }
    // move the file to the upload folder and rename it
    $isUploaded = move_uploaded_file($_FILES['image']['tmp_name'], $destination . $_FILES['image']['name']);
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8">
    <title>Upload File</title>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
    <p>
        <label for="image">Upload image:</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max; ?>">
        <input type="file" name="image" id="image">
    </p>

    <p>
        <input type="submit" name="upload" id="upload" value="Upload">
    </p>
</form>
<pre>
<?php
if (isset($_POST['upload'])) {
    print_r($_FILES);
}

if (isset($isUploaded) && $isUploaded == true) {
    echo 'Uploaded';
} else {
    echo 'failed';
}
?>
</pre>
</body>
</html>