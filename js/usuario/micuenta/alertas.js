(function() {

    // CONTROLADOR
    angular.module('appMiCuenta').controller('ctrMisAlertas', function($scope, $http, $timeout, $attrs) {
        $scope.showFormAlerta = true;
        $scope.nuevaAlerta = {};

        //$scope.respuestaRes = {};

        // INSERTAR ALERTA
        $scope.insertAlerta = function() {

            if (($scope.nuevaAlerta.origen != "") && ($scope.nuevaAlerta.origen != null)) {
                console.log('Insertando nueva alerta.');
                console.log($scope.nuevaAlerta.origen);
                console.log($scope.idusuario);
                console.log($scope.email);

                $scope.nuevaAlerta.idusuario = $scope.idusuario;
                $scope.nuevaAlerta.email = $scope.email;

                var dataalerta = JSON.stringify($scope.nuevaAlerta);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/alerta/nuevaAlerta.php',
                    dataType: 'json',
                    data: dataalerta,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Mensajes obtenidos. 
                        console.log('Alerta creada.');
                        //$scope.ctrMisAlertas.reload();
                        $scope.getAlertas();

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        //console.log(response.data.resultado);

                    }
                    $scope.nuevaAlerta = {};
                });
            }
        };

        // ELIMINAR ALERTA
        $scope.eliminarAlerta = function(obj) {
            //var idalerta = decodeURIComponent(uidalerta);

            var idalerta = obj.target.attributes.name.value;
            console.log(idalerta);

            if ((idalerta != "") && (idalerta != null)) {
                console.log('Eliminando alerta...');
                console.log(idalerta);

                var ealerta = JSON.stringify(idalerta);

                $http({
                    method: 'POST',
                    url: 'controllers/alerta/eliminarAlerta.php',
                    dataType: 'json',
                    data: ealerta,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Mensajes obtenidos. 
                        console.log('Alerta eliminada.');
                        //$scope.ctrMisAlertas.reload();
                        $scope.getAlertas();

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        //console.log(response.data.resultado);

                    }
                    $scope.nuevaAlerta = {};
                });
            }
        };


        // OBTENER ALERTAS
        $scope.getAlertas = function() {

            if ($scope.idusuario != "") {

                console.log('Obteniendo alertas.');
                console.log($scope.idusuario);

                //var dataalerta = JSON.stringify(idusuario);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/alerta/getAlertas.php',
                    dataType: 'json',
                    data: $scope.idusuario,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Alertas obtenidas. 
                        console.log(response.data.alertas);
                        if (response.data.alertas != 'nores') {
                            console.log('Alertas conseguidas.');
                            $scope.listaAlertas = response.data.alertas;

                        }
                        else {
                            $scope.listaAlertas = {};
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
