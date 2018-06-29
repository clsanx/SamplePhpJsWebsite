(function() {
    // var appMiCuenta = angular.module('appMiCuenta', ['ngRoute', 'ngFileUpload', 'ngAnimate']);

    // appMiCuenta.config(['$qProvider', function($qProvider) {
    //     $qProvider.errorOnUnhandledRejections(false);
    // }]);


    // CONTROLADOR
    angular.module('appMiCuenta').controller('ctrMiPerfil', function($scope, $http, $timeout, Upload) {
        $scope.showChpass = false;
        $scope.verEditarImg = false;
        $scope.datosPerfil = {};
        $scope.mensaje = "";
        $scope.showSuccess = false;
        $scope.formPerfil = true;
        $scope.msgBtnChP = "Cambiar contraseña";

        // OBTENER DATOS DE USUARIO
        $scope.getUserData = function(idU) {

            if (idU != "") {
                console.log('Obtener datos de usuario.');
                console.log(idU);

                $scope.datosPerfil.id = idU;

                var idusuario = JSON.stringify($scope.datosPerfil.id);
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
                        console.log('Datos cargados');
                        $scope.datosPerfil = response.data.resultado;

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        //console.log(response.data.resultado);

                    }

                });
            }
        };

        // CAMBIAR IMAGEN DE PERFIL
        /* Actualmente se llama a la función upload al seleccionar la imagen,
         *  pero tambien podria llamarse al hacer click en guardar, por definir 
         *  en un futuro */
        $scope.upload = function(file) {
            Upload.upload({
                url: 'controllers/usuario/uploadImgPerfil.php',
                method: 'POST',
                file: file,
                data: {
                    'userid': $scope.datosPerfil.id,
                    'username': $scope.datosPerfil.usuario,
                    'rutaimg': 'img/users_img/' + $scope.datosPerfil.usuario
                }
            }).then(function successCallback(response) {
                console.log(response);

                if (response.data.upload_success) { // Usuario registrado con exito. 
                    console.log('Imagen subida.');

                    if (response.data.urldb_success) {
                        console.log('Url actualizada.');
                        $scope.datosPerfil.imagen_perfil = response.data.imgurl;
                    }
                    else {
                        console.log('Ha ocurrido un error al actualizar la url en la base datos');
                    }


                }
                else { // error
                    console.log('Ha ocurrido un error al subir la imagen.');


                }

            });

        };


        // Update datos de usuario

        $scope.updateUsuario = function(valid) {

            $scope.showSuccess = false;

            if (valid) {
                console.log('Form submitted');
                var update_data_usuario = JSON.stringify($scope.datosPerfil);
                //alert(signup_nuevoUsuario);
                //$scope.divMsg = false;

                $http({
                    method: 'POST',
                    url: 'controllers/usuario/update.php',
                    dataType: 'json',
                    data: update_data_usuario,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);
                    //$scope.divMsg = false;

                    if (response.data.success) { // Usuario registrado con exito. 
                        console.log('Datos modificados.');
                        $scope.message = response.data.message;

                        // $scope.formPerfil = false;

                        // $timeout(function() { 
                        //     $scope.formPerfil = true;
                        // }, 800);

                        $scope.showSuccess = true;

                        $timeout(function() {
                            $scope.showSuccess = false;
                        }, 2000);


                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        // Mensajes de error.
                        // $scope.errorUsuario = response.data.errors.usuario;
                        // $scope.errorContrasena = response.data.errors.contrasena;
                        // $scope.errorNombre = response.data.errors.nombre;
                        // $scope.errorApellidos = response.data.errors.apellidos;
                        // $scope.errorEmail = response.data.errors.email;
                    }

                });


            }
            else {
                console.log('Formulario invalido');
            }

        };


        // Cambiar contraseña
        $scope.cambiarPassword = function() {

            if ($scope.datosPerfil.id != "") {
                $scope.showChpass = false;

                console.log('Cambiando contraseña...');
                console.log($scope.datosPerfil.id);

                var datosc = JSON.stringify($scope.datosPerfil);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/usuario/cambiarPassword.php',
                    dataType: 'json',
                    data: datosc,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Usuario registrado con exito. 
                        console.log('Contraseña cambiada');
                        //$scope.datosPerfil = response.data.resultado;

                        $scope.msgBtnChP = "Contraseña Cambiada";
                        $timeout(function() {
                            $scope.msgBtnChP = "Cambiar Contraseña";
                        }, 2500);
                    }
                    else { // error

                        console.log(response.data.resultado);

                    }


                });
            }
        };



        // // Reset input Usuario luego de verificar si existe (ng-change)
        // $scope.resetUserExiste = function(unique) {
        //     if (unique) {
        //         $scope.nuevoUsuarioForm.usuario.$error = {};
        //         $scope.nuevoUsuarioForm.usuario.$valid = true;
        //     }
        // };

        // // Reset input Email luego de verificar si existe (ng-change)
        // $scope.resetEmailExiste = function(unique) {
        //     if (unique) {
        //         $scope.nuevoUsuarioForm.email.$error = {};
        //         $scope.nuevoUsuarioForm.email.$valid = true;
        //     }
        // };


    });



})();
