<title>premium</title>
<?php
include 'core/kernel.php';
//require_login();
inc_header();
inc_navbar();
global $dbcon;
?>
<?php
initDatabase();

$usuario = strval($_SESSION['username']);
$consulta="SELECT * FROM cr_users WHERE username='$usuario'";
$resultados=mysqli_query($dbcon,$consulta);
$fila=mysqli_fetch_row($resultados);
if ($fila[2] > 1){
?>

<style>
  .card-img-top{
    border-radius: 4px;
  }
  .card {
  border-radius: 0 !important;
  border: 0 none;
  -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
  -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
  box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
  }
  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    text-align: center;
}
.card-product .img-wrap img {
    max-height: 100%;
    max-width: 100%;
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    /*object-fit: cover;
    min-height: 100%;
    min-width: 100%;
    */
}
.card-product .info-wrap {
    overflow: hidden;
    padding: 15px;
    border-top: 1px solid #eee;
}
.card-product .bottom-wrap {
    padding: 15px;
    border-top: 1px solid #eee;
}

.label-rating { margin-right:10px;
    color: #333;
    display: inline-block;
    vertical-align: middle;
}

.card-product .price-old {
    color: #999;
}
body{
  background-color: #d4f9f6;
}
</style>
<div class="container">
<div class="row" style="padding:2%;">

<?php
$consulta2 = "SELECT * FROM cr_puestos";
$resultado2 = mysqli_query($dbcon,$consulta2);
while(($fila2=mysqli_fetch_row($resultado2))==true){

?>
<div class="col-md-4">
  <figure class="card card-product bottom-wrap img-wrap">
    <figcaption class="info-wrap">
        <h4 class="title"><?php if (strlen($fila2[1]) > 0) {echo $fila2[1];} ?></h4>
        <p class="desc"><?php if (strlen($fila2[2]) > 0) {echo 'Direccion: '.$fila2[2];} ?></p>
        <p class="desc"><?php if (strlen($fila2[3]) > 0) {echo 'Telefono: '.$fila2[3];} ?></p>
        <p class="desc"><?php if (strlen($fila2[4]) > 0) {echo 'Departamento: '.$fila2[4];} ?></p>
        <p class="desc"><?php if (strlen($fila2[5]) > 0) {echo 'Localidad: '.$fila2[5];} ?></p>
    </figcaption>
  </figure>
</div>
<?php
}
?>

</div>
</div>

<?php
}
else
{
?>

<style>

body{
background-color: #61D7B5; /* fallback for old browsers */
    }

.jumbotron{
background: #d53369; /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #d53369 , #cbad6d); /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #d53369 , #cbad6d); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
box-shadow: 5px 5px 10px black;
margin-right: auto;
margin-left: auto;
margin-top: 1%;
    }
.jumbotron  {
    width: 95%;
    border-radius: 10px;
    padding: 3%;
    
  }
    
.highlight img {
    
    float: left;
    width: 100px;
    height: 100px; 
    margin: 10px;
    }
    
.highlight ul {
    list-style-image: url('http://icons.iconarchive.com/icons/yusuke-kamiyamane/fugue/16/tick-small-icon.png');
    margin-left: 1%;
    float: left; 
    clear: right
    }
    
.highlight button {

    }

.highlight h1,h2,h3,h4,h5,h6 {
    padding-bottom: 2%;
  border-bottom: 2px dashed rgba(255, 255, 255, 0.41);
    font-size:20px;
    text-align : center;
    text-transform: uppercase;
    }
    
.highlight p {
  text-align:center;
    }
</style>

</header>
<main>

<div class="jumbotron">

<div class=" highlight">
<h2>Beneficios premium</h2>
  <div class="row">
  
    
        <img src ="/public/img/logo.png" /> 
        <ul>
            <li>Lista de puestos con direccion y telefono (cada semana se agregaran 30)</li>
            <li>La mitad del precio pagado se le otorgara en monedas.</li>
            <li>Una mejor disposición en la busqueda de productos.</li>
            <li>Un 20% de descuento al comprar CR's.</li>
            <li>Cantidad y durabilidad de publicaciones ilimitadas.</li>
           
        </ul>
        </div>
        <br>
        <p>Por mas informacion contacte a: comercioruralcontacto@gmail.com</p>
        <p>o contacte al telefono 098124750
    </div>
  </div>
<?php
}

closeDatabase();
?>