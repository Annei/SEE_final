<!--
*  profile.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool, kath
*  @description: PERFIL ALUMNO
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/pages/loaderStyle.css"></link>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/animate.css"></link>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo constant('URL'); ?>public/js/modals.js"></script>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <title>SEE - Perfil</title>
    <link rel="shortcut icon" href="">
</head>
<body>
<div id="contenedor_carga"><div id="carga"></div></div>
    <div class="main flex ">
        <div class="column profile full">
            <div class="row-responsive">

                <div class="column align-center justify-center menu" tabindex="0"><!--menu--> 
                <?php include './views/menu/menu.php';?>
                </div><!--menu-->      
                <div class="column full container-gnral-info body">
                    <div class="row-responsive">
                            <div class="row-responsive header-general-data align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                                <div class="column space-header">
                                <div class="row-responsive responsive-img container-img-profile">
                                    <img src="<?php echo constant('URL'); ?>public/img/politecnica.jpg" alt="Profile student" class="cover-img img-profile">
                                </div>
                                </div>
                                <div class="column align-start header-content">
                                    <div class="row auto">
                                        <div class="column auto">
                                            <h1 class="color-white font-large"><?php echo $this->datos['nombre']; ?></h1>
                                            <h3 class="color-white font-medium weight-regular">
                                            <?php echo  $this->getAcademicPeriod['carrera_nombre'] ?>                                            
                                            </h3>
                                        </div>  
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row-responsive container-gnral-info">
                        <div class="column container-info-student justify-start">
                            <div class="white-space-24"></div>
                            <div class="row-responsive justify-center">
                                <div class="column auto">
                                    <div class="white-space-8"></div>
                                    <h4 class="color-darkgray weight-bold font-small text-left">Plan de estudios</h4>
                                    <p class="color-darkgray weight-regular">
                                    <?php echo $this->getAcademicPeriod['carrera_nombre'] . "<br>" . $this->getAcademicPeriod['plan_inicio']; ?>
                                    </p>
                                    <div class="white-space-24"></div>
                                    <h4 class="color-darkgray weight-bold font-small">Cr&eacute;ditos acumulados</h4>
                                    <p class="color-darkgray weight-regular">
                                        <?php echo $this->creditos;?>
                                    </p>
                                    <div class="white-space-24"></div>
                                    <h4 class="color-darkgray weight-bold font-small text-left">Matricula</h4>
                                    <p class="color-darkgray weight-regular">
                                        <?php echo $this->datos['matricula']; ?>
                                    </p>
                                    <div class="white-space-24"></div>
                                    <h4 class="color-darkgray weight-bold font-small">Estatus</h4>
                                    <p class="color-darkgray weight-regular">
                                     <?php echo $this->status; ?>                                        
                                    </p>
                                    <div class="white-space-24"></div>
                                    <h4 class="color-darkgray weight-bold font-small">Año de ingreso</h4>
                                    <p class="color-darkgray weight-regular">
                                        SEP-DIC2016
                                    </p>
                                    <div class="white-space-24"></div>
                                    <h4 class="color-darkgray weight-bold font-small">Periodo actual o &uacute;ltimo</h4>
                                    <p class="color-darkgray weight-regular">
                                    <?php echo $this->periodo; ?>                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="column align-center content-grl">
                            <div class="white-space-32"></div>
                            <div class="column container">
                            <h2 class="color-darkBlue weight-bold">Datos generales del estudiante</h2>
                                <form class="column frm-info-gral">
                                    <div class="row-responsive break-ipad">
                                        <div class="column align-start">
                                            <div class="column container-input-info-gral">
                                            <h4 class="color-darkgray font-regular truncate">Fecha de Nacimiento</h4>
                                            <input type="text" name="txtFechaNac" placeholder="<?php echo $this->datos['cumple']; ?>" class="input input-info-profile" disabled>
                                            </div>
                                        </div>
                                        <div class="column align-center">
                                            <div class="column container-input-info-gral">
                                            <h4 class="color-darkgray font-regular truncate">Clave CURP</h4>
                                            <input type="text" name="txtCurp" placeholder="<?php echo $this->datos['curp']; ?>" class="input input-info-profile" disabled>
                                            </div>
                                        </div>
                                        <div class="column align-end">
                                            <div class="column container-input-info-gral">
                                            <h4 class="color-darkgray font-regular">C.P</h4>
                                            <input type="text" name="txtCp" placeholder="<?php echo $this->datos['cp']; ?>" class="input input-info-profile" disabled>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="white-space-16"></div>
                                    <div class="row">
                                        <div class="column container-input-large">
                                            <h4 class="color-darkgray font-regular truncate">Direccion completa</h4>
                                            <input type="text" name="txtDireccion" placeholder="<?php echo $this->datos['direccion']; ?>" class="input input-info-profile" disabled>
                                        </div>
                                    </div>
                                    <div class="white-space-16"></div>
                                    <div class="row-responsive break-ipad">
                                        <div class="column align-start">
                                            <div class="column container-input-info-gral" >
                                            <h4 class="color-darkgray font-regular truncate">Telefono Domicilio</h4>
                                            <input type="text" name="txtTelDom" placeholder="018006971" class="input input-info-profile" disabled>
                                        </div>
                                        </div>
                                        <div class="column align-center">
                                            <div class="column container-input-info-gral">
                                            <h4 class="color-darkgray font-regular truncate">Telefono Celular</h4>
                                            <input type="text" name="txtTelCel" placeholder="<?php echo $this->datos['cel']; ?>" class="input input-info-profile" disabled>
                                            </div>
                                        </div>
                                        <div class="column align-end">
                                            <div class="column container-input-info-gral" >
                                            <h4 class="color-darkgray font-regular truncate">Correo Electronico</h4>
                                            <input type="email" name="txtCorreo" placeholder="<?php echo $this->datos['matricula']; ?>@upqroo.alumnos.com" class="input input-info-profile" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="white-space-32"></div>
                                    <div class="white-space-8"></div>
                                   
                                    <div class="white-space-64"></div>
                                </form>
								<div class="row">
                                    <button onclick="openModal('modal-password')"
                                        type="submit" class="btn btn-general-data bg-darkBlue color-white font-regular weight-semi">
                                        <i class="far fa-key icon-btn"></i>
                                        Cambiar Contraseña
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<div class="modal modal-confirm column justify-center align-center hidden  wow animated" data-wow-duration=".7s" id="modal-password">
                <div class="container modal-content align-center column" >
                    <div class="row-responsive justify-center header-tittle align-center header-tittle-modal" style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                        <div class="container-data header-content justify-center">
                            <div class="row auto">
                                <div class="column auto align-center">
                                    <h3 class="color-white weight-bold font-double">Cambiar Contraseña</h3>
                                </div>  
                            </div>
                            <div class="row auto">
                                <a href="javascript:void(0)" id="close-modal" onclick="closeModal('modal-password')">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="upload-summary column">
                        <div class="white-space-24"></div>
                        <form class="content column justify-center align-center" method="post" action="">
                            <input type="password" name="name_file" placeholder="Nueva Contraseña" class="input" required>
                            <div class="white-space-24"></div>
                            <button type="submit" id="submit-all" class="btn btn-admin btn-radius btn-large btn-darkBlue bg-darkBlue font-regular weight-bold color-white">
                                <i class="far fa-save icon-btn"></i>
                                Guardar Cambios
                            </button>
                        </form>
                    </div>
                <div class="white-space-32"></div>
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