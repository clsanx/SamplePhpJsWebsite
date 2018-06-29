<?php

class Viaje_vista
{
    public function loadFormBuscar()
    {
        ?>
        
        <!-- FORMULARIO BUSCAR -->
        <div class="container aniFadeIn" ng-cloak id="form-buscar" ng-focus="showCal=false">
            <form novalidate name="buscarForm" ng-submit="buscarV(true)">
                        
                        <!-- ORIGEN -->
                        <div id="input-origen" class="form-group"  ng-cloak>
                            <!--ng-controller="ctrBuscar as ctrl" arriba-->
                            <label for="origen">Origen</label>
                            <input ng-focus="showCal=false" type="text" class="form-control" placeholder="Origen" name="origen" ng-model="buscarViaje.origen">
                            
                            <!--<md-autocomplete type="text" md-selected-item="ctrl.selectedItem"  md-search-text="ctrl.searchText" md-selected-item-change="ctrl.selectedItemChange(item)" md-items="item in ctrl.querySearch(ctrl.searchText)" md-item-text="item.display" md-min-length="0"  placeholder="Origen" name="origen" ng-model="buscarViaje.origen">-->
                            <!--    <md-item-template>-->
                            <!--    <span md-highlight-text="ctrl.searchText" md-highlight-flags="^i">{{item.display}}</span>-->
                            <!--    </md-item-template>-->
                            <!--    <md-not-found>-->
                            <!--    No states matching "{{ctrl.searchText}}" were found.-->
                            <!--    </md-not-found>-->
                            <!--</md-autocomplete>-->
                            
                        </div>
                        
                        <!-- FECHA -->
                        <div id="input-fecha" class="form-group">
                        <!--<div id="input-fecha" class="form-group" ng-class="{-->
                        <!--    'has-error':!buscarForm.fecha.$valid && (!buscarForm.fecha.$pristine || buscarForm.$submitted),-->
                        <!--    'has-success':buscarForm.fecha.$valid && (!buscarForm.fecha.$pristine || buscarForm.$submitted)}">-->
                            
                            <date-picker ng-show="showCal" ng-blur="showCal=false" ng-model="buscarViaje.fecha" on-date-selected="showCal=false">
                            </date-picker>
                            
                            
                            <label for="fecha">Fecha</label>
                            <input ng-readonly="true" ng-click="buscarViaje.fecha=''" ng-focus="showCal=true" type="text" 
                            class="form-control" placeholder="Fecha" name="fecha" ng-model="buscarViaje.fecha">
                            
                            <!--<p ng-show="buscarForm.fecha.$error.pattern" -->
                            <!--    class="form-text">Ej: 01/01/2017 (dd/mm/yyyy)</p>-->
                        </div>
                        
                        <!-- HORA -->
                        <div id="input-hora" class="form-group">
                            <label for="hora">Hora</label>
                            <input ng-focus="showCal=false" type="text" class="form-control" placeholder="hh:mm" name="hora" ng-model="buscarViaje.hora">
                        </div>
                        
                        <!-- BOTÓN -->
                        <div id="input-btnbuscar" class="form-group" ng-cloak>
                            <button type="submit" class="btn btn-success btn-lg btn-responsive" name="buscar"> <span class="glyphicon glyphicon-search"></span><a class="btn-msg">Buscar</a></a></button>
                        </div>

                        <!--<div class="clearfix"></div>-->
                        <!--<button type="submit" class="btn btn-success btn-lg btn-responsive" name="buscar"> <span class="glyphicon glyphicon-check"></span> Buscar</button>-->
                        
                    </form>
                    
        </div>
        
        <!-- MENSAJE -->
        <div id="mensaje-buscar" class="container msg-box animated shake" ng-show="verMsj" ng-cloak>
            <div class="form-group left">
                <img src="img/icons/pepesad.png">
            </div>
            <div class="form-group right">
                <h2>Sin resultados...</h2>
                <p>Actualmente no hay viajes registrados con tus criterios de busqueda, puedes 
                <a href = "index.php">Crear una Solicitud de Viaje </a> <sup>Sin implementar</sup>.  
                Igual hay algun conductor cuya ruta sea parecida y se anime a pasar por la ubicación que has buscado.</p>
                <!--<p><a href = "javascript:window.location.href=window.location.href"> Publicar otro viaje </a></p>-->
            </div>
        </div>    
                    
        <!--VIAJES ENCONTRADOS -->
                    
        <div id="main-buscar" ng-show="verViajes" ng-cloak class="container animated fadeIn">
            
            <!--<div id="filtros-buscar">-->
            <!--    <h2>FILTROS</h2>-->
            <!--</div>-->
            
            <!--BUSQUEDA AL INICIAR-->
            <input hidden ng-init="buscarV(true)"></input>
            
            <div id="lista-viajes">
                <div class="item-viaje" ng-repeat="viaje in listaViajes">
                    
                    <div class="item-viaje-usuario">
                        <div class="user-sec">            
                        
                            <div><a href="usuario.php?uid={{ viaje.conductor }}" class="img-nombre capitalize"> {{ viaje.usNombre }} </a></div>
                            <div class="circular-user-img"><img  class="circular-user-img" src="{{ viaje.usImg }}" height="60" width="60"> </div>
                            <div>
                                <star-rating-comp
                                    size="'medium'"
                                    rating='viaje.usReputacion'
                                    space="no"
                                    color="'ok'"
                                    read-only="true"
                                    start-type="icon">
                                </star-rating-comp>
                            </div>
                            <div><span class="img-nivel"> {{ viaje.usNivel }} </span></div>
                        </div>
                    </div>    
                    
                    <div class="item-viaje-detalles">
                            <p class="viaje-origen uppercase"><a href="viaje.php?v={{ viaje.id }}">{{ viaje.origen }}</a></p>
                            <p class="viaje-pencuentro"><img src="img/icons/loc01x64.png" alt="Origen" >{{ viaje.ptoencuentro }}</p>
                            <p class="viaje-fecha"><img src="img/icons/date01x64.png" alt="Fecha" >{{ viaje.fecha }}</p>
                            <p class="viaje-hora"><img src="img/icons/clock01x64.png" alt="Hora" >{{ viaje.hora }}</p>
                    </div>
                                
                    <!--<pre>Viaje (viaje): {{ viaje | json }}</pre>-->
                    
                </div>
            </div>
        </div>
        
        
        
        <br/><br/><br/>
        
        <!--<pre>Datos (buscarViaje): {{ buscarViaje | json }}</pre>-->
        <!--<pre>Resultados (listaViajes): {{ listaViajes | json }}</pre>-->
    <?php

    }

    public function loadPublicarViaje()
    {
        ?>
        
        <div id="form-pubviaje" class="container aniFadeIn" ng-cloak ng-show="showFormPublicar">
            <form novalidate name="nuevoViajeForm" ng-submit="publicarV(nuevoViajeForm.$valid)">
       
                <h2>Publicar viaje</h2>
                <!-- ORIGEN -->
                <div id="input-origen" class="form-group" ng-class="{
                            'has-error':!nuevoViajeForm.origen.$valid && (!nuevoViajeForm.origen.$pristine || nuevoViajeForm.$submitted),
                            'has-success':nuevoViajeForm.origen.$valid && (!nuevoViajeForm.origen.$pristine || nuevoViajeForm.$submitted)}">
                    
                    <label for="origen">Origen</label>
                    <input ng-focus="showCal=false" type="text" class="form-control" placeholder="Origen" name="origen" ng-model="publicar.origen" required
                        ng-minlength="3" ng-maxlength="20">
                    
                    <!-- ORIGEN *Mensajes de error* -->
                            <p ng-show="nuevoViajeForm.origen.$error.required && !nuevoViajeForm.origen.$pristine" class="form-text">Campo requerido.</p>
                            <p ng-show="nuevoViajeForm.origen.$error.minlength && !nuevoViajeForm.origen.$pristine" class="form-text">3 min.</p>
                            <p ng-show="nuevoViajeForm.origen.$error.maxlength" class="form-text">20 max.</p>
                    
                    
                </div>
                
                <!-- FECHA -->
                <div id="input-fecha" class="form-group med-input">
                    <label for="fecha">Fecha</label>
                    <date-picker ng-show="showCal" ng-blur="showCal=false" ng-model="publicar.fecha" on-date-selected="showCal=false">
                            </date-picker>
                    <input ng-readonly="true" class="form-control" name="fecha" ng-focus="showCal=true" ng-model="publicar.fecha">
                </div>
                
                <!-- HORA -->
                <div id="input-hora" class="form-group sm-input">
                    <label for="horas">Horario</label>
                        <select ng-focus="showCal=false" name="horas" ng-model="publicar.horas" class="form-control">
                            <option value="00">0</option>
                            <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option>
                            <option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option>
                            <option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                            <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
                            <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
                            <option value="21">21</option><option value="22">22</option><option value="23">23</option>
                        </select>&nbsp;&nbsp;
                </div> 
                <div id="input-min" class="form-group sm-input">
                    <label for="minutos">&zwnj;</label>
                        <select ng-focus="showCal=false" name="minutos" ng-model="publicar.minutos" class="form-control">
                            <option value="00">00</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                </div>
                    
                <!-- PLAZAS -->
                <div id="input-plazas" class="form-group sm-input">
                    <label for="plazas">Plazas</label>
                    <input ng-focus="showCal=false" type="number" class="form-control" name="plazas" ng-model="publicar.plazas"/>
                </div>
                
                <div class="clearfix" style="height:90px;"></div>
                
                <!-- PUNTO DE ENCUENTRO -->
                <div id="input-ptoencuentro" class="form-group" ng-class="{
                            'has-error':!nuevoViajeForm.ptoencuentro.$valid && (!nuevoViajeForm.ptoencuentro.$pristine || nuevoViajeForm.$submitted),
                            'has-success':nuevoViajeForm.ptoencuentro.$valid && (!nuevoViajeForm.ptoencuentro.$pristine || nuevoViajeForm.$submitted)}">
                    
                    <label for="ptoencuentro">Punto de encuentro</label>
                    <input ng-focus="showCal=false" type="text" class="form-control" placeholder="Punto de encuentro" name="ptoencuentro" ng-model="publicar.ptoencuentro" required
                        ng-minlength="3" ng-maxlength="100">
                    
                    <!-- PUNTO DE ENCUENTRO *Mensajes de error* -->
                            <p ng-show="nuevoViajeForm.ptoencuentro.$error.required && !nuevoViajeForm.ptoencuentro.$pristine" class="form-text">Campo requerido.</p>
                            <p ng-show="nuevoViajeForm.ptoencuentro.$error.minlength && !nuevoViajeForm.ptoencuentro.$pristine" class="form-text">3 min.</p>
                            <p ng-show="nuevoViajeForm.ptoencuentro.$error.maxlength" class="form-text">50 max.</p>
                    
                    
                </div>
                
                <!-- PARADAS -->
                        <div class="form-group">
                            <label for="paradas">Paradas</label>
                            <input ng-focus="showCal=false" type="text" class="form-control" placeholder="Ej: parada1,p2,...,p3" name="paradas" ng-model="publicar.paradas" required>
                            <p ng-show="nuevoViajeForm.paradas.$error.required && !nuevoViajeForm.paradas.$pristine" class="form-text">Campo requerido.</p>
                        </div>
                
                <!-- COCHE -->
                        <div class="form-group">
                            <label for="coche">Coche</label>
                            <input ng-focus="showCal=false" type="text" class="form-control" placeholder="Marca, modelo..." name="coche" ng-model="publicar.coche" required>
                            <p ng-show="nuevoViajeForm.coche.$error.required && !nuevoViajeForm.coche.$pristine" class="form-text">Campo requerido.</p>
                        </div>        
                        
                        <div class="form-group">
                            <label class="checkbox-inline"><input disabled type="checkbox" value="0">L</label>
                            <label class="checkbox-inline"><input disabled type="checkbox" value="1">M</label>
                            <label class="checkbox-inline"><input disabled type="checkbox" value="2">M</label>
                            <label class="checkbox-inline"><input disabled type="checkbox" value="3">J</label>
                            <label class="checkbox-inline"><input disabled type="checkbox" value="4">V</label>
                        </div>
                        
        
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-success btn-lg btn-responsive" name="publicar"> <span class="glyphicon glyphicon-share"></span> Publicar</button>
            </form>
        </div>
        
        <div id="res-publicacion" ng-show="showResMsj" class=" container animated pulse">

            <div class="form-group left">
                <img src="img/icons/success02.png">
            </div>
            <div class="form-group right">
                <h2>{{ tituloResultado }}</h2>
                <p>Tu viaje ha sido publicado exitosamente, puedes ver el estado de tu viaje accediendo a traves de la pestaña  
                <a href = "micuenta.php?s=viajes"> Viajes </a> en tu <a href="micuenta.php">Area Personal</a>.</p>
                <p>ó</p>
                <p><a href = "javascript:window.location.href=window.location.href"> Publicar otro viaje </a></p>
            </div>
        </div>
        
        
        <br/><br/><br/>
        <!--<pre>Datos (publicar): {{ publicar | json }}</pre>-->
        
        
        <!--<pre>Errores Usuario: {{ nuevoViajeForm.origen.$error }}</pre>-->
        <?php

    }

    /* alex
    public function loadPublicarViaje()
    {
        ?>

        <div id="form-registro" class="container">
            <form novalidate name="nuevoViajeForm" ng-submit="publicarV(nuevoViajeForm.$valid)">

                <h2>Puntos de encuentro</h2>
                <!-- ORIGEN -->
                <div id="input-origen" class="form-group" ng-class="{
                            'has-error':!nuevoViajeForm.origen.$valid && (!nuevoViajeForm.origen.$pristine || nuevoViajeForm.$submitted),
                            'has-success':nuevoViajeForm.origen.$valid && (!nuevoViajeForm.origen.$pristine || nuevoViajeForm.$submitted)}">

                    <label for="origen">Origen</label>
                    <input type="text" class="form-control" placeholder="Origen" name="origen" ng-model="publicar.origen" required
                        ng-minlength="3" ng-maxlength="20">

                    <!-- ORIGEN *Mensajes de error* -->
                            <p ng-show="nuevoViajeForm.origen.$error.required && !nuevoViajeForm.origen.$pristine" class="form-text">Campo requerido.</p>
                            <p ng-show="nuevoViajeForm.origen.$error.minlength && !nuevoViajeForm.origen.$pristine" class="form-text">3 min.</p>
                            <p ng-show="nuevoViajeForm.origen.$error.maxlength" class="form-text">20 max.</p>


                </div>

                <!-- FECHA -->
                <div id="input-fecha" class="form-group">
                    <label for="fecha">Fecha</label>
                    <input class="datepicker" name="miFecha" ng-model="qqqq">
                    <input type="button"  id="mm" onclick="Ver()">
                </div>

                <!-- HORA -->
                <div id="input-hora" class="form-group">
                    <label for="hora">Horario</label>
                    <select name="horas" ng-model="publicar.horas">
                        <option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option>
                        <option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option>
                        <option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                        <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
                        <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
                        <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="0">24</option>
                    </select>&nbsp;h&nbsp;
                    <select name="minutos" ng-model="publicar.minutos">
                        <option value="00">00</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                    </select>
                    <!--<input type="text" class="form-control" placeholder="Hora" name="hora" ng-model="publicar.hora">-->
                </div>

                <div class="clearfix"></div>


                <!-- PLAZAS -->
                <div id="input-plaza" class="form-group">
                    <label for="plaza">Plazas</label>
                    <input type="number" min=1 class="form-control" value=1 name="plaza" ng-model="publicar.plazas"/>
                </div>

                <!-- SOLO MUJERES -->
                <div id="input-mujer" class="form-group">
                    <strong>Solo mujeres</strong>&nbsp;&nbsp;<input type="checkbox" name="mujer" ng-model="publicar.mujer">
                </div>

                <!-- VIAJE DIRECTO -->
                <div id="input-directo" class="form-group">
                    <strong>Viaje directo</strong>&nbsp;&nbsp;<input type="checkbox" name="directo" ng-model="publicar.directo">
                </div>


            <div class="clearfix"></div>
            <button type="submit" class="btn btn-success btn-lg btn-responsive" name="buscar"> <span class="glyphicon glyphicon-check"></span> Publicar</button>
            </form>
        </div>
        <br/><br/><br/>
        <pre>Datos (publicar): {{ publicar | json }}</pre>
        <pre>{{ qqqq }}</pre>

        <pre>Errores Usuario: {{ nuevoViajeForm.origen.$error }}</pre>
        <?php

    }*/
}
