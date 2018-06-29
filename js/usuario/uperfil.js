(function() {

    var appPerfil = angular.module('appPerfil', ['ngRoute']);

    appPerfil.config(['$qProvider', function($qProvider) {
        $qProvider.errorOnUnhandledRejections(false);
    }]);


    // CONTROLADOR
    appPerfil.controller('ctrPerfil', function($scope, $http) {

        $scope.showChpass = false;
        $scope.datosPerfil = {};
        $scope.idUsuario = "";

        $scope.getUserData = function(idU) {

            if (idU != "") {
                console.log('Obtener datos de usuario.');
                console.log(idU);

                $scope.idUsuario = idU;

                var idusuario = JSON.stringify($scope.idUsuario);
                //alert(signup_nuevoUsuario);

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

                    if (response.data.success) { // Usuario registrado con exito. 

                        $scope.datosPerfil = response.data.resultado;

                    }
                    else { // error
                        console.log(response.data.resultado);

                    }

                });
            }
        };




    });


})();
