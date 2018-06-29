<?php

class Layout
{
    public function loadNavbar()
    {
        ?>
        <nav class="navbar navbar-default navbar-static-top">

                <div class="container-fluid">

                    <!-- Logo Boton -->
                    <div class="navbar-header">
                        <a href="https://reto3-clsantos.c9users.io/index.php" class="navbar-left"><img id="logo" src="https://reto3-clsantos.c9users.io/img/logo_z.png"></a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#zsxnavcollapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                    </div>

                    <div class="collapse navbar-collapse navbar-right" id="zsxnavcollapse">

                        <!-- Menu de navegacion -->
                        <ul class="nav navbar-nav">
                            <li><a href="https://reto3-clsantos.c9users.io/publicar_viaje.php">Publicar viaje</a></li>
                            
                            
                            <?php if (!isset($_SESSION['usuario'])) { //Sesión no iniciada.?> 
                            <!-- LOG IN -->
                            <li><a href="https://reto3-clsantos.c9users.io/registrar.php">Registrarme</a></li>
                            <li><a href="https://reto3-clsantos.c9users.io/login.php">Iniciar Sesión</a></li>
                            
                            <?php 
        } else { //Sesión iniciada.?>
                            
                            <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href=""><?= $_SESSION['usuario'] ?><span class="caret"></span></a>
                                    
                                    <ul class="dropdown-menu">
                                        <li><a href="micuenta.php?s=perfil" >Perfil</a></li>
                                        <li><a href="micuenta.php?s=viajes" >Viajes</a></li>
                                        <li><a href="micuenta.php?s=reservas" >Reservas</a></li>
                                        <li><a href="micuenta.php?s=alertas" >Alertas</a></li>
                                        <li><a href="micuenta.php?s=mensajes" >Mensajes</a></li>
                                        <li><a href="micuenta.php?s=opiniones" >Opiniones</a></li>
                                        <li><a href="../controllers/usuario/logout.php">Logout</a></li>
                                    </ul>
                                    </li>
                             
                            <?php 
        } ?>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        
        
        <?php

    }

    public function loadFooter()
    {
        ?>
        
                <div class="footer" id="footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <h3>Empieza con nosotros</h3>
                                <ul>
                                    <li><a href="https://reto3-clsantos.c9users.io/index.php">Inicio</a></li>
                                    <li><a href="https://reto3-clsantos.c9users.io/login.php">Iniciar sesión</a></li>
                                    <li><a href="https://reto3-clsantos.c9users.io/registrar.php">Registrarme</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <h3>Informacion legal</h3>
                                <ul>
                                    <li><a href="https://reto3-clsantos.c9users.io/politicas/condicionesgenerales.php">Condiciones de Uso</a></li>
                                    <li><a href="https://reto3-clsantos.c9users.io/politicas/politicaprivacidad.php">Politica de privacidad</a></li>
                                    <li><a href="https://reto3-clsantos.c9users.io/politicas/avisolegal.php">Aviso Legal</a></li>
                                </ul>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-4">
                                <h3>Acerca de nosotros</h3>
                                <ul>
                                    <li><a href="https://reto3-clsantos.c9users.io/politicas/quiensomos.php">Quienes somos</a></li>
                                    <li><a href="https://reto3-clsantos.c9users.io/politicas/contacto.php">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
        <!--<div id="footer" class="container">-->
        <!--    <div class="col-xs-12 col-sm-4 col-md-4">-->
        <!--        <span class="titulo_footer">Empieza con nostros</span><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/index.php">Inicio</a><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/login.php">Iniciar sesión</a><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/registrar.php">Registrarme</a>-->
        <!--    </div>    -->
            
        <!--    <div class="col-xs-12 col-sm-4 col-md-4">-->
        <!--        <span class="titulo_footer">Informacion legal</span><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/politicas/condicionesgenerales.php">Condiciones de Uso</a><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/politicas/politicaprivacidad.php">Politica de privacidad</a><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/politicas/avisolegal.php">Aviso Legal</a>-->
        <!--    </div>  -->
            
        <!--    <div class="col-xs-12 col-sm-4 col-md-4">-->
        <!--        <span class="titulo_footer">Acerca de nosotros</span><br>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/politicas/quiensomos.php">Quienes somos</a><br/>-->
        <!--        <a href="https://reto3-clsantos.c9users.io/politicas/contacto.php">Contacto</a>-->
        <!--    </div>-->
            
        <!--</div>-->
            
    <?php

    }

    public function loadDependenciasEstilos()
    {
        ?>
        
        <!-- Estilos -->
        <link href="lib/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="lib/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="lib/angular-material.min.css" rel="stylesheet" type="text/css" />
        <link href="lib/font-awesome.min.css" rel="stylesheet">
        <link href="lib/bootstrap-social.css" rel="stylesheet">
        <link href="lib/animate.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="css/footer.css" rel="stylesheet" type="text/css" />
        <link href="css/loginDropdown.css" rel="stylesheet" type="text/css" /> 
        <link rel=icon href=img/favicon.ico>
        
        <?php

    }

    public function loadDependenciasScripts()
    {
        ?>
        
        <!-- App Dependencias -->
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="lib/bootstrap.min.js" type="text/javascript"></script>
        <script src="lib/angular.min.js" type="text/javascript"></script>
        <script src="lib/angular-route.min.js" type="text/javascript"></script>
        <script src="lib/angular-animate.min.js" type="text/javascript"></script>
        <script src="lib/angular-aria.min.js" type="text/javascript"></script>
        <script src="lib/angular-messages.js" type="text/javascript"></script>
        <script src="lib/angular-material.min.js" type="text/javascript"></script>
        <script src="node_modules/angular-star-rating/dist/index.js" type="text/javascript"></script>
        <!--<script src="js/scripts.js" type="text/javascript"></script>-->
        <script src="js/viaje/publicar_viaje.js" type="text/javascript"></script>
        <script src="lib/jquery_calendar.js" type="text/javascript"></script>
        <script src="lib/jquery_calendar_ui.js" type="text/javascript"></script>
        <!--<script src="lib/map/initmap.js" type="text/javascript" async defer></script>-->
        <!--<script src="lib/ui-bootstrap-tpls-2.3.1.min.js" type="text/javascript"></script>-->
       
        <?php

    }
}
