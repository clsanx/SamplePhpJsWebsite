<?php
    session_start();
    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>QUIENES SOMOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel=icon href=../img/favicon.ico>
        <!-- Estilos -->
        <link href="../lib/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/angular-material.min.css" rel="stylesheet" type="text/css" />
        <link href="../lib/font-awesome.min.css" rel="stylesheet">
        <link href="../lib/bootstrap-social.css" rel="stylesheet">
        <link href="../lib/animate.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="../css/footer.css" rel="stylesheet" type="text/css" />
        <link href="../css/loginDropdown.css" rel="stylesheet" type="text/css" />
        
        
    </head>
    <body class="documentacion-larga">
        <header>
            <?php $view->loadNavbar(); ?>
        </header>
        <div class="container">
        
        <div class="col-md-10 col-md-offset-1">
            <h2>QUIENES SOMOS</h2><br/>
        <h3>COMPARTE GASTOS DE VIAJE EN CONFIANZA CON Z-CAR</h3><br/>
        <p>
            Z-CAR es la primera red social para compartir gastos en el desplazamiento al centro de estudios. La red social pone en contacto
            estudiantes del centro CIFP Zornotza LHII que quieren llegar al centro de estudios compartiendo un coche minimizando el impacto
            medio-ambiental y maximizando los recursos naturales limitados que nos ofrece la naturaleza cuidando el entorno.
            También se contempla la utilización de la red social por menores de edad siempre con el consentimiento y tutela de un adulto.
        </p>
        <p>
            Ademas de mejorar la movilidad, el descenso del consumo de recursos energéticos, el nivel de ruido y la contaminación.
            Se reducen los atascos y se aumentan los aparcamientos disponibles disminuyendo costes ya que compartir coche también significa
            compartir gastos. Los usuarios comparten los gastos del viaje sin obtener beneficio.
        </p>
        <p>
            Por citar inconvenientes de compartir coche podemos hablar de la perdida de independencia al tener que contar 
            con otras personas y ajustar horarios, o la necesidad de adquirir un compromiso social, pero realmente parecen 
            pocos comparados con las ventajas que nos ofrece compartir coche.
        </p>
        <p>
            Z-CAR ademas de poner en contacto a estudiantes del centro tambien valora la trayectoria como conductor o como pasajero.
            y con las puntuaciones de los pasajeros, el numero de Viajes y las opiniones de los pasajeros Z-CAR establece un perfil de conductor.
            Z-CAR no especifica ninguna cantidad de dinero pero si recomienda un minimo del precio de translado y recomienda
            ponerse de acuerdo con el conductor en el importe del Viaje. Hay que recordar que Z-CAR especifica que no se puede
            utilizar la Plataforma como medio para lucrarse.
        </p>
        <p>
            La utilizacion de la plataforma es abierta a todos los publicos con independencia de su edad. 
            En un principio la utilización de la plataforma estaba pensada para ser usada por alumnado oficialmente matriculados en el centro
            CIFP Zornotza LHII.
        </p>
        <p>
            También se contempla la utilización de la plataforma por parte de un familiar como conductor del vehiculo siendo 
            imprescindible que uno de los viajeros sea alumno del centro siendo el alumno el encargado de publicar el Viaje. 
        </p>
        <p>
            Para menores de edad es necesario el consentimiento como la tutela de un adulto tanto como para creación del Viaje y la conducción del vehículo.
        </p>
        <p>
            Al Registrarte en la Plataforma te comprometes a cumplir con las presentes CGU(Condiciones Generales de Uso) y la Política de privacidad. 
        </p>
        
        
        </div>
        </div>
        <footer>
           <?php $view->loadFooter(); ?> 
        </footer>
        
        <!-- App Dependencias -->
        <script src="../lib/jquery.js" type="text/javascript"></script>
        <script src="../lib/bootstrap.min.js" type="text/javascript"></script>
        <script src="../lib/angular.min.js" type="text/javascript"></script>
        <script src="../lib/angular-route.min.js" type="text/javascript"></script>
        <script src="../lib/angular-animate.min.js" type="text/javascript"></script>
        <script src="../lib/angular-aria.min.js" type="text/javascript"></script>
        <script src="../lib/angular-messages.js" type="text/javascript"></script>
        <script src="../lib/angular-material.min.js" type="text/javascript"></script>
        <script src="../node_modules/angular-star-rating/dist/index.js" type="text/javascript"></script>
        <script src="../js/scripts.js" type="text/javascript"></script>
        <script src="../js/viaje/publicar_viaje.js" type="text/javascript"></script>
        <script src="../lib/jquery_calendar.js" type="text/javascript"></script>
        <script src="../lib/jquery_calendar_ui.js" type="text/javascript"></script>
        
    </body>
</html>
