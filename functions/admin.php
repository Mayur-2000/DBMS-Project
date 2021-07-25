<?php
	if(!isset($_SESSION['admin']) && $_SESSION['admin'] != true){
		header("Location: plasma_donation.html");
	}
?>