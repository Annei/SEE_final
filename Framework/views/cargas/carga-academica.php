<!--
*  profile.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Raymundo, kath
*  @description: Carda academica
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
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>/public/fontawesome/css/all.css">
    <title>SEE - Carga acádemica</title>
    <link rel="shortcut icon" href="">
</head>
<body>
    <div id="contenedor_carga"><div id="carga"></div></div>
    <div class="main flex">
        <div class="column carga-academica full">
            <div class="row-responsive">
                <div class="column align-center justify-center menu" tabindex="0"> <!--menu-->
                <?php include './views/menu/menu.php';?>                  
                </div>   <!--menu--> 

                <div class="column full body">
                <div class="row-responsive ">
                        <div class="row-responsive justify-center header-tittle align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                            <div class="column container-data align-start header-content">
                                <div class="row auto">
                                    <div class="column auto">
                                        <h1 class="color-white weight-bold">Carga academica</h1>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div> <!--/.header title-->
                    <div class="white-space-24"></div>
                    <div class="wrap justify-center">
                        <div class="row-responsive container-data">
                            <div class="column full">
                                <table class="table-responsivze table-datos-alumno ">
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Matricula</th>
                                        <td class="weight-bold"><?php echo $this->getAcademicPeriod['matricula']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Alumno</th>
                                        <td class="weight-bold"><?php echo utf8_encode($this->getAcademicPeriod['nombre']); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Plan de estudios</th>
                                        <td class="weight-bold"><?php echo utf8_encode($this->getAcademicPeriod['clave_carrera']) . utf8_encode($this->getAcademicPeriod['plan_clave']) . " ". utf8_encode($this->getAcademicPeriod['carrera_nombre']) . " " . utf8_encode($this->getAcademicPeriod['plan_inicio']); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Periodo</th>
                                        <td class="weight-bold"><?php echo utf8_encode($this->data['info']);?></td>
                                    </tr>
                                </table>
                                <div class="white-space-24"></div>
                                <div class="table-responsive">
                                <table class="table-academic-charge">
                                    <thead>
                                         <tr>
                                            <th class="weight-bold">Clave</th>
                                            <th class="weight-bold">Materia</th>
                                            <th class="weight-bold">CR</th>
                                            <th class="weight-bold">Docente</th>
                                            <th class="weight-bold">Lunes</th>
                                            <th class="weight-bold">Martes</th>
                                            <th class="weight-bold">Miercoles</th>
                                            <th class="weight-bold">Jueves</th>
                                            <th class="weight-bold">Viernes</th>
                                        </tr>
                                    </thead>
                                    <tbody class="capitalize">
                                        <tr>
                                            <?php $vector = $this->getAcademicMat; foreach ($vector as $key) { ?>
                                            <td><?php echo utf8_encode(($key['clave_materia'])); ?></td>
                                            <td><?php echo utf8_encode(($key['nombre_mater'])); ?></td>
                                            <td><?php echo utf8_encode(($key['cr'])); ?></td>
                                            <td><?php echo utf8_encode(($key['nombre_profesor'])) . " " . utf8_encode(($key['apellido_profesor'])); ?></td>
                                            <td><?php echo ($key['lunes']) . " " . ($key['lunes_aula']); ?></td>
                                            <td><?php echo ($key['martes']) . " " . ($key['martes_aula']); ?></td>
                                            <td><?php echo ($key['miercoles']) . " " . ($key['miercoles_aula']); ?></td>
                                            <td><?php echo ($key['jueves']) . " " . ($key['jueves_aula']); ?></td>
                                            <td><?php echo ($key['viernes']) . " " . ($key['viernes_aula']); ?></td>
                                        </tr>
                                        <?php } ?>         
                                    </tbody>
                                </table>
                                </div>
                                <div class="white-space-32"></div>
                                <div class="justify-center">
                                    <button type="button" class="btn btn-general-data bg-darkBlue color-white font-regular weight-semi">
                                        <i class="fas fa-print icon-btn"></i>
                                        <a href="<?php echo constant('URL'); ?>alumnos/SEE_Carga_acádemica_PDF">Imprimir carga academica</a></button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="white-space-24"></div>
                </div>
            </div>
        </div>
    </div> 

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