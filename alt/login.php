<?php
include 'core/kernel.php';
// Si ya tiene una sesión abierta, lo mandamos atrás
if(isset($_SESSION['username'])){ header("Location: " . WEB_RUTA . "/home"); }

// Para checkear si se logea
if(isset($_POST['loginS'])){
  if(!isset($_POST['loginUser'])){ echo "4"; return false; }
  if(!isset($_POST['loginPassword'])) { echo "5"; return false; }
  if(loginUser(cleanValue($_POST['loginUser']),hashp($_POST['loginPassword'])));{
    header("Location: " . WEB_RUTA . "/home");
  }
}
// Para checkear si se registra
if(isset($_POST['registerS'])) {
  if (!isset($_POST['registerEmail'])
  || is_null($_POST['registerEmail'])) { echo '1'; return false; } // email vacío
  if (!isset($_POST['registerPass'])
  || is_null($_POST['registerPass'])) { echo '2'; return false; } // primera pass vacía
  if (!isset($_POST['registerPassV'])
  || is_null($_POST['registerPassV'])) { echo '3'; return false; } // segunda pass vacía
  if (!isset($_POST['codigoInv'])
  || is_null($_POST['codigoInv'])) { echo '4'; return false; } // codigo de invitación vacío
  if (!isset($_POST['registerUser'])
  || is_null($_POST['registerUser'])) { echo '5'; return false; } // El usuario está vacío
  if ($_POST['registerPass'] != $_POST['registerPassV']) { echo '6'; return false; } // las claves no coinciden
  if (strlen($_POST['registerUser'])>16 || strlen($_POST['registerUser'])<5){ echo '7'; return false;	} // Username cant be less than 5 chars, and more than 16
  if (!preg_match("/^[A-Za-z0-9_]*$/",$_POST['registerUser'])) { echo '8'; return false;	} // Check if username is only numbers and letters
  if (!filter_var($_POST['registerEmail'], FILTER_VALIDATE_EMAIL)) { echo '9'; return false;	} // Validate if the mail is valid
  registerUser($_POST['registerUser'],$_POST['registerEmail'],$_POST['registerPass'],$_POST['codigoInv']);
}

inc_header();
?>
<title><?php echo WEB_TITULO; ?> - Acceder</title>
<header>
  <?php inc_navbar(); ?>
</header>
<main>
  <div class="container">
    <ul class="nav nav-tabs nav-fill" id="loginTabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Acceder</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Registrarse</a>
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
          <label for="registerUser">Nombre de usuario</label>
          <input type="text" class="form-control" name="registerUser" id="registerUser" aria-describedby="Ayuda usuario" placeholder="Introduce el nombre de usuario" required>
        </div>
        <div class="form-group">
          <label for="registerEmail">Dirección e-mail</label>
          <input type="email" class="form-control" name="registerEmail" id="registerEmail" aria-describedby="Ayuda email" placeholder="Correo electrónico" required>
        </div>
        <div class="form-group">
          <label for="registerPassword">Contraseña</label>
          <input type="password" class="form-control" name="registerPassword" id="registerPassword" placeholder="Contraseña" required>
        </div>
        <div class="form-group">
          <label for="registerPassV">Repetir contraseña</label>
          <input type="password" class="form-control" name="registerPassV" id="registerPassV" placeholder="Contraseña" required>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" name="registerToS" id="registerToS" required>
          <label class="form-check-label" for="loginRemember">Acepto los <a target="_blank" href="<?php echo WEB_RUTA; ?>/tos">términos de uso y condiciones</a>.</label>
        </div>
        <button type="submit" name="registerS" id="registerS" class="btn btn-primary btn-block">Registrar</button>
      </form>
    </div>
  </div>
  </div>
</main>
<?php inc_footer(); ?>
