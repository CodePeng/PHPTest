<div id="footer">
<p>&copy; 
<?php
$startYear = 2014;
$thisYear = date('Y');
if ($startYear == $thisYear) {
	echo "{$startYear} ";
} else {
	echo "{$startYear}&#8211;{$thisYear} ";
}
?>
Peng Zhou</p>
</div>