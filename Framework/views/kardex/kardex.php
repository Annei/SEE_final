<!--
*  kardex.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool, kath
*  @description: KARDEX DEL ALUMNO
*  @date: 09/06/2019
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/pages/loaderStyle.css"></link>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css">
    <title>SEE - Kardex</title>
    <link rel="shortcut icon" href="">
</head>
<body>
<div id="contenedor_carga"><div id="carga"></div></div>
    <div class="main flex">
        <div class="column kardex full">
            <div class="row-responsive">

                <div class="column align-center justify-center menu" tabindex="0"><!--menu-->
                <?php include './views/menu/menu.php';?>
                </div><!--menu-->
                <div class="column align-center body">
                        <div class="row-responsive justify-center header-tittle-button align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                            <div class="container-data align-center header-content justify-between">
                                <div class="row auto">
                                    <div class="column auto justify-center">
                                        <h1 class="color-white weight-bold">Kardex</h1>
                                    </div>  
                                </div>
                                <div class="row auto">
                                        <button type="submit" class="btn btn-admin bg-darkBlue color-white font-regular weight-semi">
                                            <i class="fas fa-print icon-btn"></i>
                                            Imprimir kardex
                                        </button>
                                </div>
                            </div>
                        </div>
                    
                    <div class="white-space-24"></div>

                    <div class="row-responsive container-data">
                        <div class="column full">
                            <div class="row-responsive container-cards">
                                <div class="column card-data justify-center  card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $_SESSION['usuario']['matricula'] ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Numero de control</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-id-badge fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $this->creditos; ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Cr&eacute;ditos acumulados</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-trophy fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center  card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $this->porcentaje; ?> %</h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Porcentaje de Avance</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="far fa-chart-line fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $this->promedio; ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Promedio Total</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-award fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!--/.cards-->

                            <div class="white-space-24"></div>

                            <div class="row">
                                <div class="column full">
                                    <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Materia</th>
                                                <th>Calificacion</th>
                                                <th>Op.</th>
                                                <th>Cuatrimestre</th>
                                                <th>Periodo</th>
                                                <th>Especial</th>
                                            </tr>
                                        </thead>
                                        <tbody class="capitalize">
                                            <?php
                                            $aux = 0;
                                            foreach ($this->datos as $dato){
                                                
                                                    $clave = $dato['claveMat'];
                                                    $materia = $dato['nombreMat'];
                                                    $calificacion = $dato['calfMat'];
                                                    $oportunidad = $dato['opMat'];
                                                    $periodo = $dato['periodPri'];
                                                    $cuatrimestre = $dato['cuatriPri'];
                                                    $segundo_oportunidad = $dato['periodSeg'];
                                                    $segundo_oportunidad_semestre = $dato['cuatriSeg'];
                                                    $especial = $dato['especial'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $clave; ?></td>
                                                    <td><?php echo utf8_encode($materia); ?></td>
                                                    <td><?php echo $calificacion; ?></td>
                                                    <td><?php echo $oportunidad; ?></td>
                                                    <td><?php echo $cuatrimestre; ?></td>
                                                    <td><?php echo $periodo; ?></td>
                                                    <td><?php echo $especial; ?></td>
                                                <?php
                                                    
                                                    $aux = $aux + 1;
                                                }
                                                
                                                ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div> <!--/.tabla kardex-->                            
                            <div class="white-space-16"></div>
                            <h3 class="uppercase color-darkBlue">
                                Materias pendientes
                            </h3>
                            <div class="white-space-16"></div>
                            <div class="row">
                                <div class="column full">
                                    <div class="table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Materia</th>
                                            </tr>
                                        </thead>
                                        <tbody class="capitalize">
                                           
                                            <?php
                                            foreach ($this->materiasPendientes as $materiaPendiente){
                                                $claveMateriaPendiente = $materiaPendiente['claveMat'];
                                                $nombreMateriaPendiente = $materiaPendiente['nombreMat'];
                                            ?>
                                            <tr>
                                                <td><?php echo $claveMateriaPendiente; ?></td>
                                                <td><?php echo utf8_encode($nombreMateriaPendiente); ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div> <!--/.tabla kardex-->     
                            <div class="white-space-64"></div>

                        </div>
                    </div> <!--/.content-->
                    
                </div>
            </div> <!--/.row-responsive-->
        </div> <!--/.column kardex-->

    </div> <!--/.main flex-->
    <script>
    window.onload = function()
       {
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
        }
    </script> 
</body>
</html>