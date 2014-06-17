<?php
include('./includes/title.inc.php');
require_once('./includes/connection.inc.php');
$conn = dbConnect('read');
$sql = 'SELECT filename, caption FROM images';
// submit the query
$result = $conn->query($sql) or die(mysqli_error());
// extract the first record as an array
$row = $result->fetch_assoc();
// get the name and caption for the main image
if (isset($_GET['image'])) {
    $mainImage = $_GET['image'];
} else {
    $mainImage = $row['filename'];
}
// get the dimensions of the main image
$imageSize = getimagesize('images/'.$mainImage);
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Japan Journey
        <?php if (isset($title)) {echo "&#8212;{$title}";} ?>
    </title>
    <link href="styles/journey.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
<div id="header">
    <h1>Japan Journey </h1>
</div>
<div id="wrapper">
    <?php include('./includes/menu.inc.php'); ?>
    <div id="maincontent">
        <h2>Images of Japan</h2>
        <p id="picCount">Displaying 1 to 6 of 8</p>
        <div id="gallery">
            <table id="thumbs">
                <tr>
                    <!--This row needs to be repeated-->
                    <?php do {
                        // set caption if thumbnail is same as main image
                        if ($row['filename'] == $mainImage) {
                            $caption = $row['caption'];
                        }?>
                    <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?image=<?php echo $row['filename']; ?>"><img src="images/thumbs/<?php echo $row['filename']; ?>" alt="<?php echo $row['caption']; ?>" width="80" height="54"></a></td>
                    <?php } while($row = $result->fetch_assoc()); ?>
                </tr>
                <!-- Navigation link needs to go here -->
            </table>
            <div id="main_image">
                <p><img src="images/<?php echo $mainImage; ?>" alt="" width="350" height="237"></p>
                <p>Water basin at Ryoanji temple, Kyoto</p>
            </div>
        </div>
    </div>
    <?php include('./includes/footer.inc.php'); ?>
</div>
</body>
</html>