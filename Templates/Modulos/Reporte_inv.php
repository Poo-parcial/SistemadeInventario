<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../Public/Img/HD/pro.jpg"/>
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
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header" data-background-color="blue">
                          <h4 class="title">Reportes</h4>
                          <p class="category">Selecciona uno de los 2 botones</p>
                      </div>
                      <br><br><br><br>
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
                                  Desde aca puedes ver los reportes de tu inventario.
                              </p>
                          </div>
                      </div>
                        <a href="Reporte_in.php"><button type="submit" class="btn btn-success pull-left"> Reporte de reabastecimientos</button></a>
                        <a href="Reporte_v.php"><button type="submit" class="btn btn-success pull-left"> Reporte de ventas</button></a>
                  </div>
              </div>

  <footer> <?php include"../Body/Footer_main.php";?></footer>
</body>
  <footer> <?php include"../Body/Footer_main2.php";?></footer>
</html>