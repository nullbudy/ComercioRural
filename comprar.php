<?php
include 'core/kernel.php';
inc_header();
inc_navbar();
require_login();
global $dbcon;
?>
<title><?php echo WEB_TITULO; ?></title>
<header>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);
  .card-img-top{
  	border-radius: 4px;
  }
  .responsive-carousel{
  	height: 80%;
  	max-width: 100%;
  }
	.card {
	border-radius: 0 !important;
	border: 0 none;
	-webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
	-moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
	box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.5);
	}

  .card:hover{
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);  
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
  background-color:#D2FFC9;
}

.selectbonito{
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    box-shadow: 4px 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}
.selectbonito:hover{
    box-shadow: 10px 8px 16px 4px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
    transform: scale(1.1, 1.1);
}

  </style>
</header>
<main>
<?php
$id_agregado = $_GET['agregado'];
if($id_agregado==1){
echo '<div class="alert alert-success" role="alert"><i class="fas fa-check-circle"></i> &nbsp;Se han agregado correctamente los CRs!</div>';
}
elseif($id_agregado==2){
  echo '<div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle"></i> &nbsp;Ha ocurrido un error!</div>';
}
?>
<div class="container" style="margin-left: auto; margin-right:auto; margin-bottom: 3%;">
    <div class="menu row">
		<div class="">
<div id="carousel" class="carousel slide bg-inverse ml-auto mr-auto" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/public/img/test.jpg">
      <div class="carousel-caption d-md-block" style="color:white;">
        <button class="btn btn-info" onclick="parent.location='publicidad' " >Espacio publicitario en venta</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/public/img/test2.jpg">
        <div class="carousel-caption d-md-block" style="color:white;">
        <button class="btn btn-info" onclick="parent.location='publicidad' ">Espacio publicitario en venta</button>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 responsive-carousel" src="/public/img/test3.jpg">
        <div class="carousel-caption d-md-block" style="color:white;">
        <button class="btn btn-info" onclick="parent.location='publicidad' ">Espacio publicitario en venta</button>
      </div>
    </div>
      <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev" style="width:5%">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next" style="width:5%;">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  </div>
</div>
</div>
</div>
</div>


<div class="container">

<form action="" method="post">
<select class="selectpicker btn" data-live-search="true" data-style="selectbonito" data-width="100%"  name="seleccion" onchange="this.form.submit()" title="Buscar...">
    <option>Todo</option>
   <optgroup label="Hortalizas">
  <option>Acelga</option>
  <option>Ajo</option>
  <option>Albahaca</option>
  <option>Apio</option>
  <option>Berro</option>
  <option>Berenjena</option>
  <option>Boñato</option>
  <option>Boñato zanahoria</option>
  <option>Brocoli</option>
  <option>Calabacin</option>
  <option>Caquis</option>
  <option>Calabaza</option>
  <option>Cebolla</option>
  <option>Cebolla de verdeo</option>
  <option>Ciboulette</option>
  <option>Chaucha</option>
  <option>Choclo</option>
  <option>Coliflor</option>
  <option>Esparrago</option>
  <option>Espinaca</option>
  <option>Jengibre</option>
  <option>Lechuga crespa</option>
  <option>Lechuga mantecosa</option>
  <option>Morron</option>
  <option>Rabano</option>
  <option>Remolacha</option>
  <option>Repollo</option>
  <option>Papa</option>
  <option>Pepino</option>
  <option>Rucula</option>
  <option>Puerro</option>
  <option>Tomate</option>
  <option>Zanahoria</option>
  <option>Zuchini</option>
  </optgroup>
  <optgroup label="Frutas">
  <option>Anana</option>
  <option>Banana</option>
  <option>Cereza</option>
  <option>Ciruela</option>
  <option>Coco seco</option>
  <option>Datiles</option>
  <option>Frambuesa</option>
  <option>Frutilla</option>
  <option>Arandanos</option>
  <option>Granada</option>
  <option>Kiwi</option>
  <option>Lima</option>
  <option>Limon</option>
  <option>Mandarina</option>
  <option>Mango</option>
  <option>Manzana</option>
  <option>Durazno</option>
  <option>Melon</option>
  <option>Membrillo</option>
  <option>Mamao</option>
  <option>Naranja</option>
  <option>Oliva</option>
  <option>Pera</option>
  <option>Pelon</option>
  <option>Piña</option>
  <option>Pomelo</option>
  <option>Sandia</option>
  <option>Uva</option>
  </optgroup>
  <optgroup label="Otros">
    <option>Amaranto</option>
    <option>Cilantro</option>
    <option>Col chino</option>
    <option>Eneldo</option>
    <option>Escarola</option>
    <option>Estragon</option>
    <option>Grelo</option>
    <option>Hinojo</option>
    <option>Hongo</option>
    <option>Kale</option>
    <option>Lairel</option>
    <option>Menta</option>
    <option>Mizuna</option>
    <option>Oregano</option>
    <option>Radicheta</option>
    <option>Romero</option>
    <option>Tomillo</option>
    <option>Huevo blanco</option>
    <option>Huevo de color</option>
    <option>Cerdo</option>
    <option>Otros</option>
  </optgroup>
</select>
</form>

<?php
$busqueda = $_POST["seleccion"];
if ($busqueda=="Todo" || !isset($busqueda)){
?>

<div class="row" style="padding:2%;">
<?php
    initDatabase();
  $limit = 12;
      $adjacents = 2;
      $sql = "SELECT COUNT(*) 'total_rows' FROM productos";
      $res = mysqli_fetch_object(mysqli_query($dbcon, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);
      
      
      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
      $query  = "SELECT * FROM productos ORDER BY billetes DESC LIMIT $offset, $limit";
      $result = mysqli_query($dbcon, $query);
      if(mysqli_num_rows($result) > 0) {
        while(($fila = mysqli_fetch_row($result))==true) {
            $dirfoto = 'public/img/subidas/'.$fila[7];
        ?>
<div class="col-md-4">
  <figure class="card card-product">
    <div class="img-wrap"><img src="<?php echo $dirfoto; ?>"></div>
    <figcaption class="info-wrap">
        <h4 class="title"><?php echo $fila[2]; ?></h4>
        <p class="desc"><?php if(strlen($fila[3]) > 60){echo substr($fila[3], 0, 60).'...'; }else{echo $fila[3];} ?></p>
    </figcaption>
    <div class="bottom-wrap">
      <a href="<?php echo 'producto?id='.$fila[0]; ?>" class="btn btn-sm btn-primary float-right">Ver detalles</a>  
      <div class="price-wrap h5">
        <span class="price-new"><?php echo '$'.$fila[5]; ?></span> 
      <?php
      //Agregar billetes
      if ($fila[1] == $usuario){
      ?>
      <div class="row" style="padding-left: 2%; padding-top:4%;">
      <form action="addcrs2" method="post">
      <input type="number" class="form-control" placeholder="CRs" name="crs" required>
      <input type="submit" name="agregar" value="Añadir" class="btn btn-sm btn-success" style="padding-top:3%;">
      <input type="hidden" value="<?php echo $fila[0]; ?>" name="idproducto">
      </form>
      </div>
    <?php } ?>
      </div>
    </div> 
  </figure>
</div> 

<?php
}
      }
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) { 
          if(($page + $adjacents) < $total_pages) { 
            $start = ($page - $adjacents);            
            $end   = ($page + $adjacents);         
          } else {             
            $start = ($total_pages - (1+($adjacents*2)));  
            $end   = $total_pages;               
          }
        } else {               
          $start = 1;                                
          $end   = (1+($adjacents * 2));             
        }
      }
closeDatabase();
?>
</div>


<?php if($total_pages > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=1'><<</a>
            </li>
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $total_pages;?>'>>>                      
              </a>
            </li>
          </ul>
       <?php } 
     }
     elseif(strlen($busqueda) > 0){
      cleanValue($busqueda);
      ?>

<div class="row" style="padding:2%;">
<?php
    initDatabase();
  $limit = 12;
      $adjacents = 2;
      $sql = "SELECT COUNT(*) 'total_rows' FROM productos WHERE categoria = '$busqueda' ";
      $res = mysqli_fetch_object(mysqli_query($dbcon, $sql));
      $total_rows = $res->total_rows;
      $total_pages = ceil($total_rows / $limit);
      
      
      if(isset($_GET['page']) && $_GET['page'] != "") {
        $page = $_GET['page'];
        $offset = $limit * ($page-1);
      } else {
        $page = 1;
        $offset = 0;
      }
      $query  = "SELECT * FROM productos WHERE categoria = '$busqueda' ORDER BY billetes DESC LIMIT $offset, $limit";
      $result = mysqli_query($dbcon, $query);
      if(mysqli_num_rows($result) > 0) {
        while(($fila = mysqli_fetch_row($result))==true) {
            $dirfoto = 'public/img/subidas/'.$fila[7];
        ?>
<div class="col-md-4">
  <figure class="card card-product">
    <div class="img-wrap"><img src="<?php echo $dirfoto; ?>"></div>
    <figcaption class="info-wrap">
        <h4 class="title"><?php echo $fila[2]; ?></h4>
        <p class="desc"><?php if(strlen($fila[3]) > 60){echo substr($fila[3], 0, 60).'...'; }else{echo $fila[3];} ?></p>
    </figcaption>
    <div class="bottom-wrap">
      <a href="<?php echo 'producto?id='.$fila[0]; ?>" class="btn btn-sm btn-primary float-right">Ver detalles</a>  
      <div class="price-wrap h5">
        <span class="price-new"><?php echo '$'.$fila[5]; ?></span> 
      <?php
      //Agregar billetes
      if ($fila[1] == $usuario){
      ?>
      <div class="row" style="padding-left: 2%; padding-top:4%;">
      <form action="addcrs2" method="post">
      <input type="number" class="form-control" placeholder="CRs" name="crs" required>
      <input type="submit" name="agregar" value="Añadir" class="btn btn-sm btn-success" style="padding-top:3%;">
      <input type="hidden" value="<?php echo $fila[0]; ?>" name="idproducto">
      </form>
      </div>
    <?php } ?>
      </div>
    </div> 
  </figure>
</div> 

<?php
}
      }
      else{
        echo 'No hay resultados para '.$busqueda;
      }
      if($total_pages <= (1+($adjacents * 2))) {
        $start = 1;
        $end   = $total_pages;
      } else {
        if(($page - $adjacents) > 1) { 
          if(($page + $adjacents) < $total_pages) { 
            $start = ($page - $adjacents);            
            $end   = ($page + $adjacents);         
          } else {             
            $start = ($total_pages - (1+($adjacents*2)));  
            $end   = $total_pages;               
          }
        } else {               
          $start = 1;                                
          $end   = (1+($adjacents * 2));             
        }
      }
closeDatabase();
?>
</div>


<?php if($total_pages > 1) { ?>
          <ul class="pagination pagination-sm justify-content-center">
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=1'><<</a>
            </li>
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index?page=<?php echo $total_pages;?>'>>>                      
              </a>
            </li>
          </ul>
       <?php }
       } ?> 

</div>

</main>