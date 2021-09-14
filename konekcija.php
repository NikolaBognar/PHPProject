<?php
function konektuj(){ 
	$kon = mysqli_connect("localhost","root","","stolarija");


	
	if(!$kon)
	{
		die("Konekcija nije uspela". mysqli_connect_error($kon));
	}
	return $kon;
}
?>

