<?php
include 'core/kernel.php';
// Si ya tiene una sesión abierta, lo mandamos atrás
if(isset($_SESSION['username'])){ header("Location: " . WEB_RUTA . "/comprar"); }

// Para checkear si se logea
if(isset($_POST['loginS'])){
  if(!isset($_POST['loginUser'])){ echo "4"; return false; }
  if(!isset($_POST['loginPassword'])) { echo "5"; return false; }
  $_POST["loginUser"] = cleanValue($_POST["loginUser"]);
  $_POST["loginPassword"] = cleanValue($_POST["loginPassword"]);
  if(loginUser($_POST['loginUser'],hashp($_POST['loginPassword'] ) ) ) ;{
    header("Location: /comprar");
  }
    header("Location: login?error=1");
}
// Google ReCaptchap

$response = isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:'';
$secret = '6Lda7FwUAAAAAPcbkJ9B7SJJjdbH_umUsGVZ4ZJ5';
$remoteip = isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'';
if($response != ''){
    $post_fields = array('response' => $response,'secret'=>$secret,'remoteip'=>$remoteip);
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $server_output = curl_post($url,$post_fields);   
    if($server_output->success === true){
    }
    else{
      header("Location: login?captcha=1");
    }
}

function curl_post($url,$post_fields){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($post_fields));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return json_decode($server_output);
}

// End Google Recaptcha

// Para checkear si se registra
if(isset($_POST['registerS'])) {
  if (!isset($_POST['registerEmail'])
  || is_null($_POST['registerEmail'])) { header("Location: login?error=1"); return false; } // email vacío
  if (!isset($_POST['registerPass'])
  || is_null($_POST['registerPass'])) { header("Location: login?error=1"); return false; } // primera pass vacía
  if (!isset($_POST['registerPassV'])
  || is_null($_POST['registerPassV'])) { header("Location: login?error=1"); return false; } // segunda pass vacía
  /*if (!isset($_POST['codigoInv'])
  || is_null($_POST['codigoInv'])) { echo '4'; return false; } // codigo de invitación vacío*/
  if (!isset($_POST['registerNumber'])
  || is_null($_POST['registerNumber'])) { header("Location: login?error=1"); return false; } // Numero vacio
  if (strlen($_POST["registerNumber"]) < 7 || strlen($_POST["registerNumber"]) > 12 ){header("Location: login?error=5"); return false;} //Numero de 7 digitos a 12
  if (!isset($_POST['registerUser'])
  || is_null($_POST['registerUser'])) { header("Location: login?error=1"); return false; } // El usuario está vacío
  if ($_POST['registerPass'] != $_POST['registerPassV']) { header("Location: login?error=2"); return false; } // las claves no coinciden
  if (strlen($_POST['registerUser'])>16 || strlen($_POST['registerUser'])<3){ header("Location: login?error=6"); return false;	} // Username cant be less than 5 chars, and more than 16
  if (!preg_match("/^[A-Za-z0-9_]*$/",$_POST['registerUser'])) { header("Location: login?error=3"); return false;	} // Check if username is only numbers and letters
  if (!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL)) { header("Location: login?error=4"); return false;	} // Validate if the mail is valid
  if (registerUser($_POST['registerUser'],$_POST['registerEmail'],$_POST['registerPass'],$_POST['registerNumber']) ){
    loginUser(cleanValue($_POST['registerUser']),hashp($_POST['registerPass']) ) ;
    header("Location: " . WEB_RUTA . "/comprar");
  }
}

inc_header();
?>
<title><?php echo WEB_TITULO; ?> - Acceder</title>
<header>
  <?php inc_navbar();
  $id_error =$_GET['error'];

if ($id_error==1){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, revise los datos!</div>';
}
if ($id_error==2){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, las claves no coinciden!</div>';
}
elseif ($id_error==3){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, solo se permiten letras y numeros en el nombre de usuario!</div>';
}
elseif ($id_error==4){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el correo no es valido!</div>';
}
elseif ($id_error==5){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el numero no es valido!</div>';
}
elseif ($id_error==6){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el nombre de usuario debe tener entre 3 a 16 digitos!</div>';
}
elseif ($id_error==7){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error, el nombre de usuario ya existe!</div>';
}

  $id_captcha =$_GET['captcha'];
  if($id_captcha==1){
echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;¡Ha ocurrido un error revise el captcha!</div>';
}
  ?>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
  
  </style>
</header>
<main>
  <div class="container">
    <br>
    <ul class="nav nav-tabs nav-fill" id="loginTabs" role="tablist">
      <li class="nav-item">
        <a style="color:black" class="btn nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Ingresar</a>
      </li>
      <li class="nav-item">
        <a style="color:black" class="btn nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registrarse</a>
      </li>
    </ul>
    <div class="tab-content" id="loginTabsContent">
    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
      <form class="" action="" method="post">
        <div class="form-group">
          <label for="loginUser">Usuario</label>
          <input type="text" class="form-control" name="loginUser" id="loginUser" aria-describedby="Ayuda usuario" placeholder="Introduce el nombre de usuario" required>
        </div>
        <div class="form-group">
          <label for="loginPassword">Contraseña</label>
          <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Contraseña" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="loginRemember" id="loginRemember">
          <label class="form-check-label" for="loginRemember">Recuérdame</label>
        </div>
        <button type="submit" name="loginS" id="loginS" class="btn btn-primary btn-block">Acceder</button>
      </form>
    </div>

    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="profile-tab">
      <form class="" action="" method="post">
        <div class="form-group">
          <label for="registerUser">Nombre de usuario <small>*</small></label>
          <input type="text" class="form-control" name="registerUser" id="registerUser" aria-describedby="Ayuda usuario" placeholder="Nombre de usuario" required>
        </div>
        <div class="form-group">
          <label for="registerEmail">Dirección e-mail <small>*</small></label>
          <input type="email" class="form-control" name="registerEmail" id="registerEmail" aria-describedby="Ayuda email" placeholder="Correo electrónico" required>
        </div>
        <div class="form-group">
          <label for="registerNumber">Número de teléfono</label>
          <input type="number" class="form-control" name="registerNumber" id="registerNumber" aria-describedby="Ayuda email" placeholder="Número de teléfono" required>
        </div>
        <div class="form-group">
          <label for="registerPass">Contraseña <small>*</small></label>
          <input type="password" class="form-control" name="registerPass" id="registerPass" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
          <label for="registerPassV">Repetir contraseña <small>*</small></label>
          <input type="password" class="form-control" name="registerPassV" id="registerPassV" placeholder="Contraseña" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="registerToS" id="registerToS" required>
          <label class="form-check-label" for="loginRemember">Acepto los <a target="_blank" href="<?php echo WEB_RUTA; ?>/tos">términos de uso y condiciones</a>.</label>
        </div>
        <br>
        <div class="g-recaptcha" data-sitekey="6Lda7FwUAAAAADmyO9GcGfPEfY20c9m7h8P1hz8p"></div>
        <br>
        <button type="submit" name="registerS" id="registerS" class="btn btn-primary btn-block">Registrar</button>
      </form>
    </div>
  </div>
  </div>
</main>
