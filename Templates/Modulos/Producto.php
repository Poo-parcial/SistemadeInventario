<?php 
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: Index.php');
  }
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../Public/Img/HD/pro.jpg" />
    <link rel="icon" type="image/png" href="../../Public/Img/HD/pro.jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Producto</title>
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
                          <h4 class="title">Agregar Producto</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content">
                          <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Id_producto</label>
                                          <input type="text" name="id_p" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Código</label>
                                          <input type="text" name="cod_p"class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Producto</label>
                                          <input type="text" name="nom_p"class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Descripción</label>
                                          <input type="text" name="des_p" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Unidad</label>
                                          <input type="text" name="uni_p" class="form-control">
                                      </div>
                                  </div>
                              </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Precio de compra</label>
                                            <input type="text" name="prec_p" class="form-control">
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group label-floating">
                                              <label class="control-label">Precio de venta</label>
                                              <input type="text" name="prev_p" class="form-control">
                                          </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Estado</label>
                                                <input type="text" name="est_p" class="form-control">
                                            </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Id_proveedor</label>
                                                <input type="text" name="idpro_p" class="form-control">
                                            </div>
                                        </div>
                                      </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Id_categoria</label>
                                          <input type="text" name="idcat_p" class="form-control">
                                      </div>
                                  </div>
                              </div>
                                    <a href="#">
                                        <button type="submit" class="btn btn-success pull-right" name="btn_p">Agregar producto</button>
                                    </a>
                              <div class="clearfix"></div>
                          </form>
                              <div class="text-left">
                                <a href="Producto.php"><button class="btn btn-danger">Cancelar</button></a>
                            </div>
                            <?php
    if (isset($_POST['btn_p'])) 
    {
      if (empty($_POST['id_p'])) {
        echo "El campo id está vacío";
      }elseif (empty($_POST['cod_p'])) {
        echo "El campo código está vacío";
      }elseif (empty($_POST['nom_p'])) {
        echo "El campo nombre producto está vacío";
      }elseif (empty($_POST['des_p'])) {
        echo "El campo descripcion está vacío";
      }elseif (empty($_POST['uni_p'])) {
        echo "El campo unidad está vacío";
      }elseif (empty($_POST['prec_p'])) {
        echo "El campo precio compra está vacío";
      }elseif (empty($_POST['prev_p'])) {
        echo "El campo precio venta está vacío";
      }elseif (empty($_POST['est_p'])) {
        echo "El campo estado está vacío";
      }elseif (empty($_POST['idpro_p'])) {
        echo "El campo id proveedor está vacío";
      }elseif (empty($_POST['idcat_p'])) {
        echo "El campo id categoria está vacío";
      }
       else
      { 
        if (!empty($resultado))
        {
          include_once'../../Models/Producto_model.php';
          $nuevo = new Producto;
          $asd = $nuevo->Insertar($_POST['id_p'], $_POST['cod_p'], $_POST['nom_p'],$_POST['des_p'], $_POST['uni_p'], $_POST['prec_p'], $_POST['prev_p'], $_POST['est_p'], $ruta, $_POST['idpro_p'], $_POST['idcat_p']);
        }
        else
        {
          #echo "Error al subir el archivo";
        }
      } 
    }
?>
                        </div>
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
                          <h4 class="card-title">Administrador</h4>
                          <p class="card-content">
                              No busques CLIENTES. Para tus productos
                              BUSCA PRODUCTOS para tus CLIENTES.
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