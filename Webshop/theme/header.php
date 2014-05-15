<?php
session_start();
require_once './inc/user.class.php';
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?=$title?></title>
</head>

<body>

	<nav>
        <ul>
            <li><a href="index.php">Produkter</a></li>
            <li>
            	<a href="cart.php">Kurv
                <i class="itemsInCart">(<?php if(!$_SESSION['itemsInCart']) { echo'0'; }else{ echo $_SESSION['itemInCart'];	} ?>)</i></a>
            </li>
            	<?php 
				if($_SESSION['loggedin']) {
				$query = "SELECT * FROM `users` WHERE `id` = $_SESSION[userid]";
				$result = $mysqli->query($query);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				?>
					<li>Velkommen <?=$row['username']?> # <a href="logout.php">Logud</a></li>
                    
				<?php
				}else{
				?>	
                <li><a href="login.php">Log-ind</a></li>
            	<?php } ?>
                <?php 
				if($_SESSION['isAdmin'] == 1) {
				?>
                <li><a href="admin.php">Admin</a></li>
                <?php
				}
				?>
                
            </ul>
    </nav>
    
    <article>