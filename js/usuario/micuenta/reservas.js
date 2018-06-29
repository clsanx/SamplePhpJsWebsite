(function() {

    // CONTROLADOR
    angular.module('appMiCuenta').controller('ctrMisReservas', function($scope, $http, $timeout, Upload) {
        $scope.listaReservas = {};
        //$scope.respuestaRes = {};

        // OBTENER RESERVAS DE USUARIO
        $scope.getReservas = function(idU) {

            if (idU != "") {
                console.log('Obtener reservas de usuario.');
                console.log(idU);

                var idusuario = JSON.stringify(idU);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/reserva/getReservas.php',
                    dataType: 'json',
                    data: idusuario,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Mensajes obtenidos. 
                        if (response.data.reservas != 'nores') {
                            console.log(response.data.reservas);
                            console.log('Reservas obtenidas');
                            $scope.listaReservas = response.data.reservas;
                        }
                        else {
                            console.log('Sin resultados.');
                            $scope.nores = '0 reservas';
                        }

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        //console.log(response.data.resultado);

                    }

                });
            }
        };



    });



})();
