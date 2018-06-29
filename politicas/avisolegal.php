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
        <title>AVISO LEGAL</title>
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
        <main>
            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <h2>AVISO LEGAL</h2><br/>
                    <span>DATOS GENERALES</span>
                    <p>De acuerdo con el artículo 10 de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y de Comercio Electrónico ponemos a su disposición los siguientes datos: Z-CAR, S.A. sociedad domiciliada en Amorebieta-Etxano
                        (48340 Vizcaya) en la calle Urritxe s/n, con N.I.F. A-12345678. Inscrita en el Registro Mercantil de Bizkaia, Tomo 4270, Folio 200, Hoja BI-34700, Inscripción 1ª, teléfono 94 673 02 51 y e-mail info@z-car.com (en adelante “Z-CAR”).
                        En la web www.reto3-clsantos.c9users.io hay una serie de contenidos de carácter informativo sobre programación web. Su principal objetivo es facilitar a los clientes y al público en general, la información relativa a la empresa, a los productos y
                        servicios que se ofrecen. En este Sitio Web no se ofrece la posibilidad de comprar los productos o contratar los servicios ofrecidos. La información provista en el Sitio Web sólo tiene un carácter indicativo, orientativo y estimativo
                        y nunca tendrá valor vinculante para Z-CAR.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>POLÍTICA DE PRIVACIDAD</span>
                    <p>En cumplimiento de lo dispuesto en la Ley Orgánica 15/1999, de 13 de Diciembre, de Protección de Datos de Carácter Personal (LOPD) se informa al usuario que todos los datos que nos proporcione serán incorporados a un fichero, creado y
                        mantenido bajo la responsabilidad de Z-CAR. Siempre se va a respetar la confidencialidad de sus datos personales que sólo serán utilizados con la finalidad de gestionar los servicios ofrecidos, atender a las solicitudes que nos plantee,
                        realizar tareas administrativas, así como remitir información técnica, comercial o publicitaria por vía ordinaria o electrónica. Para ejercer sus derechos de oposición, rectificación o cancelación deberá dirigirse a la sede de la empresa
                        Urritxe s/n, escribirnos al siguiente correo info@z-car.com o llámanos al 94 673 02 51.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>CONDICIONES DE USO</span>
                    <p>Las condiciones de acceso y uso del presente sitio web se rigen por la legalidad vigente y por el principio de buena fe comprometiéndose el usuario a realizar un buen uso de la web. No se permiten conductas que vayan contra la ley, los
                        derechos o intereses de terceros. Ser usuario de la web de www.reto3-clsantos.c9users.io implica que reconoce haber leído y aceptado las presentes condiciones y lo que las extienda la normativa legal aplicable en esta materia. Si por el motivo que fuere no
                        está de acuerdo con estas condiciones no continúe usando esta web. Cualquier tipo de notificación y/o reclamación solamente será válida por notificación escrita y/o correo certificado.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>RESPONSABILIDADES</span>
                    <p>Z-CAR no se hace responsable de la información y contenidos almacenados en foros, redes sociales o cualesquier otro medio que permita a terceros publicar contenidos de forma independiente en la página web del prestador. Sin embargo,
                        teniendo en cuenta los art. 11 y 16 de la LSSI-CE, Z-CAR se compromete a la retirada o en su caso bloqueo de aquellos contenidos que pudieran afectar o contravenir la legislación nacional o internacional, derechos de terceros o la
                        moral y el orden público. Tampoco la empresa se responsabilizará de los daños y perjuicios que se produzcan por fallos o malas configuraciones del software instalado en el ordenador del internauta. Se excluye toda responsabilidad por
                        alguna incidencia técnica o fallo que se produzca cuando el usuario se conecte a internet. Igualmente no se garantiza la inexistencia de interrupciones o errores en el acceso al sitio web. Así mismo, Z-CAR se reserva el derecho a
                        actualizar, modificar o eliminar la información contenida en su página web, así como la configuración o presentación del mismo, en cualquier momento sin asumir alguna responsabilidad por ello. Le comunicamos que cualquier precio que
                        pueda ver en nuestra web será solamente orientativo. Si el usuario desea saber con exactitud el precio o si el producto en el momento actual cuenta con alguna oferta de la cual se puede beneficiar ha de acudir a alguna de las tiendas
                        físicas con las que cuenta Z-CAR.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>PROPIEDAD INTELECTUAL E INDUSTRIAL</span>
                    <p>Z-CAR es titular de todos los derechos sobre el software de la publicación digital así como de los derechos de propiedad industrial e intelectual referidos a los contenidos que se incluyan, a excepción de los derechos sobre productos
                        y servicios de carácter público que no son propiedad de esta empresa. Ningún material publicado en esta web podrá ser reproducido, copiado o publicado sin el consentimiento por escrito de Z-CAR. Toda la información que se reciba
                        en la web, como comentarios, sugerencias o ideas, se considerará cedida a Z-CAR de manera gratuita. No debe enviarse información que NO pueda ser tratada de este modo. Todos los productos y servicios de estas páginas que NO son propiedad
                        de Z-CAR son marcas registradas de sus respectivos propietarios y son reconocidas como tales por nuestra empresa. Solamente aparecen en la web de Z-CAR a efectos de promoción y de recopilación de información. Estos propietarios
                        pueden solicitar la modificación o eliminación de la información que les pertenece.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>ACCESO AL SITIO WEB</span>
                    <p>El acceso a este Sitio Web es libre y gratuito. No obstante, Z-CAR ofrece a los usuarios del Sitio Web la posibilidad de ponerse en contacto con Z-CAR por medio de e-mail con la finalidad de obtener mayor información sobre los servicios
                        prestados por la Empresa. El usuario que libre y voluntariamente se comunique con Z-CAR proporciona los datos personales que considere oportunos a Z-CAR y por tanto autoriza expresamente a Z-CAR a servirse de dichos datos para
                        enviarle comunicaciones comerciales sobre sus productos o servicios, mientras no manifieste expresamente su rechazo a recibir dichas comunicaciones. Los datos proporcionados por el Usuario a Z-CAR a través de e-mail, serán tratados
                        conforme a lo descrito en la "Política de Privacidad" de este Sitio Web y siempre respetando la legislación vigente en cada momento en materia de protección de datos de carácter personal. La comunicación vía e-mail entre los usuarios
                        y Z-CAR no utiliza un canal seguro, y los datos transmitidos no viajan cifrados, por lo que se solicita a los usuarios que se abstengan de enviar aquellos datos personales que merezcan la consideración de datos especialmente protegidos
                        en los términos del artículo 7 de la LOPD, ya que las medidas de seguridad aplicables a un canal no seguro lo hacen desaconsejable. Toda la información que facilite el Usuario a la "EMPRESA" deberá ser veraz. A estos efectos, el Usuario
                        garantiza la autenticidad de todos aquellos datos que comunique a Z-CAR. De igual forma, será responsabilidad del Usuario mantener toda la información facilitada a Z-CAR permanentemente actualizada de forma que responda, en cada
                        momento, a la situación real del Usuario. En todo caso el Usuario será el único responsable de las manifestaciones falsas o inexactas que realice y de los perjuicios que cause a Z-CAR o a terceros por la información que facilite.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>LEY APLICABLE Y JURISDICCIÓN</span>
                    <p>Las presentes condiciones generales se rigen por la legislación española. Para cualquier litigio que pudiera surgir relacionado con el sitio web o la actividad que en él se desarrolla serán competentes Juzgados de Amorebieta-Etxano, renunciando
                        expresamente el usuario a cualquier otro fuero que pudiera corresponderle.
    
                    </p>
                </div>
                <div class="col-md-10 col-md-offset-1">
                    <span>POLÍTICA DE COOKIES</span>
                    <p>Z-CAR por su propia cuenta o la de un tercero contratado para prestación de servicios de medición, pueden utilizar cookies cuando el usuario navega por el sitio web. Las cookies son ficheros enviados al navegador por medio de un servicio
                        web con la finalidad de registrar las actividades del usuario durante su tiempo de navegación. Las cookies utilizadas se asocian únicamente con un usuario anónimo y su ordenador, y no proporcionan por sí mismas los datos personales
                        del usuario. Mediante el uso de las cookies resulta posible que el servidor donde se encuentra la web reconozca el navegador web utilizado por el usuario con la finalidad de que la navegación sea más sencilla. Se utilizan también para
                        medir la audiencia y parámetros del tráfico, controlar el proceso y número de entradas. El usuario tiene la posibilidad de configurar su navegador para ser avisado de la recepción de cookies y para impedir su instalación en su equipo.
                        Por favor consulte las instrucciones y manuales de su navegador para ampliar esta información. Para utilizar el sitio web no es necesario que el usuario permita la instalación de las cookies enviadas al sitio web, o el tercero que
                        actúe en su nombre, sin perjuicio de que sea necesario que el usuario inicie una sesión tal en cada uno de los servicios cuya prestación requiera el previo registro. En todo caso las cookies tienen un carácter temporal con la única
                        finalidad de hacer más eficaz su transmisión ulterior. En ningún caso se utilizará cookies para recoger información de carácter personal.
                    </p>
                </div>
            </div>
        </main>
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
