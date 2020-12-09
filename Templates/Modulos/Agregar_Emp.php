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
  <?php include"../Body/Empleado.html"; ?>

  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-header" data-background-color="blue">
                          <h4 class="title">Agregar empleado</h4>
                          <p class="category"></p>
                      </div>
                      <div class="card-content">
                          <form>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Nombres</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Apellidos</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Sexo</label>
                                          <input type="text" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group label-floating">
                                          <label class="control-label">Dirección</label>
                                          <input type="text" class="form-control">
                                      </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Telefono</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                  </div>

                              <button type="submit" class="btn btn-success pull-right">Agregar empleado</button>
                              <div class="clearfix"></div>
                          </form>
                          <?php  
                            if (isset($_POST['btn_cc'])) 
                            {
                              require_once("../../Models/Model_empleado.php");
                              $services = new Empleados();
                              $datos = $services->Insertar($_POST['id'], $_POST['nom'], $_POST['ape'], $_POST['dir'], $_POST['tel'], $_POST['correo'], $_POST['id_cc']);
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