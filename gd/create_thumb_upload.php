<?php
//namespace Ps2;

error_reporting(E_ALL);
ini_set('display_errors', '1');
if (isset($_POST['upload'])) {
    require_once('../classes/Ps2/ThumbnailUpload.php');
    try {
        if ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] =='PhpStorm 7.1') {
            $upload = new Ps2_ThumbnailUpload('/Users/pengzhou/upload_test/');
            $upload->setThumbDestination('/Users/pengzhou/upload_test/thumbs/');
        } else if ($_SERVER['SERVER_NAME'] == 'codepeng.com' || $_SERVER['SERVER_NAME'] == 'www.codepeng.com') {
            $upload = new Ps2_ThumbnailUpload('/home/users/web/b1060/ipg.codepengcom/upload_test/');
            $upload->setThumbDestination('/home/users/web/b1060/ipg.codepengcom/upload_test/thumbs/');
        }
        $upload->move();
        $messages = $upload->getMessages();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset=utf-8">
    <title>Multiple Upload</title>
</head>

<body>
<?php
if (isset($messages) && !empty($messages)) {
    echo '<ul>';
    foreach ($messages as $message) {
        echo "<li>$message</li>";
    }
    echo '</ul>';
}
?>
<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
    <p>
        <label for="image">Upload images (multiple selections permitted):</label>
        <input type="file" name="image[]" id="image" multiple>
    </p>

    <p>
        <input type="submit" name="upload" id="upload" value="Upload">
    </p>
</form>
</body>
</html>