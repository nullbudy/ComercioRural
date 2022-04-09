<?php
include '../kernel.php';
global $dbcon;
global $billetesdelusuario;
global $premiumtime;
global $premiumvalue;

$tiempo = time();
$tiempopremium = $premiumtime - $tiempo;
$tiempopremium = $tiempopremium / 60;
$tiempopremium = $tiempopremium / 60;
$tiempopremium = $tiempopremium / 24;
$tiempopremium = round($tiempopremium)

?>
<style>
.nav-link{
    font-size:1.1em;
    font-family: "Open Sans";
    font-size: 16px;
    font-style: normal;
    font-variant: normal;
    font-weight: 500;
    line-height: 13.4px;
}
.navmenu{
    box-shadow: 0px 0px 0px 2px black;
    background-color: #90d80a;
}

.navmenu:hover{
    transform: scale(1.1, 1.1);
}
</style>
<nav class="navbar navbar-toggleable-lg navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <div class="navbar-header">
          <img class="rotar" src="/public/img/logo.png" style="width:40px;">
          <a class="navbar-brand abs" href="<?php echo 'https://www.comerciorural.net/index'; ?>"><?php echo WEB_TITULO; ?></a>
    </div>
        <?php
          if(is_logged()){
        ?>
            <button class="navbar-toggler navmenu btn" type="button" data-toggle="collapse" data-target="#collapsingNavbar" aria-controls="collapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapsingNavbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="https://www.comerciorural.net/comprar">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="https://www.comerciorural.net/panel">Vender</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="https://www.comerciorural.net/miscompras">Mis compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="https://www.comerciorural.net/premium">Premium <?php if ($premiumvalue > 1){echo '<span class="badge badge-warning">'.$tiempopremium.' Dias'.'</span>';} ?></a>
                    </li>
                    <?php
                        if ($premiumvalue > 2){
                            ?>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="https://www.comerciorural.net/admin/panelop">Admin</a>
                    </li>
                    <?php
                    }
                    closeDatabase();
                    ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="ayuda">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="settings/account"><span class="fa"><i class="fa fa-cog fa-spin"></i><?php echo $_SESSION['username']; ?></span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" href="crs" style="font-size: 1.4em" ><?php echo $billetesdelusuario.' '; ?><img src="/public/img/billete.jpg" style="width:45px;"></a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php
        }else{
        ?>

      <ul class="nav navbar-nav navbar-right">

      <li><a class="text-light btn btn-primary" href="/login"> <span class="fas fa-sign-in-alt"> </span> Acceder </a></li>

      </ul>
        <?php
          }
        ?>

    </div>
</nav>