(function() {

    // CONTROLADOR
    angular.module('appMiCuenta').controller('ctrMisMensajes', function($scope, $http, $timeout, Upload) {
        $scope.listaMensajes = {};
        $scope.respuestaRes = {};
        $scope.opinion = {};
        $scope.opinion.valoracion = 'Regular';
        $scope.showOpinar = false;
        $scope.nuevaOpinion = {};
        $scope.opinarBtn = 'Opinar';


        // OBTENER MENSAJES DE USUARIO
        $scope.getMensajes = function() {

            if ($scope.idusuario != "") {
                console.log('Obtener mensajes de usuario.');
                console.log($scope.idusuario);

                var idusuario = JSON.stringify($scope.idusuario);
                //alert(signup_nuevoUsuario);

                $http({
                    method: 'POST',
                    url: 'controllers/mensaje/getMensajes.php',
                    dataType: 'json',
                    data: idusuario,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);

                    if (response.data.success) { // Mensajes obtenidos. 
                        if (response.data.mensajes != 'nores') {
                            console.log(response.data.mensajes);
                            console.log('Mensajes obtenidos');
                            $scope.listaMensajes = response.data.mensajes;
                        }
                        else {
                            console.log('Sin resultados.');
                            $scope.nores = '0 mensajes recibidos';
                        }

                    }
                    else { // error
                        console.log('Ha ocurrido un error al operar con la bd.');
                        //console.log(response.data.resultado);

                    }

                });
            }
        };

        // RESPONDER SOLICITUD DE RESERVA
        $scope.responderSolReserva = function(res, idViaje, idReserva, idMensaje, idRem, nombreRem) {


            //console.log('Aceptar Reserva...');
            console.log(res);
            console.log(idViaje);
            console.log(idReserva);

            $scope.respuestaRes.idRem = $scope.idusuario;
            $scope.respuestaRes.valor = res;
            $scope.respuestaRes.idRes = idReserva;
            $scope.respuestaRes.idViaje = idViaje;
            $scope.respuestaRes.idMensaje = idMensaje;
            $scope.respuestaRes.idDest = idRem;
            $scope.respuestaRes.nombreDest = nombreRem;

            var respuestaReserva = JSON.stringify($scope.respuestaRes);

            $http({
                method: 'POST',
                url: 'controllers/reserva/respReserva.php',
                dataType: 'json',
                data: respuestaReserva,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }

            }).then(function successCallback(response) {
                console.log(response);

                if (response.data.success) { // Operacion exitosa 

                    $scope.opinarBtn = 'Opinion enviada';
                    $scope.getMensajes();
                    console.log(response.data.msg);

                }
                else { // error
                    console.log(response.data.error);
                    //console.log(response.data.resultado);

                }

            });

        };



        // ENVIAR OPINION
        $scope.enviarOpinion = function(idOpinado, idOpinador, idViaje, comentario, valoracion, idmsj, nombreOpinador) {


            //console.log('Aceptar Reserva...');
            console.log(idOpinado);
            console.log(idOpinador);
            console.log(comentario);

            $scope.nuevaOpinion.idOpinador = idOpinado;
            $scope.nuevaOpinion.idOpinado = idOpinador;
            $scope.nuevaOpinion.idViaje = idViaje;
            $scope.nuevaOpinion.comentario = comentario;
            $scope.nuevaOpinion.valoracion = valoracion;
            $scope.nuevaOpinion.idMsj = idmsj;
            $scope.nuevaOpinion.nombreOpinador = nombreOpinador;



            var opinion = JSON.stringify($scope.nuevaOpinion);

            $http({
                method: 'POST',
                url: 'controllers/opinion/nuevaOpinion.php',
                dataType: 'json',
                data: opinion,
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                }

            }).then(function successCallback(response) {
                console.log(response);

                if (response.data.success) { // Operacion exitosa 

                    $scope.opinarBtn = 'OPINION ENVIADA';
                    $timeout(function() {
                        $scope.opinarBtn = 'Opinar';
                        $scope.msgBtnChP = "Cambiar Contraseña";
                        $scope.getMensajes();
                    }, 2500);


                    //console.log(response.data.msg);

                }
                else { // error
                    console.log(response.data.error);
                    //console.log(response.data.resultado);

                }

            });

        };

    });








})();
