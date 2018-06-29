<?php
    session_start();

    if (empty($_SESSION)) {
        header('Location: https://reto3-clsantos.c9users.io/login.php');
        die();
    }

    require_once 'views/layout.php'; // Vistas Generales
    require_once 'views/Usuario_vista.php'; // Vistas Usuario
    require_once 'views/Viaje_vista.php'; // Vistas Viaje

    $view = new Layout();
    $viewuser = new Usuario_vista();
    $viewviaje = new Viaje_vista();
?>
<html ng-app="appViaje">

    <head>
        <title>RETO_3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link rel=icon href=img/favicon.ico>-->

        <!-- Estilos -->
        <?= $view->loadDependenciasEstilos(); ?>
        <link href="css/publicar_viaje.css" rel="stylesheet" type="text/css" />
        <link href="css/jquery_calendar.css" rel="stylesheet" type="text/css" />
        <link href="node_modules/angular-date-picker/angular-date-picker.css" rel="stylesheet" type="text/css" />


    </head>

    <body>
        <div id="wrapper">
            <header>
                <?= $view->loadNavbar(); ?>
            </header>

            <main ng-controller="ctrViaje" ng-cloak>
                <!-- Contenido aqui -->
                <?= $viewviaje->loadPublicarViaje(); ?>


                <!--<br/><br/><center>-->

                <!--    <pre>{{ nuevoUsuarioForm | json }}</pre>-->
                <!--    <br/>-->
                    <!--<pre>{{ nuevoUsuario }}</pre>-->

                <!--</center>-->

            </main>

            <footer>
                <?= $view->loadFooter(); ?>
            </footer>

        </div>




        <!-- Scripts -->
        <?= $view->loadDependenciasScripts(); ?>
        <script src="node_modules/angular-date-picker/angular-date-picker.js" type="text/javascript"></script>
        
        <script type="text/javascript">
//              $.datepicker.regional['es'] = {
//  closeText: 'Cerrar',
//  prevText: '< Ant',
//  nextText: 'Sig >',
//  currentText: 'Hoy',
//  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
//  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
//  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
//  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
//  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
//  weekHeader: 'Sm',
//  dateFormat: 'yy-mm-dd',
//  firstDay: 1,
//  isRTL: false,
//  showMonthAfterYear: false,
//  yearSuffix: ''
//  };
//  $.datepicker.setDefaults($.datepicker.regional['es']);
// 	$(function(){
// 		$('.datepicker').datepicker({
//       numberOfMonths: 3,
//       showButtonPanel: true
//     });   //funcion de inicializacion del Datepicker
               
   
// 	})
        // function Ver(){
        //      alert($('.datepicker'));
        // }
        
	</script>


    </body>

</html>
