<?php  
  require_once'../../Models/Producto_model.php';
  $service = new Producto();
  $datos = $service->Consultar();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../Public/Img/HD/pro.jpg" />
    <link rel="icon" type="image/png" href="../../Public/Img/HD/pro.jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ingreso Productos</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="../../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="../../css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
  <?php include"../Body/Nav_main.php";?>
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header" data-background-color="blue">
                          <h4 class="title">Inventario de Productos</h4>
                          <p class="category">Registrar nuevos productos</p>
                      </div>
                      <div class="card-content">
                          <form action="#" method="POST">
                          <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label>Productos</label>
                                          <input type="int" name="id_p" id="" class="form-control" required>

                                          <?php  
                                            for ($i=0; $i < count($datos); $i++) 
                                            { 
                                              # code...
                                          ?>
                                            <input value="<?php echo $datos[$i]['id_producto'];?>"><?php echo $datos[$i]["nombre_p"];?></input>
                                          <?php  
                                            }
                                          ?>
                                          </input>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Stock</label>
                                          <input type="int" name="stock" id="" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <button type="submit" name="btn_inp" class="btn btn-success pull-right">Guardar</button>
                              <div class="clearfix"></div>
                          </form>
                          <?php 
                            if (isset($_POST['btn_inp']))
                            {
                              if (empty($_POST['id_p'])) {
                                echo "Producto no seleccionado";  
                              }elseif (empty($_POST['stock'] )){
                                echo "Cantidad de Producto no asignada";
                              }else{
                                $nuevo = new InventarioP();
                                $asd = $nuevo->Insertar($_POST['id_p'], $_POST['stock']);
                              }
                            } 
                          ?>
                      </div>
                      <a href="Lista_inv_p.php"> <button type="submit" class="btn btn-primary pull-left">Ver Inventario</button></a>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="card card-profile">
                      <div class="card-avatar">
                            <a href="#">
                                <img class="img" href="./Public/Img/HD/pro.jpg" />
                            </a>
                        </div>
                      <div class="content">
                          <h6 class="category text-gray">Tips</h6>
                          <h4 class="card-title">Administrador</h4>
                          <p class="card-content">
                              Sabias que desde esta pestaña se pueden añadir productos a tu inventario y puede ir moviéndote a través del menu principal.
                          </p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>



  <footer> <?php include"../Body/Footer_main.php";?></footer>
</body>
  <footer> <?php include"../Body/Footer_main2.php";?></footer>

</html>