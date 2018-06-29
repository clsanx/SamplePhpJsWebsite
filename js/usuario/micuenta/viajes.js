(function() {

    // CONTROLADOR
    angular.module('appMiCuenta').controller('ctrMisViajes', function($scope, $http, $timeout, Upload, $location) {
        $scope.$location = $location;
        $scope.listaViajes = {};
        $scope.res = '';
        $scope.bViajes = {};

        //$scope.respuestaRes = {};

        // OBTENER VIAJES PUBLICADOS POR USUARIO
        $scope.getViajes = function(idU) {
            $scope.res = '';
            $scope.tipoMsj = '';
            if (idU != "") {
                console.log('Obtener viajes de usuario.');
                console.log(idU);
                $scope.bViajes = {};
                $scope.bViajes.conductor = idU;
                $scope.bViajes.tipoBusqueda = 1;



                var databuscar = JSON.stringify($scope.bViajes);

                $http({
                    method: 'POST',
                    url: 'controllers/viaje/lista_viajes_usuario.php',
                    dataType: 'json',
                    data: databuscar,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Viajes obtenidos. 
                        if (response.data.viajes != 'nores') {
                            console.log(response.data.reservas);
                            console.log('Viajes obtenidos');
                            $scope.listaViajes = response.data.viajes;
                        }
                        else {
                            console.log('Sin resultados.');
                            $scope.res = 'No has publicado ningun viaje.';
                            $scope.tipoMsj = 'text-info';
                        }

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        $scope.res = 'Ha ocurrido un error.';
                        $scope.tipoMsj = 'text-danger';
                        //console.log(response.data.resultado);

                    }

                });
            }
        };



    });



})();
