<?php
function initDatabase(){
  global $dbcon;
  $dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  if(!$dbcon){
    if(DEBUG){
      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
      die();
    }else{
      die("No se pudo establecer conexión con la base de datos.");
    }
  }
}

function closeDatabase(){
  global $dbcon;
  mysqli_close($dbcon);
}

// Este será la función que usaremos para hashear la clave en texto plano
function hashp($str){
	$salt = HASH_SALT; // El salteo
	$pass = hash('sha256',hash('md5',$salt . $str)); // SALT + PASSWORD -> MD5 -> SHA256
	return $pass;
}

// Para logear a ver que pasa
function loginUser($usr,$pass){
    initDatabase();
    global $dbcon;
		if(strlen($usr) < 1){ echo "1"; return false; }
		if(strlen($pass) < 1){ echo "2"; return false; }
    $q = "SELECT * FROM cr_users WHERE BINARY username = '$usr' AND BINARY password = '$pass'";
    $f = mysqli_query($dbcon,$q);
    if(!$f ||mysqli_num_rows($f)==0){ echo "3"; return false; }
    $userinfo = mysqli_fetch_assoc($f);

    $_SESSION['u_id'] = $userinfo['id'];
    $_SESSION['username'] = $userinfo['username'];
    $_SESSION['u_email'] = $userinfo['email'];
    closeDatabase();
		return true;
}

// Para registrar o algo así
function registerUser($usr,$mail,$pass,$telefono){//,$invco){
	$mail = strtolower($mail);
	$telefono = $telefono;
	if (!is_numeric($telefono) ){echo '15'; return false;}
  	initDatabase();
	global $dbcon;
	$q = "SELECT * FROM cr_users WHERE username = '$usr' OR email = '$mail'";
	$f = mysqli_query($dbcon,$q);
	if(!$f || mysqli_num_rows($f)==0){}else{ header("Location: login?error=7"); return false;	} //The username or mail exists
	//$q = "SELECT * FROM ob_invite_codes WHERE val = '$invco'";
	//$f = mysqli_query($dbcon,$q);
	//if(!$f || mysqli_num_rows($f)==0){ echo '11'; return false; } // No existe el código de invitación

	//if(mysqli_fetch_assoc($f)['usedby'] > 0){ echo '12'; return false; }/* código ya utilizado*/

	$pass = hashp($pass); // hashing password
	$tokenV = hash('md5',HASH_SALT.$usr);
	$q = "INSERT INTO cr_users (email,username,password,tokenv,Telefono) VALUES ('$mail','$usr','$pass','$tokenV','$telefono')";
	if(!mysqli_query($dbcon,$q)){	// Try to insert into database
		echo '13'; // No lo tengo muy claro, vamos a dejarlo en que no se pudo conectar a la db
		return false;
	}

	$q = "SELECT * FROM cr_users WHERE username = '$usr' AND password = '$pass'";
	$f = mysqli_query($dbcon,$q);
	if(!$f ||mysqli_num_rows($f)==0){ echo '14'; return false; } // En realidad esto es imposible, pero nunca se sabe, si te da este error no me avises a mi, llama a los ghost busters
	$userinfo = mysqli_fetch_assoc($f);

	$_SESSION['u_id'] = $userinfo['id'];
	$_SESSION['username'] = $userinfo['username'];
	$_SESSION['u_email'] = $userinfo['email'];

	/*$q = "UPDATE ob_invite_codes SET usedby='" . $userinfo["id"]. "' WHERE val='" . $invco . "'";
	if(mysqli_query($dbcon,$q)){
	}else{
		echo '15';
		return false;
	}
	mkdir(profileRUTA() . $_SESSION['u_id']);*/
	//$q = "INSERT INTO ob_notifications (to_uid,message) VALUES ('" . $userinfo["id"] . "', 'Es necesario confirmar el email para desbloquear la cuenta al 100%.')";
	//mysqli_query($dbcon,$q);
	//echo '0';
	//sendMail($userinfo['email'],"verifyMail",$userinfo['username']);
  closeDatabase();
	return true;
}
?>
