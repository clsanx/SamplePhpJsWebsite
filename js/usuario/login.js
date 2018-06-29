(function() {

    var appLogin = angular.module('appLogin', ['ngRoute']);

    appLogin.config(['$qProvider', function($qProvider) {
        $qProvider.errorOnUnhandledRejections(false);
    }]);



    // CONTROLADOR
    appLogin.controller('ctrLogin', function($scope, $http) {

        $scope.invLogin = ""; // Ocultar msj de error
        $scope.datosLogin = {}; //array datos login

        // Intentar Login
        $scope.login = function(validform) {
            $scope.invLogin = ""; // Ocultar msj de error

            // Si el formulario es valido...
            if (validform) {

                console.log('Form submitted');

                // Pasar datos a JSON
                var logdataUsuario = JSON.stringify($scope.datosLogin);

                // Enviar datos de usuario en JSON a login.php
                $http({
                    method: 'POST',
                    url: 'controllers/usuario/login.php',
                    dataType: 'json',
                    data: logdataUsuario,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    // Analizamos respuesta desde login.php
                    console.log(response);

                    // Si la operacion ha sido exitosa...
                    if (response.data.success) {

                        if (response.data.valid) {
                            // Redireccionamos a panel de usuario.
                            window.location.href = 'micuenta.php';
                        }
                        else {
                            $scope.datosLogin = {};
                            $scope.loginForm.$setPristine();
                            $scope.invLogin = "Usuario o contraseña incorrecto."
                        }



                    }
                    else { // Si ha ocurrido un error al realizar la operacion...

                        // Mostramos mensajes de error.
                        $scope.errorUsuario = response.data.errors.usuario;
                        $scope.errorContrasena = response.data.errors.contrasena;
                        $scope.errorNombre = response.data.errors.nombre;
                        $scope.errorApellidos = response.data.errors.apellidos;
                        $scope.errorEmail = response.data.errors.email;
                    }

                });


            }
            else { // Si el formulario no es valido...
                console.log('Formulario invalido');
            }

        };


    });



})();
