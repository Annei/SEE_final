<!--
*  calificaciones.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool, kath
*  @description: CALIFICACIONES DEL ALUMNO
*  @date: 09/06/2019
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css"></link>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/pages/loaderStyle.css"></link>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css">
    <title>SEE - Calificaciones</title>
    <link rel="shortcut icon" href="">
</head>
<body>
<div id="contenedor_carga"><div id="carga"></div></div>
    <div class="main flex">
        <div class="column calificaciones full">
            <div class="row-responsive">
                <div class="column align-center justify-center menu" tabindex="0"><!--menu-->
                <?php include './views/menu/menu.php';?>
                </div><!--menu-->              
                <div class="column align-center body">
                <div class="row-responsive full">
                        <div class="row-responsive justify-center header-tittle align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                            <div class="column container-data align-start header-content">
                                <div class="row auto">
                                    <div class="column auto">
                                        <h1 class="color-white weight-bold">Calificaciones del cuatrimestre</h1>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div> <!--/.header title-->
                   
                    
                    <div class="white-space-24"></div>

                    <div class="row-responsive container-data">
                        <div class="column full">
                            <div class="row-responsive container-cards">
                                <div class="column card-data justify-center card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $_SESSION['usuario']['matricula'] ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Matrícula</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-id-badge fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4 class="truncate"><?php echo $this->claveGrupo['estudia'] . " ". $this->carrera ; ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Carrera</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-university fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4>ISOF-2013</h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Mapa curricular</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-books fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="column card-data justify-center">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $this->periodo; ?></h4>
                                            <div class="white-space-16"></div>
                                            <p class="color-darkBlue font-small">Periodo</p>
                                        </div>
                                        <div class="column align-end justify-center auto">
                                            <i class="fas fa-calendar fa-3x color-lightBlue"></i>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!--/.cards-->

                            <div class="white-space-24"></div>

                            <?php
                            foreach ($this->calificaciones as $calificacion) {
                                $nombreMateria = $calificacion['Nombre'];
                                $parcial1 = $calificacion['Parcial1'];
                                $parcial2 = $calificacion['Parcial2'];
                                $parcial3 = $calificacion['Parcial3'];
                                $parcial4 = $calificacion['Parcial4'];
                                $parcial5 = $calificacion['Parcial5'];
                                $promedio = $calificacion['Promedio'];
                                $clave = $calificacion['Clave'];
                            ?>

                            <div class="row-responsive">
                                <div class="column full">
                                    <div class="row align-center subject-info">
                                        <h3 class="uppercase color-darkBlue">
                                            <?php echo $nombreMateria;?>
                                        </h3>
                                        <!-- <p class="profe-name uppercase">( Cristhian de jesus dominguez villegas )</p> -->
                                    </div> <!--/.professor name-->

                                    <div class="white-space-8"></div>

                                    <div class="row">
                                        <div class="table-responsive full">
                                        <table>
                                            <thead class="capitalize">
                                                <tr>
                                                    <th>clave</th>
                                                    <th>re</th>
                                                    <th>calificacion</th>
                                                    <th>cuatrimestre</th>
                                                    <th class="uppercase">tc</th>
                                                    <th>t1</th>
                                                    <th>t2</th>
                                                    <th>t3</th>
                                                    <th>t4</th>
                                                    <th>t5</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="uppercase"><?php echo $clave; ?></td>
                                                    <td>-</td>
                                                    <td><?php echo $promedio; ?></td>
                                                    <td><?php echo $this->cuatrimestre['estudia']; ?></td>
                                                    <td>-</td>
                                                    <td><?php echo $parcial1; ?></td>
                                                    <td><?php echo $parcial2; ?></td>
                                                    <td><?php echo $parcial3; ?></td>
                                                    <td><?php echo $parcial4; ?></td>
                                                    <td><?php echo $parcial5; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div> <!--score table-->
                                </div>                          
                            </div> <!--./end table-->

                            <div class="white-space-24"></div>

                            <?php
                            }
                            ?>

                            <div class="white-space-32"></div>

                        </div>
                    </div> <!--/.content-->
                    
                </div>
            </div> <!--/.row-responsive-->
        </div> <!--/.column calificaciones-->

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