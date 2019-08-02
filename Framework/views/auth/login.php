<!--
*  login.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool, kath
*  @description: LOGIN DEL ALUMNO
*  @date: 09/06/2019
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/style.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/animate.css"></link>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo constant('URL'); ?>public/js/modals.js"></script>
    <title>SEE - Kardex</title>
    <link rel="shortcut icon" href="">
</head>
<body>
    <div class="main flex">
        <div class="column login full">
            <div class="row background-login" >
                <div class="column justify-center align-center">
                    <div class="row">
                        <div class="column left justify-center align-center" style="background-image: url(<?php echo constant('URL'); ?>public/img/leftblue.jpg)">
                                <div class="container responsive-img item-left justify-center align-center">
                                    <img src="<?php echo constant('URL'); ?>public/img/upqroonew.png" alt="Universidad Politecnica" title="Universidad Politecnica" class="cover-img logo"/>
                                </div>
                        </div>
                        
                        <div class="column right align-center justify-center">
                            <div class="row container justify-center">
                                <form class="column form-data" method="POST" action="login" id="login">
                                    <div class="row responsive-img item-left justify-center align-center">
                                        <img src="<?php echo constant('URL'); ?>public/img/politecnica.jpg" alt="Universidad Politecnica" title="Universidad Politecnica" class="cover-img logo-mobile"/>
                                    </div>
                                    <h1 class="color-darkBlue font-double text-center title">UNIVERSIDAD POLITÉCNICA DE QUINTANA ROO</h1>
                                    <div class="white-space-24"></div>
                                    <p class="color-darkgray font-medium text-center">Introduzca sus datos de acceso</p>
                                    <div class="white-space-32"></div>
                                   
                                    <input type="text" name="matricula" placeholder="Matricula" class="input input-form" required>
                                    <div class="white-space-24"></div>
                                    <input type="password" name="pass" placeholder="Contraseña" class="input input-form" required>
                                    <div class="white-space-32"></div>
                                    <button class="btn btn-login  bg-darkBlue color-white font-regular weight-semi">
                                            INGRESAR 
                                    </button>

                                    <!-- Errores inico (Mover a donde vayan)-->
                                    <div class="white-space-32"></div>

                                    
                                    <?php if (isset($this->error)):
                                        //Codigo js para alert con import de librerias
                                        include './views/alerts/Headers.php';
                                        echo '<script type="text/javascript" async="async">';
                                        echo 'setTimeout(function () { swal("Datos incorrectos!","Intente de nuevo","error");';
                                        echo '}, 800);</script>';
                                        ?>
                                        <!--<div class="row-responsive justify-center">
                                            <div class="column text-left ">
                                                <p class=""><?php //echo $this->error; ?></p>
                                            </div>
                                        </div>-->
                                        <div class="white-space-32"></div>
                                    <?php endif ?>
                                    <!--Errores fin-->     
									<div class="white-space-24"></div>
                                    <div class="row justify-center">
                                    <a href="javascript:void(0)" onclick="openModal('modal-password')" class="color-lightBlue weight-semi text-center">¿Olvidaste tu contraseña?</a>
                                    </div>
                                    
                                    <div class="white-space-24"></div>
                                    <div class="row justify-center">
                                   <!-- <a class="color-lightBlue weight-semi text-center">¿Olvidaste tu contraseña?</a> -->
                                    </div>
                                </form>                               
                            </div>
                        </div> 
                    </div>

                   
                </div>
            </div> <!--/.background login-->
            
        </div> <!--/.column login-->
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
                        <form class="content column justify-center align-center" method="post" action="newpass">
                            <input type="text" name="matricula" placeholder="Matricula" class="input" required>
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

    </div> <!--/.main flex-->
    
</body>
</html>