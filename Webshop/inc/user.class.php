<?php
function user_info($userid, $info) {
	$query = "SELECT * FROM `users` WHERE `id` = $userid";
	$result = $mysqli->query($query);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row[$info];
}
