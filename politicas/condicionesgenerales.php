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
        <title>CONDICIONES GENERALES</title>
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
        <h2>CONDICIONES DE USO</h2><br/>
        <span>CONDICIONES GENERALES DE USO</span>
        <p>Z-CAR SA (de aquí en adelante denominada “Z-CAR”) ha desarrollado una plataforma de trayectos compartidos a la que se
            puede acceder desde el sitio web www.reto3-clsantos.c9users.io o desde una aplicación móvil, diseñada para poner en contacto a los
            conductores que viajan a un determinado destino con pasajeros que se dirigen al mismo lugar, de forma que puedan
            compartir el Trayecto así como los costes asociados al mismo (en adelante denominada la “Plataforma”).<br/>
            Los presentes términos y condiciones tienen por objeto regular el acceso y los términos de uso de la Plataforma. 
            Se ruega leer atentamente estas condiciones. Entiendes y reconoces que Z-CAR no es parte en ningún contrato, acuerdo
            o relación contractual, de ninguna clase, suscrito entre los Usuarios de su Plataforma.
        </p>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <span>ACCESO A LA PLATAFORMA Y REGISTRO</span>
                <p>El acceso a la Plataforma es libre y gratuito. No obstante, para poder acceder a determinados servicios de Z-CAR
                tendrás que registrarte a través de la misma. La seguridad en el acceso de usuarios registrados en la Plataforma se
                articula con tu correo electrónico y la contraseña. En el momento en el que el mero visitante se registra en la Plataforma
                pasa a ser un usuario de la misma (en adelante, el “Usuario”).</p>
                <p>La contraseña, personal e intransferible, deberá ser generada por el Usuario de acuerdo a las reglas de robustez y
                complejidad que se establezcan en cada momento por Z-CAR. La contraseña creada por el Usuario tendrá una validez temporal
                ilimitada. Si el Usuario seleccionara una contraseña que no cumpliera con los requisitos mínimos conforme a la política de
                contraseñas aprobada y vigente en Z-CAR, será avisado de dicho incumplimiento y de los condicionamientos que debe reunir
                dicha contraseña para una efectiva validez al alta del interesado en el registro de Usuarios de la Plataforma.
                La Plataforma dispone de las funcionalidades necesarias para que el Usuario pueda cambiar su contraseña cuando lo
                considere oportuno, por ejemplo, porque sospeche o constate que se haya producido una quiebra de la confidencialidad de
                la contraseña.</p>    
                <p>Como Usuario, te comprometes a hacer un uso diligente de tu contraseña y mantenerla en secreto, no transmitiéndola a ningún
                tercero. En consecuencia, los Usuarios son responsables de la adecuada custodia y confidencialidad de cualesquiera
                identificadores y/o contraseñas que hayan seleccionado como Usuarios registrados en Z-CAR, y se comprometen a no ceder su uso
                a terceros, ya sea temporal o permanentemente, ni permitir su acceso a personas ajenas. Será responsabilidad del Usuario la
                utilización ilícita de la Plataforma por cualquier tercero ilegítimo, que emplee a tal efecto una contraseña a causa de una
                utilización no diligente o de la pérdida de la misma por el Usuario.</p>
                <p>En virtud de lo anterior, será obligación del Usuario notificar de forma inmediata a los gestores de la Plataforma acerca de cualquier hecho que permita el uso indebido de los identificadores y/o contraseñas, tales como el robo, el extravío, o el acceso no autorizado a los mismos, con el fin de proceder a su inmediata cancelación.</p>
                <p>Te rogamos que nos comuniques inmediatamente cualquier abuso o vulneración de estas Condiciones de Uso que detectes y,
                en particular, aquéllos que afecten a menores.</p>
            </div>
            <div class="col-md-10 col-md-offset-1">   
                <span>USO DE LA PLATAFORMA</span>
                <p>No está permitido y, por tanto, sus consecuencias serán de tu exclusiva responsabilidad, el acceso o la utilización de la
                Plataforma con fines ilegales o no autorizados, con o sin finalidad económica y, más específicamente y sin que el siguiente
                listado tenga carácter absoluto, queda prohibido:</p>
                <ul>
                <li>Utilizar la Plataforma o sus contenidos con fines ilícitos.</li>
                <li>Usar la Plataforma en forma alguna que pueda provocar daños, interrupciones, ineficiencias o defectos en su funcionalidad o en el ordenador de un tercero.</li>
                <li>Usar la Plataforma para la transmisión, la instalación o la publicación de cualquier virus, código malicioso u otros programas o archivos perjudiciales o de cualquier material de carácter difamatorio, ofensivo, racista, vulgar, denigrante, pornográfico, o de naturaleza obscena o amenazadora o que pueda causar molestia a cualquier persona.</li>
                <li>Usar la Plataforma para recoger datos de carácter personal de otros usuarios.</li>
                <li>Usar la Plataforma de manera que constituya una vulneración de los derechos de Z-CAR o de cualquier tercero.</li>
                <li>Registrarse a través de la Plataforma con una identidad falsa, suplantando a terceros o utilizando un perfil o realizando cualquier otra acción que pueda confundir a otros usuarios sobre la identidad del origen de un mensaje.</li>
                <li>Usar la Plataforma para transmitir material con fines publicitarios o de promoción, incluidos spam, correos electrónicos en cadena o similares. La información publicada en la Plataforma para compartir coche sólo puede usarse para fines privados. El usuario no está autorizado a hacer referencia a ofertas comerciales de viaje.</li>
                <li>Acceder sin autorización a cualquier sección de la Plataforma, a otros sistemas o redes conectadas a la Plataforma, a ningún servidor de Amovens ni a los servicios ofrecidos a través de la Plataforma, por medio de pirateo o falsificación, extracción de contraseñas o cualquier otro medio ilegítimo.</li>
                <li>Quebrantar, o intentar quebrantar, las medidas de seguridad o autenticación de la Plataforma o de cualquier red conectada a la misma.</li>
                <li>Llevar a cabo alguna acción que provoque una saturación desproporcionada o innecesaria en la infraestructura de la Plataforma o en los sistemas o redes de Z-CAR, así como en los sistemas y redes conectadas a la Plataforma.</li>
                <li>Usar la Plataforma de forma ilegal, en contra de la buena fe, la moral y el orden público.</li>
                <li>Impedir el normal desarrollo de cualquier actividad disponible a través de la Plataforma o cualesquiera de sus funcionalidades, ya sea alterando o tratando de alterar, ilegalmente o de cualquier otra forma, el acceso, participación o funcionamiento de aquéllos, o falseando el resultado de los mismos y/o utilizando métodos de participación fraudulentos, mediante cualquier procedimiento y/o a través de cualquier práctica que atente o vulnere en modo alguno las presentes Condiciones de Uso.</li>    
                </ul>
                <p>El incumplimiento de cualquiera de las obligaciones anteriores por el Usuario, podrá llevar aparejada la adopción por Z-CAR de
                las medidas necesarias, pudiendo llegar a la eliminación o bloqueo de la cuenta del Usuario infractor.</p>
            </div>    
           <div class="col-md-10 col-md-offset-1">
                <span>DERECHOS DE PROPIEDAD INTELECTUAL Y DE PROPIEDAD INDUSTRIAL</span>    
                <p>Todos los contenidos ofrecidos en la Plataforma, incluyendo, la propia web, textos, fotografías o ilustraciones, logos, marcas, grafismos, diseños, interfaces, o cualquier otro contenido, pertenecen a Z-CAR o han sido licenciados a Z-CAR por los terceros titulares de los derechos sobre dicho contenido y están protegidos por derechos de propiedad intelectual e industrial.</p>
                <p>El Usuario puede utilizar la Plataforma y los contenidos publicados en ella de forma no exclusiva, sólo para su uso privado, exclusivamente con la finalidad de disfrutar de las prestaciones del servicio de acuerdo con las Condiciones de Uso.</p>
                <p>Se respetarán y reconocerán todos los derechos de Propiedad Intelectual, Industrial e Imagen sobre todo el contenido original publicado por el Usuario en la Plataforma, cediendo el Usuario a Z-CAR, respecto de dichos contenidos, únicamente los derechos necesarios para la correcta explotación y promoción del servicio y la Plataforma por parte de Z-CAR, para todo el mundo. Dicha cesión de derechos queda limitada al uso, por Z-CAR, de la explotación y promoción de la Plataforma por el tiempo que esté registrado el Usuario en la Plataforma.</p>
                <p>El Usuario reconoce y garantiza ser titular de todos los derechos sobre los contenidos publicados en la Plataforma, y que éstos no vulneran los derechos de propiedad intelectual ni industrial, ni cualquier otro derecho de tercero, incluidos los de imagen, ni supondrá ningún coste y/o gasto adicional para Z-CAR, manteniéndole indemne en caso de reclamación judicial o extrajudicial de terceros por estos conceptos, y respondiendo en exclusiva frente a cualquier reclamación o reivindicación judicial o extrajudicial que pudiera presentarse por terceros con motivo de la cesión de derechos mencionada (incluidos derechos de Propiedad Intelectual, Propiedad Industrial e Imagen), responsabilizándose de cualquier pago o indemnización a que pudiere haber lugar.</p>
                <p>Z-CAR no será responsable del uso que apliquen terceros Usuarios a los contenidos propios o ajenos en la Plataforma, exonerándose de toda responsabilidad al respecto.</p>
                <p>Si el Usuario tuviera conocimiento de la existencia de algún contenido ilícito, ilegal, contrario a las leyes o que pudiera suponer una infracción de derechos de propiedad intelectual y/o industrial, deberá notificarlo inmediatamente a Z-CAR para que ésta pueda proceder a la adopción de las medidas oportunas.</p>
                <p>En el caso de que cualquier Usuario o un tercero consideren que alguno de los contenidos de la Plataforma propiedad de Z-CAR vulnera sus derechos de propiedad intelectual o industrial o imagen, deberá remitir una comunicación a info@z-car.com con la siguiente información:
                    Datos identificativos y medio de contacto del reclamante o su representante legal.
                    Documentación que acredite su condición de titular de los derechos supuestamente infringidos.
                    Relato detallado de los derechos supuestamente infringidos por Z-CAR, así como la localización exacta dentro de la Plataforma.
                    Declaración expresa por parte del reclamante de que la utilización de los contenidos se ha realizado sin el consentimiento del titular de los derechos supuestamente infringidos.</p>
                <p>En ningún caso se entenderá que el acceso y navegación del Usuario por la Plataforma o la utilización, adquisición y/o contratación de productos o servicios ofertados a través de la Plataforma, implique una renuncia, transmisión, licencia o cesión total ni parcial de dichos derechos por parte de Z-CAR. El Usuario dispone de un derecho de uso estrictamente privado, exclusivamente con la finalidad de disfrutar de las prestaciones del servicio de acuerdo con las Condiciones de Uso.</p>
                <p>No está permitido el uso comercial de los contenidos, ni copiar, almacenar o descargar, distribuir, publicar, enviar, transformar, utilizar cualquier técnica de ingeniería inversa, descompilar los contenidos o parte de los mismos, o realizar cualquier uso de medios o procedimientos distintos de los que se ponen a tu disposición en la Plataforma para utilizar los contenidos de forma distinta a la autorizada por Z-CAR.</p>
            </div> 
        
        <div class="col-md-10 col-md-offset-1">
        <span>REGISTRO EN LA PLATAFORMA Y CREACIÓN DE UNA CUENTA</span><br/>
        
        <span>Condiciones de registro en la Plataforma</span>
        <p>La Plataforma ha sido concebida para ser utilizada por alumnos oficialmente matriculados en el centro CIFP Zornotza LHII pero en una 
        primera fase de experimentacion la Plataforma esta abierta a todo el publico.
        </p>
        <span>Creación de una Cuenta</span>
        <p>La Plataforma permite a los Usuarios publicar y ver Viajes e interactuar entre ellos para reservar una Plaza.
            Es posible ver los Viajes sin estar registrado en la Plataforma. No obstante, no podrás publicar un Viaje ni
            reservar una Plaza sin haberse primero registrado para convertirse en Usuario.
        </p>
        <span>Verificación</span>
        <p>
            Z-CAR podrá, con fines de transparencia, de mejora de la veracidad o de prevención o detección de fraude,
            establecer un sistema para verificar parte de la información proporcionada en tu perfil. Se trata, fundamentalmente,
            de aquellos casos en los que introduces tu número de teléfono o nos proporcionas una dirección de correo.
            Reconoces y aceptas que cualquier referencia en la Plataforma o en los Servicios a la información “certificada”,
            o a cualquier otro término similar, significa solamente que un Usuario ha superado con éxito el procedimiento de
            verificación existente en la Plataforma o en los Servicios para proporcionarle más información sobre el Usuario
            con el que está pensando compartir un Viaje. Z-CAR no puede garantizar la veracidad, fiabilidad o validez
            de la información sujeta al procedimiento de verificación.
        </p>
        <span>Naturaleza de la reserva de Plazas y términos de uso de los Servicios en nombre de un tercero</span>
        <p>
            Cualquier utilización de los Servicios, tanto en calidad de Pasajero como de Conductor, está relacionada con un nombre específico.
            La identidad del Conductor y del Pasajero debe corresponderse con la identidad comunicada por los mismos a Z-CAR y a los demás
            Usuarios que participan en el Trayecto.
            La Plataforma está pensada para reservar Plazas para personas. Está prohibido reservar una Plaza para transportar cualquier objeto,
            paquete, animal que viaje solo o cualquier otro elemento material.
            Está igualmente prohibido publicar un Viaje para cualquier otro Conductor que no seas tú.
        </p>    
        <p>Al darse de alta en la Plataforma llega un mensaje a la cuenta de correo electrónico introducida
            por el Usuario teniendo que verificar la cuenta haciendo click en Verificar Cuenta. Después de crear
            un Viaje las Reservas de plazas del mismo las confirma el Conductor y las puede rechazar o aceptar.
             Estos mensajes llamados Alertas son enviadas a los Pasajeros por Email.
        </p>
        </div>
        <div class="col-md-10 col-md-offset-1">
        <span>SISTEMA DE EVALUACION</span><br/>
        <span>Funcionamiento</span>
        <p>
            Z-CAR te anima a publicar tus comentarios y/o valoraciones sobre un Conductor (en el caso de que seas un Pasajero)
            o sobre un Pasajero (en el caso de que seas un Conductor) con el cual hayas compartido un Viaje o con quien se
            supone que hubieses debido compartir un Viaje. Sin embargo, no está permitido dejar ningún comentario sobre otro
            Pasajero si eres un Pasajero, ni sobre ningún otro Usuario con quien no hayas viajado o con quien no tenías previsto viajar.<br/>
            Tu opinión, al igual que las opiniones que hayan publicado otros Usuarios sobre ti, solamente se podrán ver y se
            publicarán en la Plataforma una vez transcurrido el más breve de los siguientes periodos: inmediatamente después
            de que ambos hayáis dejado un comentario dentro de un periodo de 15 días tras haber realizado el Trayecto, o después
            de un período de 15 días tras la primera opinión.
            Podrás responder a un comentario realizado en tu perfil por parte de otro Usuario transcurridos 15 días tras la fecha
            de recepción del comentario. El comentario y, si procede, su respuesta, se publicarán en tu perfil.
            Al llegar a los 6 Trayectos o Viajes el conductor pasa de ser Novato a Intermedio y si supera 
            los 12 Viajes se convierte en Experto con independencia de las Valoraciones, pero si la nota media de las 
            Valoraciones es inferior a 2 puntos Z-CAR se reserva el derecho de eliminar la cuenta del Conductor.
        </p>
        <span>Moderación</span>
        <p>
           Reconoces y aceptas que Z-CAR se reserva el derecho a no publicar o a eliminar cualquier comentario, pregunta, opinión o respuesta a los mismos
           si considera que su contenido incumple lo establecido en las presentes CGU. 
        </p>
        <span>Limite</span>
        <p>
          Z-CAR se reserva el derecho a suspender tu Cuenta, limitar su acceso a los Servicios, o rescindir los presentes CGU en caso de que hayas recibido
          al menos tres críticas y las opiniones promedias que hayas recibido tengan una puntuación de 2 o inferior.  
        </p>
        </div>
        <div class="col-md-10 col-md-offset-1">
        <span>Objetivo no comercial y no empresarial de los Servicios y la Plataforma</span>
        <p>
            Aceptas utilizar los Servicios y la Plataforma solamente para ponerte en contacto, con fines no comerciales y no
            empresariales, con personas que desean compartir un Viaje contigo.
            Como Conductor, aceptas no solicitar una Cantidad de costes compartidos superior a los costes reales del trayecto y
            que puedan generarte un beneficio, dejando especificado que, en el contexto de compartir un coste, tú tienes que asumir
            vehículo comercial, taxi o vehículo de empresa con el objetivo de generar un beneficio a través de la Plataforma. 
            Recuerda proporcionar a Z-CAR, en caso de que te lo solicite, una copia del certificado de registro de tu vehículo
            y cualquier otra información que demuestre que estás autorizado a utilizar el vehículo en cuestión en la Plataforma y 
            que no estás obteniendo beneficio alguno por el uso de la misma.<br/>
            Z-CAR también se reserva el derecho a suspender tu Cuenta, limitar tu acceso a los Servicios o resolver los presentes
            CGU en caso de que tu actividad en la Plataforma, dada la naturaleza de los Trayectos ofrecidos, tu frecuencia,
            el número de Pasajeros transportados y la Cantidad de costes compartidos solicitada, te conlleve a una posición en la que
            generes beneficio, o por cualquier otro motivo que sugiera a Z-CAR que estás generando beneficio a través de la Plataforma.
        </p>
        </div>
        <div class="col-md-10 col-md-offset-1">
        <span>COMPORTAMIENTO DE LAS PERSONAS QUE VISITAN LA PLATAFORMA Y LOS USUARIOS</span><br/>
        
        <span>Compromiso de todas las personas que visitan la Plataforma</span>
        <p>
            Reconoces ser el único responsable de respetar todas las leyes, normativas y obligaciones aplicables a la utilización de
            la Plataforma. Además, al utilizar la Plataforma y durante los Trayectos, te comprometes a:<br/>
            <ol>
            <li>No utilizar la Plataforma con fines profesionales, comerciales o con ánimo de lucro.</li>
            <li>No enviar a Z-CAR (especialmente en el momento de crear o actualizar tu Cuenta) ni a los demás Usuarios de la
                Plataforma información falsa, confusa, maliciosa o fraudulenta.</li>
            <li>No hablar ni comportarse , ni publicar ningún contenido en la Plataforma que pueda resultar difamatorio, injurioso,
                obsceno, pornográfico, vulgar, ofensivo, agresivo, improcedente, violento, amenazante, acosador, de naturaleza
                racista o xenófoba, que tenga connotaciones sexuales, incite a la violencia, discriminación u odio, o que fomente
                actividades o el uso de substancias ilegales o de forma más general que sea contrario a los objetivos de la
                Plataforma y que pueda infringir los derechos de Z-CAR o una tercera parte, o que pueda ser contrario a las buenas costumbres.</li>
            <li>No infringir los derechos y no dañar la imagen de Z-CAR, en especial en lo que respecta a sus derechos de propiedad intelectual.</li>
            <li>No abrir más de una Cuenta en la Plataforma y no abrir una Cuenta en nombre de un tercero que no se alumnado del centro.</li>
            <li>Cumplir con las presentes CGU y con la Política de privacidad.</li>
            </ol>
        </p>
        <span>Compromisos de los Conductores</span>
        <p>
            Cuando utilizas la Plataforma como Conductor, te comprometes a:<br/>
            <ol>
            <li>Respetar todas las leyes, normativas y códigos con respecto a la conducción y al vehículo, especialmente contar con
                un seguro de responsabilidad civil en vigor en el momento de realizar el Trayecto y estar en posesión de un carnet de conducir válido.</li>
            <li>Comprobar que tu póliza de seguro cubre los desplazamientos compartidos y que los Pasajeros con los que compartes el trayecto son considerados como terceros en tu vehículo y, por lo tanto, están cubiertos por tu seguro.</li>
            <li>No asumir ningún riesgo durante la conducción, ni tomar ningún producto que pueda afectar negativamente a tu atención y a tu capacidad de conducir de manera atenta y completamente segura.</li>
            <li>Publicar Viajes que se correspondan solamente con Trayectos ya programados.</li>
            <li>Realizar el Trayecto según la descripción en el Viaje (en especial con respecto a utilizar o no autopista) y a respetar las horas y lugares acordados con los demás Usuarios (en especial el punto de encuentro y el lugar de destino).</li>
            <li>No llevar a más Pasajeros que el número de Plazas indicados en el Viaje.</li>
            <li>Utilizar un vehículo en buen estado y que cumpla con todas las normativas legales, en especial con el Certificado de ITV en vigor.</li>
            <li>A compartir con Z-CAR o con cualquier Pasajero que lo solicite tu carnet de conducir,
                el certificado de registro de tu vehículo, tu póliza de seguro, el certificado de la ITV y cualquier otro documento que demuestre tu capacidad para utilizar el vehículo como Conductor en la Plataforma.</li>
            <li>En caso de retraso o cambio en la hora o en el propio Trayecto, informar a tus Pasajeros sin demora.</li>
            <li>Esperar a los Pasajeros en el punto de encuentro acordado al menos hasta 30 minutos después de la hora acordada.</li>
            <li>No publicar ningún Viaje relativo a un vehículo que no sea tuyo o para el cual no tengas permiso para utilizarlo como transporte compartido.</li>
            <li>Asegurarte de que los Pasajeros pueden contactarte al número de teléfono registrado en tu perfil.</li>
            <li>No generar ningún beneficio a través de la Plataforma.<br/>
            <li>No tener ninguna contraindicación ni incapacidad médica para conducir.</li>
            <li>Comportarse de forma apropiada y responsable durante el Trayecto, de conformidad con la filosofía del desplazamiento compartido.</li>
            </ol>        
        </p>
        <span>Compromiso de los Pasajeros</span>
        <p>
            Cuando utilizas la Plataforma como Pasajero, te comprometes a:<br/>
            <ol>
            <li>Adoptar un comportamiento apropiado durante el Trayecto de modo que no interrumpa la concentración o la conducción
                del Conductor ni la paz y tranquilidad del resto de los Pasajeros.</li>
            <li>Respetar el vehículo del Conductor y su limpieza.</li>
            <li>En caso de retraso, informar al Conductor sin demora.</li>
            <li>Esperar al Conductor en el punto de encuentro acordado al menos hasta 30 minutos después de la hora acordada.</li>
            <li>Comunicar a Z-CAR, o a cualquier Conductor que te lo solicite, tu documento de identidad o cualquier otro documento
                que pruebe tu identidad.</li>
            <li>No transportar durante un Trayecto ningún artículo, sustancia o animal que pueda distraer la concentración
                y conducción del Conductor, o cuya naturaleza, posesión o transporte sea ilegal.</li>
            <li>Asegurarse de que los Pasajeros pueden contactarte en el número de teléfono registrado en tu perfil, incluso en el
                punto de reunión.</li> 
            </ol>
        </p>
        </div>
        <d
        
        
        
        iv class="col-md-10 col-md-offset-1">
        <span>Datos de carácter personal</span>
        <p>
            En el contexto del uso de la Plataforma por tu parte, Z-CAR recopilará y procesará tu información personal.
            Al utilizar la Plataforma y registrarte como Usuario, reconoces y aceptas el procesamiento de tus datos personales
            por parte de Z-CAR de conformidad con la legislación aplicable y lo establecido en la Política de privacidad.
        </p>
        <span>Aviso legal</span>
        <p>
            La Plataforma está editada por Z-CAR SA, sociedad anónima, registrada en el Registro Empresarial de Bizkaia,
            Tomo 4270, Folio 200, Hoja BI-34700, Inscripción 1ª y teléfono 94 673 02 51.
            Sociedad domiciliada en Amorebieta-Etxano (48340 Vizcaya) en la calle Urritxe s/n, con N.I.F. A-12345678. 
            El sitio web está alojado en los servidores de CIFP Zornotza LHII.
            Para cualquier pregunta, puede ponerse en contacto con Z-CAR SA utilizando el formulario de contacto.
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
