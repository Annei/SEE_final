<!--
*  horario.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool, kath
*  @description: HORARIO DEL ALUMNO
*  @date: 09/06/2019
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>./public/css/style.css"></link>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/pages/loaderStyle.css"></link>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>./public/fontawesome/css/all.css">
    <title>SEE - Horario</title>
    <link rel="shortcut icon" href="">
</head>
<body>
<div id="contenedor_carga"><div id="carga"></div></div>
    <div class="main flex">
        <div class="column horario full">
            <div class="row-responsive">                
                <div class="column align-center justify-center menu" tabindex="0">
                <?php include './views/menu/menu.php';?>
                </div>   
                <div class="column align-center body">
                <div class="row-responsive full">
                        <div class="row-responsive justify-center header-tittle align-center full" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                            <div class="column container-data align-start header-content">
                                <div class="row auto">
                                    <div class="column auto">
                                        <h1 class="color-white weight-bold">Horario</h1>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div> <!--/.header title-->
                    
                    <div class="white-space-24"></div>

                    <div class="row-responsive full justify-center align-center">
                        <div class="column container-data">
                            <div class="row-responsive container-cards">
                                <div class="column card-data justify-center card-margin">
                                    <div class="row">
                                        <div class="column align-start justify-center">
                                            <h4><?php echo $this->datos['matricula']; ?></h4>
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
                                            <h4><?php echo $this->getAcademicPeriod['clave_carrera'].$this->getAcademicPeriod['plan_clave']." ".$this->getAcademicPeriod['carrera_nombre']?></h4>
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
                                            <h4><?php echo $this->getAcademicPeriod['plan_inicio'];?></h4>
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
                                            <h4><?php echo $this->data['info']; ?></h4>
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

                            <div class="row">
                                <div class="column full ">
                                    <div class="table-responsive">
                                        <table>
                                            <thead class="capitalize">
                                                <tr>
                                                    <th class="text-center">Hora</th>
                                                    <th class="text-center">Lunes</th>
                                                    <th class="text-center">Martes</th>
                                                    <th class="text-center">Mi&eacute;rcoles</th>
                                                    <th class="text-center">Jueves</th>
                                                    <th class="text-center">Viernes</th>
                                                </tr>
                                            </thead>
                                            <tbody class="uppercase">
                                            <?php if (($this->turno) == 0){ ?>
                                            <tr>
                                                <td>07:00 - 07:50</td>
                                                <td><?php if (isset($this->horario['lunes']['07:50'])){
                                                    echo utf8_encode($this->horario['lunes']['07:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['07:50'])){
                                                    echo utf8_encode($this->horario['martes']['07:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['07:50'])){
                                                    echo utf8_encode($this->horario['miercoles']['07:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['07:50'])){
                                                    echo utf8_encode($this->horario['jueves']['07:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['07:50'])){
                                                    echo utf8_encode($this->horario['viernes']['07:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>07:50 - 08:40</td>
                                                <td><?php if (isset($this->horario['lunes']['08:40'])){
                                                    echo utf8_encode($this->horario['lunes']['08:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['08:40'])){
                                                    echo utf8_encode($this->horario['martes']['08:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['08:40'])){
                                                    echo utf8_encode($this->horario['miercoles']['08:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['08:40'])){
                                                    echo utf8_encode($this->horario['jueves']['08:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['08:40'])){
                                                    echo utf8_encode($this->horario['viernes']['08:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>08:40 - 09:30</td>
                                                <td><?php if (isset($this->horario['lunes']['09:40'])){echo utf8_encode($this->horario['lunes']['09:40']['nombre']);
                                                }elseif (isset($this->horario['lunes']['09:30'])){
                                                   echo utf8_encode($this->horario['lunes']['09:30']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['09:40'])){echo utf8_encode($this->horario['martes']['09:40']['nombre']);
                                                }elseif (isset($this->horario['martes']['09:30'])){
                                                   echo utf8_encode($this->horario['martes']['09:30']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['09:40'])){echo utf8_encode($this->horario['miercoles']['09:40']['nombre']);
                                                }elseif (isset($this->horario['miercoles']['09:30'])){
                                                   echo utf8_encode($this->horario['miercoles']['09:30']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['09:40'])){echo utf8_encode($this->horario['jueves']['09:40']['nombre']);
                                                }elseif (isset($this->horario['jueves']['09:30'])){
                                                   echo utf8_encode($this->horario['jueves']['09:30']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['09:40'])){echo utf8_encode($this->horario['viernes']['09:40']['nombre']);
                                                }elseif (isset($this->horario['viernes']['09:30'])){
                                                   echo utf8_encode($this->horario['viernes']['09:30']['nombre']);}else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>09:40 - 10:30</td>
                                                <td><?php if (isset($this->horario['lunes']['10:30'])){
                                                    echo utf8_encode($this->horario['lunes']['10:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['10:30'])){
                                                    echo utf8_encode($this->horario['martes']['10:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['10:30'])){
                                                    echo utf8_encode($this->horario['miercoles']['10:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['10:30'])){
                                                    echo utf8_encode($this->horario['jueves']['10:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['10:30'])){
                                                    echo utf8_encode($this->horario['viernes']['10:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>10:30 - 11:20</td>
                                                <td><?php if (isset($this->horario['lunes']['11:20'])){
                                                    echo utf8_encode($this->horario['lunes']['11:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['11:20'])){
                                                    echo utf8_encode($this->horario['martes']['11:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['11:20'])){
                                                    echo utf8_encode($this->horario['miercoles']['11:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['11:20'])){
                                                    echo utf8_encode($this->horario['jueves']['11:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['11:20'])){
                                                    echo utf8_encode($this->horario['viernes']['11:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>11:20 - 12:10</td>
                                                <td><?php if (isset($this->horario['lunes']['12:10'])){
                                                    echo utf8_encode($this->horario['lunes']['12:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['12:10'])){
                                                    echo utf8_encode($this->horario['martes']['12:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['12:10'])){
                                                    echo utf8_encode($this->horario['miercoles']['12:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['12:10'])){
                                                    echo utf8_encode($this->horario['jueves']['12:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['12:10'])){
                                                    echo utf8_encode($this->horario['viernes']['12:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>12:10 - 13:00</td>
                                                <td><?php if (isset($this->horario['lunes']['13:00'])){
                                                    echo utf8_encode($this->horario['lunes']['13:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['13:00'])){
                                                    echo utf8_encode($this->horario['martes']['13:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['13:00'])){
                                                    echo utf8_encode($this->horario['miercoles']['13:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['13:00'])){
                                                    echo utf8_encode($this->horario['jueves']['13:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['13:00'])){
                                                    echo utf8_encode($this->horario['viernes']['13:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <?php } else{?>

                                                <tr>
                                                <td>14:00 - 14:50</td>
                                                <td><?php if (isset($this->horario['lunes']['14:50'])){
                                                    echo utf8_encode($this->horario['lunes']['14:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['14:50'])){
                                                    echo utf8_encode($this->horario['martes']['14:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['14:50'])){
                                                    echo utf8_encode($this->horario['miercoles']['14:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['14:50'])){
                                                    echo utf8_encode($this->horario['jueves']['14:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['14:50'])){
                                                    echo utf8_encode($this->horario['viernes']['14:50']['nombre']);
                                                }else{echo " - ";}?></td>   
                                            </tr>
                                            <tr>
                                                <td>14:50 - 15:40</td>
                                                <td><?php if (isset($this->horario['lunes']['15:40'])){
                                                    echo utf8_encode($this->horario['lunes']['15:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['15:40'])){
                                                    echo utf8_encode($this->horario['martes']['15:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['15:40'])){
                                                    echo utf8_encode($this->horario['miercoles']['15:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['15:40'])){
                                                    echo utf8_encode($this->horario['jueves']['15:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['15:40'])){
                                                    echo utf8_encode($this->horario['viernes']['15:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>15:40 - 16:30</td>
                                                <td><?php if (isset($this->horario['lunes']['16:30'])){
                                                    echo utf8_encode($this->horario['lunes']['16:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['15:40'])){
                                                    echo utf8_encode($this->horario['martes']['16:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['16:30'])){
                                                    echo utf8_encode($this->horario['miercoles']['16:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['16:30'])){
                                                    echo utf8_encode($this->horario['jueves']['16:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['16:30'])){
                                                    echo utf8_encode($this->horario['viernes']['16:30']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>16:40 - 17:30</td>
                                                <td><?php if (isset($this->horario['lunes']['17:30'])){echo utf8_encode($this->horario['lunes']['17:30']['nombre']);
                                                }elseif (isset($this->horario['lunes']['17:20'])){
                                                   echo utf8_encode($this->horario['lunes']['17:20']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['17:30'])){echo utf8_encode($this->horario['martes']['17:30']['nombre']);
                                                }elseif (isset($this->horario['martes']['17:20'])){
                                                   echo utf8_encode($this->horario['martes']['09:20']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['17:30'])){echo utf8_encode($this->horario['miercoles']['17:30']['nombre']);
                                                }elseif (isset($this->horario['miercoles']['17:20'])){
                                                   echo utf8_encode($this->horario['miercoles']['17:20']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['17:30'])){echo utf8_encode($this->horario['jueves']['17:30']['nombre']);
                                                }elseif (isset($this->horario['jueves']['17:20'])){
                                                    echo utf8_encode($this->horario['jueves']['17:20']['nombre']);}else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['17:30'])){echo utf8_encode($this->horario['viernes']['17:30']['nombre']);
                                                }elseif (isset($this->horario['viernes']['17:20'])){
                                                   echo utf8_encode($this->horario['viernes']['17:20']['nombre']);}else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>17:30 - 18:20</td>
                                                <td><?php if (isset($this->horario['lunes']['18:20'])){
                                                    echo utf8_encode($this->horario['lunes']['18:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['18:20'])){
                                                    echo utf8_encode($this->horario['martes']['18:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['18:20'])){
                                                    echo utf8_encode($this->horario['miercoles']['18:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['18:20'])){
                                                    echo utf8_encode($this->horario['jueves']['18:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['18:20'])){
                                                    echo utf8_encode($this->horario['viernes']['18:20']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>18:20 - 19:10</td>
                                                <td><?php if (isset($this->horario['lunes']['19:10'])){
                                                    echo utf8_encode($this->horario['lunes']['19:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['19:10'])){
                                                    echo utf8_encode($this->horario['martes']['19:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['19:10'])){
                                                    echo utf8_encode($this->horario['miercoles']['19:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['19:10'])){
                                                    echo utf8_encode($this->horario['jueves']['19:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['19:10'])){
                                                    echo utf8_encode($this->horario['viernes']['19:10']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>
                                            <tr>
                                                <td>19:10 - 20:00</td>
                                                <td><?php if (isset($this->horario['lunes']['20:00'])){
                                                    echo utf8_encode($this->horario['lunes']['20:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['20:00'])){
                                                    echo utf8_encode($this->horario['martes']['20:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['20:00'])){
                                                    echo utf8_encode($this->horario['miercoles']['20:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['20:00'])){
                                                    echo utf8_encode($this->horario['jueves']['20:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['20:00'])){
                                                    echo utf8_encode($this->horario['viernes']['20:00']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>  
											                                            <tr>
                                                <td>20:00 - 20:50</td>
                                                <td><?php if (isset($this->horario['lunes']['20:50'])){
                                                    echo utf8_encode($this->horario['lunes']['20:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['20:50'])){
                                                    echo utf8_encode($this->horario['martes']['20:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['20:50'])){
                                                    echo utf8_encode($this->horario['miercoles']['20:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['20:50'])){
                                                    echo utf8_encode($this->horario['jueves']['20:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['20:50'])){
                                                    echo utf8_encode($this->horario['viernes']['20:50']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>  
											                                            <tr>
                                                <td>20:50 - 21:40</td>
                                                <td><?php if (isset($this->horario['lunes']['21:40'])){
                                                    echo utf8_encode($this->horario['lunes']['21:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['martes']['21:40'])){
                                                    echo utf8_encode($this->horario['martes']['21:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['miercoles']['21:40'])){
                                                    echo utf8_encode($this->horario['miercoles']['21:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['jueves']['21:40'])){
                                                    echo utf8_encode($this->horario['jueves']['21:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                                <td><?php if (isset($this->horario['viernes']['21:40'])){
                                                    echo utf8_encode($this->horario['viernes']['21:40']['nombre']);
                                                }else{echo " - ";}?></td>
                                            </tr>  

                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!--/.tabla horario-->

                            <div class="white-space-32"></div>

                           <!--/.boto <div class="row-responsive justify-center">
                                <button class="btn btn-general-data bg-darkBlue color-white font-regular weight-semi"> 
                                    <i class="fas fa-print icon-btn"></i>
                                    Imprimir horario 
                                </button>
                            </div> n imprimir-->
                            <div class="white-space-24"></div>
                        </div>
                    </div> <!--/.content-->
                    
                </div>
            </div> <!--/.row-responsive-->
        </div> <!--/.column horario-->

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
