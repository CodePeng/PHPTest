<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require_once('../includes/connection.inc.php');
// connect to MySQL
//$conn = new mysqli("localhost", "zpzp1988", "12995025", "phpsols");
$conn = dbConnect('read');
// prepare the SQL query
$sql = 'SELECT * FROM images';
// submit the query and capture the result
$result = $conn->query($sql) or die($conn->errorCode());
// find out how many records were retrieved
$numRows = $result->num_rows;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Connecting with MySQLi</title>
</head>

<body>
<p>A total of <?php echo $numRows; ?> records were found.</p>
<table>
    <tr>
        <th>image_id</th>
        <th>filename</th>
        <th>caption</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['image_id']; ?></td>
            <td><?php echo $row['filename']; ?></td>
            <td><?php echo $row['caption']; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>