<?php
  session_start();
  if (!isset($_SESSION['usuario'])) {
    header('Location: ../../Index.php');
  }
  require_once("../../Models/Model_orden_venta.php");
  $services = new Ordenesv();
  $datos = $services->Consultar3();
  $datos2 = $services->Consultar4();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../Public/Img/HD/pro.jpg"/>
    <link rel="icon" type="image/png" href="../.../Public/Img/HD/pro.jpg" />
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
                  <div class="card-header" data-background-color="yellow">
                      <h4 class="title">Reporte General de Ventas</h4>
                  </div>
                <?php 
                  if ($datos == true) {
                ?>
                  <div class="card-content table-responsive">
                    <div class="col s12">
                      <table class="table highlight">
                        <thead>
                          <th><b>ORDEN VENTA</b></th>
                          <th><b>EMPLEADO</b></th>
                          <th><b>CLIENTE</b></th>
                          <th><b>FECHA</b></th>
                          <th><b>ID</b></th>
                          <th><b>PRODUCTO</b></th>
                          <th><b>PRECIO</b></th>
                          <th><b>CANTIDAD</b></th>
                          <th><b>DESCUENTO</b></th>
                          <th><b>TOTAL</b></th>
                        </thead>
                        <?php
                          for ($i = 0; $i < count($datos); $i++) {
                        ?>
                        <tbody>
                          <tr>
                            <td><?php echo $datos[$i]["ID_VENTA"]; ?></td>
                            <td><?php echo $datos[$i]["EMPLEADO"]; ?></td>
                            <td><?php echo $datos[$i]["CLIENTE"]; ?></td>
                            <td><?php echo $datos[$i]["FECHA_ORDEN"]; ?></td>
                            <td><?php echo $datos[$i]["ID_PRODUCTO"]; ?></td>
                            <td><?php echo $datos[$i]["PRODUCTO"]; ?></td>
                            <td> $ <?php echo number_format($datos[$i]["PRECIO_PRODUCTO"],2); ?></td>
                            <td><?php echo $datos[$i]["TOTAL_PRODUCTOS"]; ?></td>
                            <td><?php echo $datos[$i]["DESCUENTO"]; ?></td>
                            <td colspan="3"><?php echo  '$'.number_format($datos[$i]["PRECIO_A_PAGAR"],2); ?></td>
                          </tr>
                          <?php
                          }

                        ?>
                        <tr>
                          <td>Totales</td>
                          <td colspan="6" style="text-align: right;"><?php echo $datos2[1]; ?></td>
                          <td colspan="2" style="text-align: right;"><?php echo  '$'.number_format($datos2[0],2); ?></td>
                        </tr> 
                        </tbody>
                      </table>
                      <a class=" button" href="./Consultas_recibos_compra.php"><button class=" button  btn red darken-4" type='button' value='cancelar' />Cancelar</button></a>
                      <button class="oculto btn btn-primary" type='submit' name onclick='window.print();' value='Imprimir' />Imprimir</button>
                    </div>
                  </div>
                  <?php  
                    }
                    else
                    {
                      echo " <br> <b>No se encuentras reportes de ventas!</b>";
                    } 
                  ?>
              </div>
          </div>
        </div>
      </div>
   </div>
  <footer> <?php include"../Body/Footer_main.php";?></footer>
</body>
  <footer> <?php include"../Body/Footer_main2.php";?></footer>

</html>