<?php
require_once(__DIR__ . '/../libs/Db.php');

$dbh = Db::getHandle();

// add one
$query = "INSERT into visitors VALUES ('ip', 1, null);";
$sth = $dbh->prepare($query)->execute();

// get all result count
$query = "SELECT COUNT(*) as total FROM visitors;";
$sth = $dbh->prepare($query);
$sth->execute();
$result = $sth->fetch();
?>

This page was visited <?php echo $result['total'];?> times!
