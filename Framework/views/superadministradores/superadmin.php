<!--
*  superadmin.html 
*  @version: 1.0.0
*  @author: Universidad Politecnica - Jazmin Pool
*  @description: SUPER ADMINISTRADOR
*  @date: 15/07/2019
*  
* Nota: Este es el menu con el logo circular, para llevarlo a otras vistas, debes copiar todo el div que tiene como clase "menu", este mensaje deberá ser removido :usalu2
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>./public/css/style.css">
    </link>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>./public/fontawesome/css/all.css">
    <title>Super Administrador</title>
</head>

<body>
    <div class="main flex">
        <div class="column superadmin full">
            <div class="row-responsive">
                <div class="column align-center justify-center menu" tabindex="0">
                    <div class="smartphone-menu-trigger"></div>
                    <div class="white-space-24"></div>

                    <div class="responsive-img item-left justify-center align-center logo">
                        <img src="<?php echo constant('URL'); ?>/public/img/upqroo-newlogo@2x.png" alt="responsive img" title="responsive img"
                            class="cover-img " />
                    </div>

                    <!-- <div class="white-space-32"></div> -->
                    <div class="white-space-8"></div>

                    <div class="column main align-center auto">
                        <div class="menu-options">
                            <a href="<?php echo constant('URL'); ?>super-administrador/formatos" class="item-left">
                                <div class="row justify-center align-start">
                                    <div class="column icon align-center"><i class="fa fa-file-upload"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Formatos</h4>
                                    </div>
                                </div>
                            </a>

                            <a href="<?php echo constant('URL'); ?>administrador/crearNoticia" class="item-left">
                                <div class="row justify-center">
                                    <div class="column icon align-center"><i class="fa fa-newspaper"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Noticias</h4>
                                    </div>
                                </div>
                            </a>

                               <a href="<?php echo constant('URL'); ?>super-administrador/agregar-administrador" class="item-left">
                                <div class="row justify-center">
                                    <div class="column icon align-center"><i class="fa fa-users-crown"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Agregar administrador</h4>
                                    </div>
                                </div>
                            </a>
                            <a href="<?php echo constant('URL'); ?>logout" class="item-left">
                                <div class="row justify-center">
                                    <div class="column icon align-center"><i class="fa fa-sign-out"></i></div>
                                    <div class="column full">
                                        <h4 class="color-white weight-regular font-small">Cerrar Sesion</h4>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
                <!--/.menu super admin-->
                <div class="column align-center body">
                    <div class="row-responsive full">
                        <div class="row-responsive justify-center header-tittle align-center"
                            style="background-image: url(<?php echo constant('URL'); ?>public/img/new-footer-blue.png)">
                            <div class="column container-data align-start header-content">
                                <div class="row auto">
                                    <div class="column auto">
                                        <h1 class="color-white weight-bold">Super Administrador</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.header title-->

                    <div class="white-space-24"></div>

                    <div class="row-responsive container-data container-form">
                        <div class="column full">
                            
                            <!--/.title-->
                            
                            <div class="white-space-8"></div>

                            <div class="row-responsive justify-center">
                                <div class="column superadmin-input">
                                    <h4 class="color-darkgray font-regular">Matr&iacute;cula</h4>
                                    <input type="text" name="mat" placeholder="<?php echo $this->datos['matricula']; ?>"
                                        class="input input-info-profile" required>
                               
                                </div>

                                <div class="column superadmin-input">
                                    <h4 class="color-darkgray font-regular">Contraseña</h4>
                                    <input type="password" name="pas" placeholder="*******" class="input input-info-profile" required>
                                </div>
                            </div>
                            <div class="row-responsive justify-center">
                                <div class="column superadmin-input">
                                    <h4 class="color-darkgray font-regular">Email</h4>
                                    <input type="email" name="ema" placeholder="<?php echo $this->datos['matricula']; ?>@upqroo.edu.mx"
                                        class="input input-info-profile" required>
                                </div>
                                <div class="column superadmin-input">
                                    <h4 class="color-darkgray font-regular">Carrera</h4>
                                    <input type="text" name="car" placeholder="Ing. Software"
                                        class="input input-info-profile" required>
                                </div>
                            </div>

                             <div class="row-responsive justify-center">
                                <div class="column superadmin-input">
                                    <h4 class="color-darkgray font-regular">Nombre</h4>
                                    <input type="text" name="nom" placeholder="<?php echo $this->datos['nombre']; ?>"
                                        class="input input-info-profile" required>
                                </div>
                            </div>


                            <div class="white-space-16"></div>

                            
                        </div>
                   
                    </div>
                    <!--/.content-->

                </div>
                <!--/.body content-->
            </div>
            <!--/.row-responsive-->
        </div>
        <!--/.column calificaciones-->

    </div>
    <!--/.main flex-->

</body>

</html>

