<?php
// set required fields
$required = array('city', 'country');
$firstPage = 'multiple_01.php';
$nextPage = 'multiple_04.php';
$submit = 'next';
require_once('../includes/multiform.inc.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Multiple form 3</title>
</head>

<body>
<?php if (isset($missing)) { ?>
    <p> Please fix the following required fields:</p>
    <ul>
        <?php
        foreach ($missing as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </ul>
<?php } ?>
<form id="form1" name="form1" method="post" action="">
    <p>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
    </p>
    <p>
        <input type="submit" name="next" value="Send details">
    </p>
</form>
</body>
</html>
