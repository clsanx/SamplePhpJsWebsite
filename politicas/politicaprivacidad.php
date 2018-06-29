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
        <title>POLITICA DE PRIVACIDAD</title>
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
            <?= $view->loadNavbar(); ?>
        </header>
        <div class="container">
            <div class="col-md-10 col-md-offset-1">   
                <h2>POLITICA DE PRIVACIDAD</h2><br/>
                <span>INFORMACION GENERAL</span>
                <p>Z-CAR, S.A. sociedad domiciliada en Amorebieta-Etxano (48340 Vizcaya) en la calle Urritxe s/n, 
                    con N.I.F. A-12345678. Inscrita en el Registro Mercantil de Bizkaia, Tomo 4270, Folio 200, Hoja BI-34700, Inscripción 1ª, teléfono 94 673 02 51
                    y e-mail info@z-car.com (en adelante "Z-CAR") es la titular de este sitio Web (www.reto3-clsantos.c9users.io).
                </p>   
                <p>
                   La política de privacidad que se describe a continuación sólo es aplicable al presente Sitio Web, entendiendo como tal todas las páginas y subpáginas incluidas en el dominio
                   www.reto3.com, declinando Z-CAR cualquier responsabilidad sobre las diferentes políticas de privacidad y 
                   protección de datos de carácter personal que puedan contener los Sitios Web a los cuales pueda accederse a través de los hipervínculos ubicados en este Sitio Web y 
                   no gestionados directamente por nuestro webmaster.
                </p>    
                <p>
                    Z-CAR desea poner en conocimiento de los usuarios de este Sitio Web que la presente declaración refleja la política en materia de protección de datos
                    que sigue Z-CAR. Esta política se ha configurado respetando escrupulosamente la normativa vigente en materia de protección de datos de carácter personal,
                    esto es, entre otras, la Ley Orgánica 15/1999, de 13 de Diciembre, de Protección de Datos de carácter personal (en adelante LOPD) y el Real Decreto 994/1999,
                    de 11 de Junio que aprueba el Reglamento de medidas de seguridad de los ficheros automatizados que contengan datos de carácter personal (en adelante Reglamento 994/1999).
                </p>
            
            </div>
            <div class="col-md-10 col-md-offset-1">   
                <span>Recogida de datos de carácter personal</span>
                <p>Z-CAR no recaba datos de carácter personal de los usuarios de este Sitio Web, siendo perfectamente posible la navegación anónima por el Sitio Web, 
                    si el Usuario así lo desea.
                    Z-CAR sólo dispondrá de datos personales de aquellos usuarios que voluntariamente quieran proporcionárselos a través del e-mail de contacto,
                    establecido al efecto. Sólo en estos casos en que el Usuario lo desee, y siempre de forma voluntaria, podrá comunicar los datos de carácter personal que considere oportunos a
                    Z-CAR
                </p>
            
             
                
                <p>Dichos datos proporcionados voluntariamente por el usuario serán incorporados a un fichero automatizado denominado “Usuarios del Sitio Web” 
                    registrado en el Registro General de Protección de Datos bajo la titularidad de Z-CAR, S.A., creado con la finalidad de “Informar a los usuarios sobre los 
                    servicios ofrecidos por la Empresa”. En consecuencia, el Usuario que proporcione a Z-CAR sus datos personales, acepta expresamente el tratamiento automatizado 
                    de los mismos, con la finalidad de que Z-CAR pueda informarle de los servicios empresariales que desarrolla. 
                </p>
            
               
                
                <p>Z-CAR utiliza "cookies" o dispositivos de recogida automática de información, esto es, pequeños archivos que se depositan en el disco duro de los usuarios del 
                    Sitio Web y que sirven para reconocer el navegador de un ordenador determinado, y no proporcionan por sí mismos datos personales del Usuario del terminal.
                </p>
            </div>
            
            <div class="col-md-10 col-md-offset-1">   
                <span>MEDIDADAS DE SEGURIDAD</span>
                <p>Los datos personales recogidos por el Sitio Web, son almacenados en bases de datos, cuya titularidad corresponde en exclusiva a Z-CAR, 
                    asumiendo ésta todas las medidas de índole técnica, organizativa y de seguridad que garantizan la confidencialidad, integridad y calidad de la información 
                    contenida en las mismas de acuerdo con lo establecido en la LOPD y en el Reglamento 994/1999.
                </p>
            
                <p>Es posible que terceras personas o Entidades tengan acceso a los ficheros automatizados titularidad de Z-CAR que contengan datos de carácter personal, 
                    en el marco de la prestación de servicios de "hosting" y mantenimiento del Sitio Web, si bien, dicho acceso se llevará a cabo de conformidad con lo 
                    dispuesto en el artículo 12 de la LOPD, relativo al acceso a datos por cuenta de terceros. 
                </p>
            
                <p>La comunicación entre los usuarios y Z-CAR no utiliza un canal seguro, y los datos transmitidos no viajan cifrados, por lo que se solicita a los usuarios que
                    se abstengan de enviar aquellos datos personales que merezcan la consideración de datos especialmente protegidos en los términos del artículo 7 de la LOPD, 
                    ya que las medidas de seguridad aplicables a un canal no seguro lo hacen desaconsejable.
                </p>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <span>Modificaciones en nuestra política de privacidad</span>
                <p>
                    Cualquier modificación que realicemos en nuestra Política de Privacidad se publicará en esta página.
                    Cuando corresponda, te lo notificaremos o pediremos tu consentimiento. Por favor, comprueba frecuentemente si
                    existe alguna actualización o modificación en nuestra Política de Privacidad.
                </p>
            </div>
            <div class="col-md-10 col-md-offset-1">   
                <span>CESIÓN DE DATOS</span>
                <p>Los datos de carácter personal recogidos a través de este Sitio Web no serán objeto de cesión a ningún otro sujeto ni empresa, salvo a los sujetos
                    y en los supuestos concretos en que dicha cesión se configura como obligatoria por la LOPD.
                </p>
            
                <p>Los datos recogidos serán tratados siempre respetando la normativa vigente en materia de protección de datos de
                    carácter personal.
                </p>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <span>Qué derechos que puedes ejercer respecto a tus datos personales</span>
                <p>
                    Cuando así lo permita la Ley, podrás tener derecho a obtener una copia de tus datos personales que obren en nuestro
                    poder. Antes de responder a tu solicitud, podremos pedirte que verifiques tu identidad y nos proporciones
                    información más detallada para que podamos responder mejor a tu solicitud. Trataremos de responder en un plazo de
                    tiempo razonable y, en todo caso, dentro del plazo requerido por la Ley. Si quieres ejercer este derecho, por favor,
                    ponte en contacto con nosotros a través de los datos de contacto que te proporcionamos más adelante.
                </p>
                <p>
                    Como miembro de nuestra Página Web, puedes acceder a tus datos personales que obren en nuestro poder a través de tu
                    cuenta, para corregir, modificar, o eliminar información que no sea correcta. Deberás proporcionarnos información
                    veraz, correcta y completa para tu cuenta online, así como mantenerla actualizada. Podrás actualizar o eliminar tus
                    datos personales, u oponerte a un tratamiento específico, poniéndote en contacto con nosotros a través de los datos
                    de contacto que te facilitamos más adelante.
                </p>
                <p>
                    Ten en cuenta que en determinados casos podremos conservar algunos datos tuyos, si así lo requiere la Ley o si
                    tenemos motivos legítimos para ello. Por ejemplo, si consideramos que has cometido un fraude o que has infringido
                    nuestros Términos y Condiciones, podremos querer conservar parte de tu información para evitar que puedas eludir
                    las normas aplicables a nuestra Comunidad.
                </p>
            </div>
            <div class="col-md-10 col-md-offset-1">   
                <span>Calidad de los datos: derechos de acceso, oposición, rectificación y cancelación</span>
                <p>Z-CAR se compromete a mantener en todo momento, los datos personales que voluntariamente le hayan proporcionado los usuarios de este Sitio Web,
                    actualizados, de manera que respondan verazmente a la identidad y características personales de dichos usuarios. Por ello, cualquier 
                    Usuario puede en cualquier momento ejercer el derecho a acceder, rectificar y, en su caso, cancelar sus datos de carácter personal suministrados 
                    a Z-CAR, mediante comunicación escrita dirigida a:
                </p>
                <p>
                  Z-CAR, S.A. sociedad domiciliada en Amorebieta-Etxano (48340 Vizcaya) en la calle Urritxe s/n o enviando un e-mail a info@z-car.com   
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
