<?php
	require_once("../../Models/Model_cliente.php");
	// Actualizar categoria
	$id = $_GET['id'];
	$services = new clientes();
	$query = "SELECT * FROM clientes WHERE id_cliente = '$id'";
	$result = $services->Obtener($query);

	foreach ($result as $key => $res) 
	{
		$idp = $res['id_cliente'];
        $nombre = $res['nombre_c'];
        $apellido = $res['apellido_c'];
		$direccion= $res['direccion_c'];
        $tf = $res['telefono'];
        $email = $res['correo'];
        $id_c = $res['tipo_cliente'];
	}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../Public/Img/HD/pro.jpg" />
    <link rel="icon" type="image/png" href="../../Public/Img/HD/pro.jpg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
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
                    <?php
                      for ($i = 0; $i < count($datos); $i++) 
                      {
                    ?>
                      <div class="card-header" data-background-color="purple">
                          <h4 class="title">Editar Cliente</h4>
                          <p class="category">Código Clientes = <?php echo $datos[$i]["id_cliente"]; ?></p>
                      </div>
                      <div class="card-content">
                          <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-md-12" hidden>
                                  <div class="form-group label-floating">
                                      <label class="control-label">id_cliente</label>
                                      <input type="text" name="id_c" class="form-control" value="<?php echo $datos[$i]["id_cliente"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Nombre</label>
                                      <input type="text" name="Cod_p"class="form-control" value="<?php echo $datos[$i]["nombre_c"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Apellido</label>
                                      <input type="text" name="Nom_p"class="form-control" value="<?php echo $datos[$i]["apellido_C"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Direccion</label>
                                      <input type="text" name="Des_p" class="form-control" value="<?php echo $datos[$i]["direccion_c"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Telefono</label>
                                      <input type="text" name="Uni_p" class="form-control" value="<?php echo $datos[$i]["telefono"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Correo</label>
                                      <input type="text" name="Prec_p" class="form-control" value="<?php echo $datos[$i]["correo"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group label-floating">
                                      <label class="control-label">Tipo cliente</label>
                                      <input type="text" name="Prev_p" class="form-control" value="<?php echo $datos[$i]["tipo_cliente"]; ?>" required>
                                  </div>
                              </div>
                            </div>
                        <?php 
                          }
                        ?>
                            <button type="submit" class="btn btn-primary pull-right" name="btn_actu">Actualizar</button>
                            <div class="clearfix"></div>
                          </form>
                          <?php  
                            if (isset($_POST['btn_actu'])) 
                            {
                              include_once'../../Models/Model_cliente.php';
                              $nuevo = new Producto;
                              $asd = $nuevo->Update($_POST['ID_p'], $_POST['Cod_p'], $_POST['Nom_p'],$_POST['Des_p'], $_POST['Uni_p'], $_POST['Prec_p'], $_POST['Prev_p'], $_POST['Est_p']);
                            }
                          ?>
                        <div class="text-left">
                          <a href="Inventario.php"><button class="btn btn-danger">Cancelar</button></a>
                        </div>
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