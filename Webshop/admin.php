<?php
session_start();
require_once './inc/config.php';
if(!$_SESSION['isAdmin']) { exit("DU ER IKKE ADMIN GÅ VÆK FAGGOT"); }
require_once './theme/header.php';
require_once './inc/user.class.php';
if(isset($_POST['action'])) {
	if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	} else {
		echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		echo "Type: " . $_FILES["file"]["type"] . "<br>";
		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "Stored in: " . $_FILES["file"]["tmp_name"];
		$data = file_get_contents($_FILES['file']['tmp_name']);
		$data = base64_encode($data);
		
		echo $data;
		?>
        <img src="data:<?=$_FILES["file"]["type"]?>;base64,<?=$data?>">
        <?php
	}
}
?>
<h2>Tilføj produkter</h2>
<form method="post" action="admin.php" enctype="multipart/form-data">
<input type="hidden" name="action" value="addProduct">
<p>
<strong>Produkt Title: </strong>
<br>
<input type="text" name="title" placeholder="Indtast Titel"></p>
<p>
<strong>Beskrivelse</strong>
<br>
<textarea name="description" placeholder="INDTAST BESKRIVELSE TIL ET PRODUKT HER"> </textarea>
</p>

<p>
<strong>Billede:</strong>
<br>
<input type="file" name="file">
</p>
<p>
<input type="submit" value="Gem">
</p>
</form>

<?php
require_once './theme/header.php';
?>