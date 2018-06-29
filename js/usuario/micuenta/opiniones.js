(function() {

    // CONTROLADOR
    angular.module('appMiCuenta').controller('ctrMisOpiniones', function($scope, $http, $timeout, $attrs) {
        $scope.idusuario = "";
        $scope.listaOpiniones = {};


        // OBTENER OPINIONES
        $scope.getOpiniones = function() {

            if ($scope.idusuario != "") {

                console.log('Obteniendo opiniones.');
                console.log($scope.idusuario);



                var iddata = JSON.stringify($scope.idusuario);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/opinion/getOpiniones.php',
                    dataType: 'json',
                    data: iddata,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Viajes obtenidos. 
                        console.log(response.data.opiniones);
                        if (response.data.opiniones != 'nores') {
                            console.log('Viajes conseguidos.');
                            $scope.listaOpiniones = response.data.opiniones;

                        }
                        else {
                            $scope.listaOpiniones = {};
                            console.log('Sin resultados');

                        }


                        //$scope.ctrMisAlertas.reload();

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
