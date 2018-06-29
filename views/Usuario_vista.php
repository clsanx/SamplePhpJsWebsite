<?php

class Usuario_vista
{
    public function loadFormLogin()
    {
        ?>  
            <!-- FORMULARIO LOGIN -->
                <div class="container aniFadeIn" id="form-login">
                    <h2>Iniciar sesión</h2>
                    <form novalidate name="loginForm" ng-submit="login(loginForm.$valid)">
                                
                                <!-- USUARIO -->
                                <div id="input-usuario" class="form-group" ng-class="{
                                    'has-error':!loginForm.usuario.$valid && (!loginForm.usuario.$pristine || loginForm.$submitted),
                                    'has-success':loginForm.usuario.$valid && (!loginForm.usuario.$pristine || loginForm.$submitted)}">
                                    
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" ng-model="datosLogin.usuario" required>
                                    <p class="form-text" ng-show="loginForm.usuario.$error.required && (!loginForm.usuario.$pristine || loginForm.$submitted)">Campo obligatorio.</p>
                                </div>
                                
                                <!-- CONTRASEÑA -->
                                <div id="input-contrasena" class="form-group" ng-class="{
                                    'has-error':!loginForm.contrasena.$valid && (!loginForm.contrasena.$pristine || loginForm.$submitted),
                                    'has-success':loginForm.contrasena.$valid && (!loginForm.contrasena.$pristine || loginForm.$submitted)}">
                                    
                                    <label for="contrasena">Contraseña</label>
                                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" ng-model="datosLogin.contrasena" required>
                                    <p class="form-text" ng-show="loginForm.contrasena.$error.required && (!loginForm.contrasena.$pristine || loginForm.$submitted)">Campo obligatorio.</p>
        
                                </div>
                                
                                <!--<div class="clearfix"></div>-->
                                
                                <!-- BOTÓN -->
                                <button type="submit" class="btn btn-success btn-lg btn-responsive" name="login">Iniciar Sesión</button>
                                
                                <div class="text-center">
                                    <br/><span>¿No tienes una cuenta?</span><br/>
                                    <a href="registrar.php" tabindex="5" class="forgot-password">Registrarme</a>
                                    <br/><span ng-show="invLogin" class="red-error">{{ invLogin }}</span><br/>
                                </div>
                                    
                                    
                                
                                <!--<button type="submit" class="btn btn-success btn-lg btn-responsive" name="buscar"> <span class="glyphicon glyphicon-check"></span> Buscar</button>-->
                                
                            </form>
                            
                </div>
        <?php

    }

    // <<<<<<<<< FUNCIONES REGISTRO >>>>>>>> //

            // *** Cargar HTML formulario de registro *** //
            public function loadFormRegistro()
            {
                ?>
                
                    <!-- Formulario de Registro -->
                    <div class="container aniFadeIn" id="form-registro" ng-cloak ng-show="showFormRegistrar">
                    <h2>Registrarme</h2>
                    <form novalidate name="nuevoUsuarioForm" ng-submit="processForm(nuevoUsuarioForm.$valid)">
                        
                        <!-- USUARIO -->
                        <div class="form-group" ng-class="{
                            'has-error':!nuevoUsuarioForm.usuario.$valid && (!nuevoUsuarioForm.usuario.$pristine || nuevoUsuarioForm.$submitted),
                            'has-success':nuevoUsuarioForm.usuario.$valid && (!nuevoUsuarioForm.usuario.$pristine || nuevoUsuarioForm.$submitted)}">
                            
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" name="usuario" ng-model="nuevoUsuario.usuario" 
                                ng-minlength="3" ng-maxlength="20" ng-pattern="usuarioPattern" userunique-data required 
                                ng-change="resetUserExiste(nuevoUsuarioForm.usuario.$error.unique);">
                                
                            <!-- USUARIO *Mensajes de error* -->
                            <p ng-show="nuevoUsuarioForm.usuario.$error.unique" class="form-text">Usuario ya existe.</p>
                            <p ng-show="nuevoUsuarioForm.usuario.$error.minlength && !nuevoUsuarioForm.usuario.$error.pattern" class="form-text">3 caracteres min.</p>
                            <p ng-show="nuevoUsuarioForm.usuario.$error.maxlength" class="form-text">20 caracteres max.</p>
                            <p ng-show="nuevoUsuarioForm.usuario.$error.pattern && !nuevoUsuarioForm.usuario.$error.maxlength" class="form-text">Ej: user87, user-87, user.87</p>
                            <p ng-show="nuevoUsuarioForm.usuario.$error.required && (!nuevoUsuarioForm.email.$pristine || nuevoUsuarioForm.$submitted)" class="form-text">Es obligatorio.</p>
                            
                            <!--<p ng-if="nuevoUsuarioForm.$pending.usuario">checking....</p>-->
                            
                        </div>
                        
                        <!-- CONTRASEÑA -->
                        <div class="form-group" ng-class="{
                            'has-error':!nuevoUsuarioForm.contrasena.$valid && (!nuevoUsuarioForm.contrasena.$pristine || nuevoUsuarioForm.$submitted),
                            'has-success':nuevoUsuarioForm.contrasena.$valid && (!nuevoUsuarioForm.contrasena.$pristine || nuevoUsuarioForm.$submitted)}">
                            
                            <label for="contrasena">Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" ng-model="nuevoUsuario.contrasena" required>
                            <p class="form-text" ng-show="nuevoUsuarioForm.contrasena.$error.required && (!nuevoUsuarioForm.contrasena.$pristine || nuevoUsuarioForm.$submitted)">Es obligatorio.</p>
                        </div>
                        
                        <!-- CONFIRMAR CONTRASEÑA -->
                        <div class="form-group" ng-class="{
                            'has-error':!nuevoUsuarioForm.recontrasena.$valid && (!nuevoUsuarioForm.recontrasena.$pristine || nuevoUsuarioForm.$submitted),
                            'has-success':nuevoUsuarioForm.recontrasena.$valid && (!nuevoUsuarioForm.recontrasena.$pristine || nuevoUsuarioForm.$submitted)}">
                            
                            <label for="recontrasena">Confirmar Contraseña</label>
                            <input type="password" class="form-control" placeholder="Repetir contraseña" name="recontrasena" ng-model="nuevoUsuario.recontrasena" ng-pattern="{{nuevoUsuario.contrasena}}" required>
                            <p class="form-text" ng-show="nuevoUsuarioForm.recontrasena.$error.required && (!nuevoUsuarioForm.recontrasena.$pristine || nuevoUsuarioForm.$submitted)">Es obligatorio.</p>
                            <p class="form-text" ng-show="nuevoUsuarioForm.recontrasena.$error.pattern && (!nuevoUsuarioForm.recontrasena.$pristine || nuevoUsuarioForm.$submitted)">Contraseñas no coinciden.</p>
                        </div>
                        
                        <!-- NOMBRE -->
                        <div class="form-group" ng-class="{
                            'has-error':!nuevoUsuarioForm.nombre.$valid && (!nuevoUsuarioForm.nombre.$pristine || nuevoUsuarioForm.$submitted),
                            'has-success':nuevoUsuarioForm.nombre.$valid && (!nuevoUsuarioForm.nombre.$pristine || nuevoUsuarioForm.$submitted)}">
                            
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre" ng-model="nuevoUsuario.nombre" required>
                            <p class="form-text" ng-show="nuevoUsuarioForm.nombre.$error.required && (!nuevoUsuarioForm.nombre.$pristine || nuevoUsuarioForm.$submitted)">Es obligatorio.</p>
                        </div>

                        <!-- APELLIDOS -->
                        <div class="form-group" ng-class="{
                            'has-error':!nuevoUsuarioForm.apellidos.$valid && (!nuevoUsuarioForm.apellidos.$pristine || nuevoUsuarioForm.$submitted),
                            'has-success':nuevoUsuarioForm.apellidos.$valid && (!nuevoUsuarioForm.apellidos.$pristine || nuevoUsuarioForm.$submitted)}">
                            
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" ng-model="nuevoUsuario.apellidos" required>
                            <p class="form-text" ng-show="nuevoUsuarioForm.apellidos.$error.required && (!nuevoUsuarioForm.apellidos.$pristine || nuevoUsuarioForm.$submitted)">Es obligatorio.</p>
                        </div>
                        
                        <!-- EMAIL -->
                        
                        <div class="form-group" ng-class="{
                            'has-error':!nuevoUsuarioForm.email.$valid && (!nuevoUsuarioForm.email.$pristine || nuevoUsuarioForm.$submitted),
                            'has-success':nuevoUsuarioForm.email.$valid && (!nuevoUsuarioForm.email.$pristine || nuevoUsuarioForm.$submitted)}">
                            
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" ng-model="nuevoUsuario.email"  emailunique-data required
                            ng-change="resetEmailExiste(nuevoUsuarioForm.email.$error.unique);">
                            <p class="form-text" ng-show="nuevoUsuarioForm.email.$error.required && (!nuevoUsuarioForm.email.$pristine || nuevoUsuarioForm.$submitted)">Debes introducir un email.</p>
                            <p class="form-text" ng-show="nuevoUsuarioForm.email.$error.email">No es un email valido.</p>
                            <p class="form-text" ng-show="nuevoUsuarioForm.email.$error.unique && !nuevoUsuarioForm.email.$error.email">La dirección esta en uso.</p>
                            <!--<pre>Campo válido? {{ nuevoUsuarioForm.email.$valid | json }}</pre>-->
                        </div>
                        
                        <!-- TELÉFONO -->
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" placeholder="Teléfono" name="telefono" ng-model="nuevoUsuario.telefono">
                        </div>
                        
                        <!-- POBLACIÓN -->
                        <div class="form-group">
                            <label for="poblacion">Población</label>
                            <input type="text" class="form-control" placeholder="Población" name="poblacion" ng-model="nuevoUsuario.poblacion">
                        </div>
                        
                        <!-- GÉNERO -->
                        <div class="form-group">
                            <label for="genero">Género</label>
                                <select class="form-control" name="genero" ng-model="nuevoUsuario.genero">
                                <option>Hombre</option>
                                <option>Mujer</option>
                            </select>
                        </div>
                        
                        
                        
                        <!-- MODULO -->
                        <div class="form-group">
                            <label for="select_modulo">Modulo</label>
                                            <select name="select_modulo" class="form-control input-sm" ng-model="nuevoUsuario.modulo" 
                                                    ng-options="modulo for modulo in modulos">
                                            </select>
                        </div>
                        
                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-success btn-lg btn-responsive" name="enviar"> <span class="glyphicon glyphicon-check"></span> Enviar</button>
                        
                    </form>
                    
                </div>
                
                <div id="res-registro" ng-show="showResMsj" class=" container animated pulse">

                    <div class="form-group left">
                        <img src="img/registrar/success01.png">
                    </div>
                    <div class="form-group right">
                        <h2>Bienvenido <?=  $_SESSION['nombre'] ?> </h2>
                        <p>Hemos enviado un correo de verificacion a tu email, tan pronto tu cuenta este verificada podras comenzar a publicar viajes y a hacer reservas.</p>
                        <p>Mientras tanto puedes editar tus datos y configuracion en tu <a href="micuenta.php">Area Personal</a></p>
                        
                    </div>
                </div>
                
                
                <!--<pre>Errores Usuario: {{ nuevoUsuarioForm.usuario.$error }}</pre>-->
                <!--<pre>Errores Email: {{ nuevoUsuarioForm.email.$error }}</pre>-->
                <!--<pre>Formulario: {{ nuevoUsuarioForm.usuario }}</pre>-->
                
                <div class="container">
                    
                    <!-- Mensajes - Validaciones en PHP -->
                    <div  id="div-msg" ng-show="divMsg">
                        <center>
                            <div class="alert alert-success alert-sm fade in" ng-show="message"><a href="#" class="close" data-dismiss="alert" aria-label="close" ng-click="message=''">&times;</a>{{ message }}</div>
                            <div class="alert alert-danger well-sm fade in" ng-show="errorUsuario"><a href="#" class="close" data-hide="alert" aria-label="close" ng-click="errorUsuario=''">&times;</a>{{ errorUsuario }}</div>
                            <div class="alert alert-danger well-sm fade in" ng-show="errorContrasena"><a href="#" class="close" data-hide="alert" aria-label="close" ng-click="errorContrasena=''">&times;</a>{{ errorContrasena }}</div>
                            <div class="alert alert-danger well-sm fade in" ng-show="errorNombre"><a href="#" class="close" data-hide="alert" aria-label="close" ng-click="errorNombre=''">&times;</a>{{ errorNombre }}</div>
                            <div class="alert alert-danger well-sm fade in" ng-show="errorApellidos"><a href="#" class="close" data-hide="alert" aria-label="close" ng-click="errorApellidos=''">&times;</a>{{ errorApellidos }}</div>
                            <div class="alert alert-danger well-sm fade in" ng-show="errorEmail"><a href="#" class="close" data-hide="alert" aria-label="close" ng-click="errorEmail=''">&times;</a>{{ errorEmail }}</div>
                        </center>
                    </div>
                    
                </div>
                    
                
                
                <?php

            }

            // *** Cargar HTML registro existoso *** //
            public function loadSuccessRegistro()
            {
                ?>
                    
                    <div class="container" id="form-registro">
                        <div class="form-group left">
                             <img src="img/registrar/success01.png">
                        </div>
                        <div class="form-group right">
                            <h2>Registro Exitoso.</h2>
                            <p>Hemos enviado un correo de verificación a tu cuenta de email.</p>
                        </div>
                    </div>
                        
            
                <?php

            }

    // <<<<<<<<< FUNCIONES PERFIL >>>>>>>> //
            // *** Cargar HTML perfil de usuario *** //
            public function loadPerfilUsuario()
            {
                ?>

                    <div ng-controller="ctrMiPerfil" ng-cloak>

                        <fieldset>
                            
                            <form class="form-horizontal animated fadeIn" ng-show="formPerfil" novalidate name="editarUsuarioForm" ng-submit="updateUsuario(true)" enctype="multipart/form-data" id="formuploadajax">
                                <center>
                                    <div class="image-upload">
                                        <label for="archivo1">
                                            
                                            <div id="img-pointer" class="circular-perfil-img button" ng-mouseover="verEditarImg=true" ng-mouseout="verEditarImg=false" ngf-select="upload($file)" ng-model="file" name="file" ngf-pattern="'image/*'"
                                            ngf-accept="'image/*'" ngf-max-size="500KB" ngf-min-height="140" 
                                            ngf-resize="{width: 140, height: 140}">
                                                
                                                <img id="img-perfil" class="texto-sobre animated fadeIn" src="{{ datosPerfil.imagen_perfil }}" class="circular-perfil-img" ng-cloak>
                                                <span ng-show="verEditarImg" class="texto-sobre2">Click para editar</span>
                                                
                                            </div>
                                            
                                        </label>
                                        
                                        <!--<input type="file" id="archivo1" name="archivo1"/>-->
                                        
                                        <!-- Single Image with validations -->
                                        <!--<div class="button" ngf-select="upload($file)" ng-model="file" name="file" ngf-pattern="'image/*'"-->
                                        <!--    ngf-accept="'image/*'" ngf-max-size="500KB" ngf-min-height="100" -->
                                        <!--    ngf-resize="{width: 100, height: 100}">Select</div>-->
                                        <!--</div>-->
                                    
                                    <h3 ng-model="idUsuario" ng-init="getUserData(<?=  $_SESSION['id'] ?>)"><?=  $_SESSION['usuario'] ?></h3>
                    		    </center>
                    		    
                    		    
                                
                                
                                
                                <div class="form-group">
                                  <label class="col-xs-4 col-md-4 control-label" for="nombre">Nombre</label>  
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                      <input name="nombre" type="text" placeholder="" class="form-control input-md" ng-model="datosPerfil.nombre" ng-disabled="showChpass">
                                  <!--<input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" ng-model="datosPerfil.nombre">-->
                                    
                                  </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label class="col-xs-4 col-md-4 control-label" for="apellidos">Apellidos</label>  
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                     <input name="apellidos" type="text" placeholder="" class="form-control input-md" ng-model="datosPerfil.apellidos" ng-disabled="showChpass">
                                  <!--<input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" ng-model="datosPerfil.apellidos">-->
                                    
                                  </div>
                                </div>
                                <div class="form-group" ng-show="!showChpass" id="btn-verChp">
                                    <button type="button" class="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 btn btn-secondary btn-sm btn-responsive" name="chPass" ng-click="showChpass=true" >{{ msgBtnChP }}</button>
                                </div>
                                
                                <div class="form-group" ng-show="showChpass">
                                  <label class="col-xs-4 col-md-4 control-label" for="pass1">Contraseña actual</label>
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                  <input name="pass1" type="password" class="form-control input-md" ng-model="datosPerfil.pass1">
                                  </div>
                                </div>
                                
                                <div class="form-group" ng-show="showChpass">
                                  <label class="col-xs-4 col-md-4 control-label" for="pass2">Nueva contraseña</label>
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                  <input name="pass2" type="password" class="form-control input-md" ng-model="datosPerfil.pass2">
                                  </div>  
                                </div>
                                 
                                <div class="form-group" ng-show="showChpass">
                                  <label class="col-xs-4 col-md-4 control-label" for="pass2c">Confirmar contraseña</label>
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                  <input name="pass2c" type="password" class="form-control input-md" ng-model="datosPerfil.pass2c">
                                  </div>    
                                </div>
                                
                                <div class="form-group" ng-show="showChpass">
                                    <button type="button" class="col-xs-3 col-md-3 col-xs-offset-5 col-md-offset-5 btn btn-success btn-sm btn-responsive" name="chPass" ng-click="cambiarPassword()" >Guardar</button>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-xs-4 col-md-4 control-label" for="email">Email</label>
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                  <input name="email" type="text" class="form-control input-md" ng-model="datosPerfil.email" disabled="disabled">
                                    
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-xs-4 col-md-4 control-label" for="telefono">Telefono</label>  
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                  <input name="telefono" type="text" class="form-control input-md" ng-model="datosPerfil.telefono" ng-disabled="showChpass">
                                    
                                  </div>
                                </div>
                                
                                <div class="form-group">
                                  <label class="col-xs-4 col-md-4 control-label" for="poblacion">Poblacion</label>  
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                  <input name="poblacion" type="text" class="form-control input-md" ng-model="datosPerfil.poblacion" ng-disabled="showChpass">
                                    
                                  </div>
                                </div>
                                
                                <!--<div class="form-group">-->
                                <!--  <label class="col-xs-4 col-md-4 control-label" for="textinput">Subir foto</label>  -->
                                <!--  <div class="col-xs-8 col-sm-6 col-md-6">-->
                                <!--        <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file"/>-->
                                <!--  </div>-->
                                <!--</div>-->
                                
                            
                                
                                <div class="form-group">
                                  <label class="col-xs-4 col-md-4 control-label" for="guardar"></label>
                                  <div class="col-xs-8 col-sm-6 col-md-6">
                                    <button id="guardar" type="submit" class="btn btn-success btn-lg btn-responsive" name="guardar" ng-disabled="editarUsuarioForm.$pristine || showChpass"> 
                                    <span class="glyphicon glyphicon-share"></span> Guardar cambios</button>&nbsp;&nbsp;
                                    <span id="icon-success" ng-show="showSuccess" class="glyphicon glyphicon-ok animated tada"></span>
                                    
                                  </div>
                                </div>
                                
                            
                            </form>
                        </fieldset>
                        
                        
                    </div>
                <?php

            }

            // Navbar de usuario
            public function loadNavbarUsuario()
            {
                ?>
                    <nav class="navbar navbar-default">
                
                                <div class="container-fluid">
                
                                     <!--Logo Boton -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#xnavcollapse">
                                                <span class="sr-only">Toggle navigation</span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                                <span class="icon-bar"></span>
                                            </button>
                                    </div>
                
                                    <div class="collapse navbar-collapse" id="xnavcollapse">
                
                                         <!--Menu de navegacion -->
                                        <ul class="nav navbar-nav">
                                            <li><a href="micuenta.php?s=perfil">Perfil</a></li>
                                            <li><a href="micuenta.php?s=viajes">Viajes</a></li>
                                            <li><a href="micuenta.php?s=reservas">Reservas</a></li>
                                            <li><a href="micuenta.php?s=alertas">Alertas</a></li>
                                            <li><a href="micuenta.php?s=mensajes">Mensajes</a></li>
                                            <li><a href="micuenta.php?s=opiniones">Opiniones</a></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                    </nav>
                    
                    
                    
                <?php

            }

            // Viajes de usuario
            public function loadViajesUsuario()
            {
                ?>
                
                <div class="animated fadeIn" id="lista-viajes" ng-controller="ctrMisViajes" ng-cloak>
                    <input hidden ng-model="sid" ng-init="getViajes(<?= $_SESSION['id'] ?>)"></input>
                    <h2 ng-class="tipoMsj" ng-show="res">{{ res }}</h2>
                    <div class="mensaje msg-box" ng-repeat="viaje in listaViajes" ng-cloak style="background-color:#F1EFED;">
                        <div>
                            <span class="glyphicon glyphicon-calendar">&nbsp;{{viaje.fecha}}</span>&nbsp;
                            <span class="glyphicon glyphicon-dashboard">&nbsp;{{viaje.hora}}</span>&nbsp;
                            <span class="glyphicon glyphicon-map-marker">&nbsp;{{viaje.origen}}</span>
                            <a href="viaje.php?v={{ viaje.id }}" class="btn btn-info btn-sm btn-responsive" name="ver">Ver</a>
                            <a href="#" class="btn btn-danger btn-sm btn-responsive" name="eliminar">Eliminar</a> 
                        </div>
                        
                    </div>   
                </div>     
                    
                    
                <?php

            }

            // Mensajes de usuario
            public function loadMensajesUsuario()
            {
                ?>
                
                <div class="animated fadeIn" id="lista-mensajes" ng-controller="ctrMisMensajes" ng-cloak>
                    <input hidden ng-model="idusuario" ng-init="idusuario=<?= $_SESSION['id'] ?>"></input>
                    <input hidden ng-model="nombreusuario" ng-init="nombreusuario=<?= $_SESSION['nombre'] ?>"></input>
                    <input hidden ng-init="getMensajes()"></input>
                    <div ng-repeat="mensaje in listaMensajes" ng-cloak style="background-color:#F1EFED;">
                        <div ng-if="mensaje.tipo=='solicitud'" class="mensaje msg-box">
                     
                            <p>El usuario <a href="usuario.php?uid={{ mensaje.idRem }}">
                                {{ mensaje.nombreRem }}</a> ha solicitado reservar una plaza en tu 
                                <a href="viaje.php?v={{ mensaje.idViaje }}">Viaje</a>. 
                                <a ng-if="mensaje.res==1" class="text-success">Aceptada</a>
                                <a ng-if="mensaje.res==2" class="text-danger">Rechazada</a></p>
                                
                            <button ng-if="mensaje.res==0" ng-click="responderSolReserva(true, mensaje.idViaje, mensaje.idReserva, mensaje.id, mensaje.idRem, mensaje.nombreRem)" 
                            type="button" class="btn btn-success btn-sm btn-responsive" name="aceptar">Aceptar</button>
                            
                            <button ng-if="mensaje.res==0" ng-click="responderSolReserva(false, mensaje.idViaje, mensaje.idReserva, mensaje.id)" 
                            type="button" class="btn btn-danger btn-sm btn-responsive" name="rechazar">Rechazar</button> 
                        </div>
                        
                        <div ng-if="(mensaje.tipo=='normal') && (mensaje.res==0)"  class="mensaje msg-box">
                     
                            <p>Tu solicitud de reserva en un <a href="viaje.php?v={{ mensaje.idViaje }}">Viaje</a> ha sido aceptada, 
                                puedes comunicarte directamente con el conductor a traves de {{ mensaje.mensaje }}.
                                Una vez finalizado  el viaje puedes valorar al conductor y dejar tu opinión aqui.</p>
                            
                            
                                 
                                      <label for="valoracion">Valoración:</label>
                                      <select style="width:30%;" class="form-control" name="valoracion" ng-model="opinion.valoracion">
                                        <option value="0">Muy mala</option>
                                        <option value="1">Mala</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Buena</option>
                                        <option value="5">Muy buena</option>
                                      </select>
                                
                                
                                    <label for="nombre">Opinión</label>
                                    <textarea rows="4" style="width:80%;" type="text" class="form-control" placeholder="Escribe un comentario..." name="opinion" ng-model="opinion.comentario"></textarea>
                                    
                                
                                
                                <button style="margin:10px auto;" ng-if="mensaje.res==0" ng-click="enviarOpinion(idusuario,mensaje.idRem,mensaje.idViaje, opinion.comentario, opinion.valoracion, mensaje.id, mensaje.nombreRem)" 
                                type="button" class="btn btn-success btn-sm btn-responsive" name="opinar">{{ opinarBtn }}</button>
                                
                               
                            
                        </div>
                        
                    </div>   
                </div>     
                    
                    
                <?php

            }

            // Reservas
            public function loadReservasUsuario()
            {
                ?>
                
                <div class="animated fadeIn" id="lista-reservas" ng-controller="ctrMisReservas" ng-cloak>
                    <input hidden ng-model="sid" ng-init="getReservas(<?= $_SESSION['id'] ?>)"></input>
                    <div class="reserva msg-box" ng-repeat="reserva in listaReservas" ng-cloak style="background-color:#F1EFED;">

                     
                            <p><a href="viaje.php?v={{ reserva.idViaje }}">Viaje</a> - Estado: {{ reserva.estado }}.
                            </p>
                    </div>   
                </div>     
                    
                    
                <?php

            }

            // Alertas
            public function loadAlertasUsuario()
            {
                ?>
                
                <div class="animated fadeIn" id="lista-alertas" ng-controller="ctrMisAlertas" ng-cloak>
                    <input hidden ng-model="idusuario" ng-init="idusuario=<?= $_SESSION['id'] ?>"></input>
                    <input hidden ng-model="email" ng-init="email='<?= $_SESSION['email'] ?>'"></input>
                    <input hidden ng-model="sid" ng-init="getAlertas()"></input>
                    <div id="form-alerta" class="msg-box" ng-show="showFormAlerta" ng-cloak style="width:60%;">
                        <!-- ORIGEN -->
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="Origen" name="nombre" ng-model="nuevaAlerta.origen">
                           <span class="input-group-btn">
                                <button ng-click="insertAlerta()" class="btn btn-success btn-responsive" type="button">Crear</button>
                           </span>
                        </div>
                    </div>
                    
                    
                    <div class="alerta msg-box" ng-repeat="alerta in listaAlertas" ng-cloak style="background-color:#F1EFED;">
                        <div class="input-group">
                            <p>Recibiras un mensaje cuando se publique un viaje con origen en <a class="lead capitalize">{{ alerta.origen }}</a>.</p>
                            <span class="input-group-btn">
                                
                                <button type="button" class="btn btn-danger btn-sm btn-responsive" id="{{ alerta.id }}" ng-click="eliminarAlerta($event)">Eliminar</button>
                                
                            </span>
                        </div>
                    </div>   
                </div>     
                    
                    
                <?php

            }

            // Viajes de usuario
            public function loadOpinionesUsuario()
            {
                ?>
                
                <div class="animated fadeIn" id="lista-opiniones" ng-controller="ctrMisOpiniones" ng-cloak>
                    <input hidden ng-model="idusuario" ng-init="idusuario=<?= $_SESSION['id'] ?>"></input>
                    <input hidden ng-init="getOpiniones()"></input>
                    
                    <div class="opinion msg-box" ng-repeat="opinion in listaOpiniones" ng-cloak style="background-color:#F1EFED;">
                        <div>
                            <h3><a href="usuario.php?uid='{{opinion.idOpinador}}'">{{opinion.nombreOpinador}}</a></h3>
                            <p>{{opinion.comentario}}</p>
                            <!--<span>{{viaje.origen}}</span>-->
                            <!--<a href="viaje.php?v={{ viaje.id }}" class="btn btn-info btn-sm btn-responsive" name="ver">Ver</a>-->
                            <!--<a href="#" class="btn btn-danger btn-sm btn-responsive" name="eliminar">Eliminar</a> -->
                        </div>
                        
                    </div>   
                </div>     
                    
                    
                <?php

            }

    // <<<<<<<<< MISC >>>>>>>> //

    public function alerta($msg)
    {
        echo '<script>alert('.$msg.');</script>';
    }
}
