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
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>SEE - Carga acádemica</title>
    <link rel="shortcut icon" href="">
</head>
<body>
    <div class="main flex">
        <div class="column carga-academica">
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
                                <h4 class="color-white weight-regular font-small"><a href="<?php echo constant('URL'); ?>alumnos/datos">Datos generales</a></h4>
                            </div>
                        </div>
                        <div class="row item-left justify-center">
                            <div class = "column">
                                <h4 class="color-white weight-regular font-small"><a href="<?php echo constant('URL'); ?>alumnos/carga-academica">Carga académica</a></h4>
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
                                <h4 class="color-white weight-regular font-small"><a href="<?php echo constant('URL'); ?>logout">Cerrar Sesión</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                <div class="row-responsive ">
                        <div class="row-responsive justify-center header-tittle align-center" style="background-image: url(<?php echo constant('URL'); ?>/public/img/new-footer-blue.png)">
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
                            <div class="column">
                                <table class="table-responsivze table-datos-alumno ">
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">No. Control</th>
                                        <td class="weight-bold" name="matricula"><?php echo $this->getAcademicPeriod['matricula']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Nombre</th>
                                        <td class="weight-bold"><?php echo $this->getAcademicPeriod['nombre']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Estudia</th>
                                        <td class="weight-bold"><?php echo $this->getAcademicPeriod['clave_carrera'] . $this->getAcademicPeriod['plan_clave'] . " ". $this->getAcademicPeriod['carrera_nombre'] . " " . $this->getAcademicPeriod['plan_inicio']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="bg-lightBlue color-white weight-bold">Periodo</th>
                                        <td class="weight-bold"><?php echo $this->data['info'];?></td>
                                    </tr>
                                </table>
                              
                                <div class="white-space-24"></div>
                                <div class="table-responsiv">
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

                                            <td><?php echo ($key['clave_materia']); ?></td>
                                            <td><?php echo ($key['nombre_mater']); ?></td>
                                            <td><?php echo ($key['cr']); ?></td>
                                            <td>CRISTHIAN DE JESUS </td>
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
                            </div>
                        </div>
                        <div class="white-space-32"></div>
                        <div class="justify-center">
                            
                            <button type="button" onclick="ImprimirPDF()" class="btn btn-general-data bg-darkBlue color-white font-regular weight-semi">Imprimir carga academica</button>
                            <script>function ImprimirPDF(){ window.print();}</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
