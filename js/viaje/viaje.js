(function() {

    var appViaje = angular.module('appViaje', ['ngRoute']);

    appViaje.config(['$qProvider', function($qProvider) {
        $qProvider.errorOnUnhandledRejections(false);
    }]);



    // CONTROLADOR
    appViaje.controller('ctrViaje', function($scope, $http) {

        $scope.datosViaje = {};
        $scope.idViaje = "";
        $scope.nombreRem = "";
        $scope.solReserva = {};
        $scope.tipoMsj = "";
        $scope.resReservar = "";

        $scope.getViajeData = function(idV) {

            if (idV != "") {
                console.log('Obteniendo datos de viaje.');
                console.log(idV);

                $scope.idViaje = idV;

                var idviaje = JSON.stringify($scope.idViaje);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/viaje/getViaje.php',
                    dataType: 'json',
                    data: idviaje,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Datos obtenidos con exito. 
                        console.log('Datos obtenidos con exito.');
                        $scope.datosViaje = response.data.resultado;
                        //initMap($scope.datosViaje.origen);

                        if ($scope.datosViaje.conductor != "") {

                            var idusuario = JSON.stringify($scope.datosViaje.conductor);
                            //Obtener datos de conductor
                            $http({
                                method: 'POST',
                                url: 'controllers/usuario/getUsuario.php',
                                dataType: 'json',
                                data: idusuario,
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                }

                            }).then(function successCallback(response) {
                                console.log(response);

                                if (response.data.success) { // Datos obtenidos con exito. 
                                    console.log('Datos obtenidos con exito.');
                                    $scope.datosUsuario = response.data.resultado;
                                    //initMap($scope.datosViaje.origen);
                                }
                                else { // error
                                    console.log(response.data.resultado);

                                }

                            });
                        }

                    }
                    else { // error
                        console.log(response.data.resultado);

                    }

                });
            }


        };


        $scope.reservarViaje = function(idU) {
            $scope.tipoMsj = "";
            $scope.resReservar = "";
            console.log('Solicitar Reserva.');

            if ((idU != "") && (idU != null)) {
                console.log('Enviando datos para reserva...');
                $scope.solReserva.idPasajero = idU;
                $scope.solReserva.nombrePasajero = $scope.nombreRem;
                $scope.solReserva.idConductor = $scope.datosViaje.conductor;
                $scope.solReserva.idViaje = $scope.datosViaje.id;

                var datosreserva = JSON.stringify($scope.solReserva);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/reserva/solicitud.php',
                    dataType: 'json',
                    data: datosreserva,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Solicitud enviada 
                        console.log('Solicitud enviada.');

                        //Transicion show div solicitud enviada
                        $scope.resReservar = "Solicitud enviada.";
                        $scope.tipoMsj = "text-success";

                    }
                    else { // error
                        console.log(response.data.resultado);
                        console.log(response.data.error);

                        if (response.data.error == 0) {
                            console.log('Ha ocurrido un error al operar con la base de datos.');
                            // Transicion show div error
                            $scope.resReservar = "Ha ocurrido un error.";
                            $scope.tipoMsj = "text-danger";
                        }
                        else if (response.data.error == 1) {
                            $scope.resReservar = "Ya tienes una reserva en este viaje.";
                            $scope.tipoMsj = "text-warning";
                        }

                    }

                });
            }
        };


    });



})();

// //origen = $scope.datosViaje.origen;
// function initMap(origen) {
//     var directionsService = new google.maps.DirectionsService;
//     var directionsDisplay = new google.maps.DirectionsRenderer;
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 7,
//         center: {
//             lat: 43.16,
//             lng: 2.56
//         }
//     });
//     directionsDisplay.setMap(map);
//     // alert(document.getElementById("origen").value);
//     directionsService.route({
//         origin: origen,
//         destination: "CIFP ZORNOTZA LHII",
//         travelMode: google.maps.TravelMode.DRIVING
//     }, function(response, status) {
//         if (status === google.maps.DirectionsStatus.OK) {
//             directionsDisplay.setDirections(response);
//         }
//         else {
//             window.alert('Directions request failed due to ' + status);
//         }
//     });

// }
