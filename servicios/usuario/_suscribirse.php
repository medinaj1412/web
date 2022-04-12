<?php
	$response=new stdClass();
	if ($_POST['nomusu']=="" ||
		$_POST['dirusu']=="" ||
		$_POST['celusu']=="" ||
		$_POST['corusu']=="" ||
		$_POST['conusu']=="") {
		$response->state=false;
		$response->detail="Complete todos los campos";
	}else{
		if ($_POST['aceptar']=="false") {
			$response->state=false;
			$response->detail="Debe aceptar las condiciones de uso";
		}else{
			$response->state=true;
			$response->detail="Correo enviado, en breve nos contactaremos con usted";
		}
	}

	echo json_encode($response);