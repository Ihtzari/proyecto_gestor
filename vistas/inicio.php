<?php
	session_start();

	if(isset($_SESSION['usuario'])){
		include "header.php";
?>

<center><img src="../img/compu.jpg" width="500" alt="300"></center>






<?php 
		include "footer.php";
	} else {
		header("location:../index.php");
	}
?>