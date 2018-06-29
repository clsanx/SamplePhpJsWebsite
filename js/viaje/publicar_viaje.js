(function() {

        var appViaje = angular.module('appViaje', ['ngRoute', 'ngAnimate', 'mp.datePicker']);

        appViaje.config(['$qProvider', function($qProvider) {
                $qProvider.errorOnUnhandledRejections(false);
        }]);

        appViaje.controller('ctrViaje', function($scope, $http, $timeout) {

                $scope.showFormPublicar = true;
                $scope.showResMsj = false;
                $scope.showCal = false;
                $scope.publicar = {};

                $scope.publicar.horas = "00";
                $scope.publicar.minutos = "00";
                $scope.publicar.plazas = 1;

                // Crear viaje
                $scope.publicarV = function(valid) {
                        $scope.showCal = false;
                        $scope.publicar.hora = '0' + $scope.publicar.horas + ':' + $scope.publicar.minutos + ':00';
                        //alert($scope.publicar.hora);
                        if (valid) {
                                console.log('Form submitted');
                                $scope.showFormPublicar = false;
                                var datos_publicarviaje = JSON.stringify($scope.publicar);
                                //console.log(datos_buscarviaje);

                                $http({
                                        method: 'POST',
                                        url: 'controllers/viaje/publicar.php',
                                        dataType: 'json',
                                        data: datos_publicarviaje,
                                        headers: {
                                                'Content-Type': 'application/x-www-form-urlencoded'
                                        }

                                }).then(function successCallback(response) {
                                        console.log(response);

                                        if (response.data.success) { // Viaje publicado con exito. 
                                                console.log('Viaje publicado');
                                                //$scope.showFormPublicar = false;

                                                $scope.tituloResultado = "Viaje publicado!";

                                                $timeout(function() {
                                                        $scope.showResMsj = true;
                                                }, 800);


                                                //$scope.mensajeResultado = " ";


                                                //$scope.message = response.data.message;

                                                //$scope.message = response.data.mensaje;
                                                //window.location.href = 'registrar_sc.php';

                                        }
                                        else { // error
                                                console.log('Ha ocurrido un error al operar con la bd');
                                                //alert(response.data.errors);
                                                // Mensajes de error.
                                                //$scope.resultados.mensaje = response.data.viajes;

                                        }

                                });


                        }
                        else {
                                console.log('Formulario invalido');
                        }


                };

        });



})();
