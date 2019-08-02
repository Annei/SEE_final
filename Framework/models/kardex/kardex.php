
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
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css"></link>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css">
    <title>SEE - Kardex</title>
    <link rel="shortcut icon" href="">
</head>
<body>
    <div class="main flex">
        <div class="column kardex">
            <div class="row-responsive">
                
                <div class="column menu-left align-center justify-center">
                    <div class="white-space-24"></div>
                    <div class="responsive-img item-left justify-center align-center">
                        <img src="<?php echo constant('URL'); ?>public/img/upqroo-newlogo@2x.png" alt="responsive img" title="responsive img" class="cover-img "/>
                    </div>
                    <div class="white-space-32"></div>
                    <div class="white-space-16"></div>
                    <div class="column main align-center auto">
                        <div class="row item-left justify-center align-start">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Datos generales</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Carga académica</h4>
                            </div>                        
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Calificaciones</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class="column">
                                <h4 class="color-white weight-regular font-small">Kardex</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Horario</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Noticias</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Formatos</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Correo Institucional</h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small">Cerrar Sesión</h4>
                            </div>
                        </div>
                    </div>
                </div> <!--./ blue menu-->
              
                <div class="column align-center">
                        <div class="row-responsive justify-center header-tittle align-center" style="background-image: url(<?php echo constant('URL'); ?>/public/img/new-footer-blue.png)">
                            <div class="container-data align-center header-content justify-between"">
                                <div class="row auto">
                                    <div class="column auto justify-center">
                                        <h1 class="color-white weight-bold">Kardex</h1>
                                    </div>  
                                </div>
                                <div class="row auto">
                                        <button type="submit" class="btn btn-admin bg-darkBlue color-white font-regular weight-semi">Imprimir kardex</button>
                                </div>
                            </div>
                        </div>
                    
                    <div class="white-space-24"></div>
                    <div class="row-responsive container-data">
                        <div class="column">
                            <div class="row-responsive">
                                <div class="column card-data justify-center">
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
                                            <h4><?php echo $this->datos[0]['creditos'] ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Cr&eacute;ditos acumulados</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-trophy fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4>79.20 %</h4>
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
                                            <h4>8.86</h4>
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
                                <div class="column">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Materia</th>
                                                <th>Calificacion</th>
                                                <th>Op.</th>
                                                <th>Cuatrimestres</th>
                                                <th>Periodo</th>
                                                <th>Especial</th>
                                            </tr>
                                        </thead>
                                        <tbody class="capitalize">
                                            <?php
                                            $aux = 0;
                                            foreach ($this->datos as $dato){
                                                if($aux != 0){
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
                                                <td><?php echo $materia; ?></td>
                                                <td><?php echo $calificacion; ?></td>
                                                <td><?php echo $oportunidad; ?></td>
                                                <td><?php echo $cuatrimestre; ?></td>
                                                <td><?php echo $periodo; ?></td>
                                                <td><?php echo $especial; ?></td>
                                            <?php
                                                }
                                                $aux = 1;
                                            }
                                            
                                            ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!--/.tabla kardex-->
                            
                            <div class="white-space-24"></div>
                        </div>
                    </div> <!--/.content-->
                    
                </div>
            </div> <!--/.row-responsive-->
        </div> <!--/.column kardex-->
    </div> <!--/.main flex-->
    
</body>
</html>
