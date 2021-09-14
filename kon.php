<?php

//definicija varijabli
$ime_error = $email_error = $tel_error = $naslov_error = "";
$ime = $email = $tel = $poruka = $naslov = $success = "";

//submit metodom POST
if($_SERVER["REQUEST_METHOD"] == "POST"){


//provera polja za ime i prezime
	if(empty($_POST["ime"])){

		$ime_error = "Ime je obavezno.";

	}else{
		$ime = test_input($_POST["ime"]);
		//da li ime sadrzi samo slova i razmake
		if(!preg_match("/^[a-zA-Z]*$/", $ime)){
			$ime_error = "Dozvoljena su samo slova i razmaci.";
		}
	}


//provera unetog email-a
	if(empty($_POST["email"])){

		$email_error = "Email je obavezan.";

	}else{
		$email = test_input($_POST["email"]);
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$email_error = "Los format email-a.";
		}
	}


//provera unetog telefon
	if(empty($_POST["tel"])){

		$tel_error = "Broj telefona je obavezan.";

	}
	else{
		$tel = test_input($_POST["tel"]);	
		if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $tel)){
			$tel_error = "Los format telefona";
		}
	}

//provera polja za naslov
	if(empty($_POST["naslov"])){

		$naslov_error = "Naslov je obavezan.";

	}else{
		$naslov = test_input($_POST["naslov"]);
		//da li ime sadrzi samo slova i razmake
		if(!preg_match("/^[a-zA-Z]*$/", $naslov)){
			$naslov_error = "Dozvoljena su samo slova i razmaci.";
		}
	}

//polje za poruku
	if(empty($_POST["poruka"])){
		$poruka="";
	}else{
		$poruka=test_input($_POST["poruka"]);
	}


	if($ime_error == '' and $email_error == '' and $tel_error == '' and $naslov_error == '' ){
		$poruka_body = '';
		unset($_POST['submit']);
		foreach ($_POST as $key => $value) {
			$poruka_body .= "$key: $value\n";
		}

		ini_set('SMTP', "server.com");
		ini_set('smtp_port', "25");
		ini_set('sendmail_from', "bognarnikola@gmail.com");

		$to = 'bognarnikola@gmail.com';
		$subject = 'Contact Form Submit';
		if(mail("bognarnikola@gmail.com","My subject",$poruka)){
			$success = "Poruka je poslata, hvala sto ste nas kontaktirali.";
			$ime = $email = $tel = $poruka = $naslov = "";

		}
	}

}

function test_input($data){
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>