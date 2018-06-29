(function() {

    var appRegistro = angular.module('appRegistro', ['ngRoute', 'ngAnimate']);

    appRegistro.config(['$qProvider', function($qProvider) {
        $qProvider.errorOnUnhandledRejections(false);
    }]);

    // DIRECTIVAS

    // *Check if usuario existe en la db.
    appRegistro.directive('useruniqueData', function($http) {
        return {
            restrict: 'A',
            require: 'ngModel',
            link: function(scope, elem, attrs, ctrl) {
                elem.on('blur', function(evt) {
                    scope.$apply(function() {
                        var request = $http({
                            method: 'POST',
                            url: 'controllers/usuario/userExiste.php',
                            data: {
                                'data': elem.val(),
                            },
                        });

                        request.then(function(response) {
                            // Si existe valor unique = false
                            if (response.data == true) {
                                ctrl.$setValidity('unique', false);
                            }
                            else {
                                // Si no existe valor unique = true
                                ctrl.$setValidity('unique', true);
                            }
                        }, function(error) {
                            alert(error.data);
                        });
                    });
                });
            }
        }

    });

    // *Check if email existe en la db.
    appRegistro.directive('emailuniqueData', function($http) {
        return {
            restrict: 'A',
            require: 'ngModel',
            link: function(scope, elem, attrs, ctrl) {
                elem.on('blur', function(evt) {
                    scope.$apply(function() {
                        var request = $http({
                            method: 'POST',
                            url: 'controllers/usuario/emailExiste.php',
                            data: {
                                'data': elem.val(),
                            },
                        });

                        request.then(function(response) {
                            // Si existe valor unique = false
                            if (response.data == true) {

                                ctrl.$setValidity('unique', false);
                            }
                            else {
                                // Si no existe valor unique = true
                                ctrl.$setValidity('unique', true);
                            }
                        }, function(error) {
                            alert(error.data);
                        });
                    });
                });
            }
        }

    });

    // CONTROLADOR
    appRegistro.controller('ctrRegistro', function($scope, $http, $timeout) {

        $scope.showFormRegistrar = true;
        $scope.showResMsj = false;
        $scope.divMsg = false;
        $scope.usuarioPattern = "^[a-z]+[a-z0-9]*[.|-]?[a-z0-9]*$"; //Permite spacebar al final, revisar luego*

        // Lista de modulos
        //enaut-mejora para cuando fienaliceis todo el proyectosi hay tiempo-
        //que el array se rellene con una consulta a la BBDD
        $scope.modulos = [
            "NO SELECCIONADO",
            "ACTIVIDADES COMERCIALES",
            "CONSTRUCCIONES METÁLICAS",
            "CUIDADOS AUXILIARES DE ENFERMERÍA",
            "DESARROLLO DE APLICACIONES WEB",
            "MANTENIMIENTO ELECTROMECÁNICO",
            "MECATRÓNICA INDUSTRIAL",
            "SISTEMAS MICROINFORMÁTICOS Y REDES",
            "SOLDADURA Y CALDERERÍA"
        ];

        // Array que contiene los datos del usuario a registrar
        $scope.nuevoUsuario = {};

        // Inicializar comboboxes
        $scope.nuevoUsuario.modulo = "NO SELECCIONADO";
        $scope.nuevoUsuario.genero = "Hombre";

        // Procesar Formulario
        $scope.processForm = function(valid) {
            $scope.showFormRegistrar = false;
            if (valid) {
                console.log('Form submitted');
                var signup_nuevoUsuario = JSON.stringify($scope.nuevoUsuario);
                //alert(signup_nuevoUsuario);
                $scope.divMsg = false;

                $http({
                    method: 'POST',
                    url: 'controllers/usuario/registro.php',
                    dataType: 'json',
                    data: signup_nuevoUsuario,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);
                    //$scope.divMsg = true;

                    if (response.data.success) { // Usuario registrado con exito. 
                        console.log('Registro exitoso.');

                        $timeout(function() {
                            $scope.showResMsj = true;
                        }, 200);

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd');
                        //alert(response.data.errors);
                        // Mensajes de error.

                        $scope.errorUsuario = response.data.errors.usuario;
                        $scope.errorContrasena = response.data.errors.contrasena;
                        $scope.errorNombre = response.data.errors.nombre;
                        $scope.errorApellidos = response.data.errors.apellidos;
                        $scope.errorEmail = response.data.errors.email;
                    }

                });


            }
            else {
                console.log('Formulario invalido');
            }

        };

        // Reset input Usuario luego de verificar si existe (ng-change)
        $scope.resetUserExiste = function(unique) {
            if (unique) {
                $scope.nuevoUsuarioForm.usuario.$error = {};
                $scope.nuevoUsuarioForm.usuario.$valid = true;
            }
        };

        // Reset input Email luego de verificar si existe (ng-change)
        $scope.resetEmailExiste = function(unique) {
            if (unique) {
                $scope.nuevoUsuarioForm.email.$error = {};
                $scope.nuevoUsuarioForm.email.$valid = true;
            }
        };


    });



})();
