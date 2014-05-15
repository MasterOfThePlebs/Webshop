<?php
session_start();
require_once './inc/config.php';
require_once './theme/header.php';
require_once './inc/user.class.php';


if(isset($_POST[submit])) {
	
	$query = "SELECT `username`, `password`, `id`, `admin` FROM `users` WHERE `username` like '$_POST[username]' AND `password` = '$_POST[password]'";
	$result = $mysqli->query($query);
	
	if($result->num_rows == 1) {
		$_SESSION['loggedin'] = true;
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$_SESSION['userid'] = $row['id'];
		$_SESSION['isAdmin'] = $row['admin'];
		header('Location: index.php');
	}else{
		$output = "Forkert brugernavn eller kodeord";
	}
	echo $output;
	
}
?>
<h2>Indtast dine bruger detaljer</h2>
<form action="login.php" method="post">
	<input type="text" name="username" placeholder="Indtast brugernavn">
    <input type="password" name="password" placeholdeR="Indtast kodeord">
    <input type="submit" name="submit">
</form>
<?php
require_once './theme/header.php';
?>