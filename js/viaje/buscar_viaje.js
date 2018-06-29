(function() {

    var appBuscar = angular.module('appBuscar', ['ngRoute', 'star-rating', 'mp.datePicker', 'ngMaterial']);

    appBuscar.config(['$qProvider', function($qProvider) {
        $qProvider.errorOnUnhandledRejections(false);
    }]);


    appBuscar.controller('ctrBuscar', function($scope, $http, $timeout, $q, $log) {
        $scope.showCal = false;
        $scope.verViajes = false;
        $scope.verMsj = false;

        //$scope.listaViajes = {};
        $scope.buscarViaje = {};
        //$scope.patternFecha = '(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)';




        // Buscar viaje
        $scope.buscarV = function(valid) {
            $scope.verMsj = false;
            $scope.showCal = false;


            if (valid) {
                $scope.verViajes = false;
                console.log('Form submitted');
                var datos_buscarviaje = JSON.stringify($scope.buscarViaje);
                //console.log(datos_buscarviaje);


                $http({
                    method: 'POST',
                    url: 'controllers/viaje/buscar.php',
                    dataType: 'json',
                    data: datos_buscarviaje,
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }

                }).then(function successCallback(response) {
                    console.log(response);
                    $scope.divMsg = true;

                    if (response.data.success) { // Usuario registrado con exito. 
                        $scope.buscarViaje.fecha = "";
                        //$scope.message = response.data.message;
                        if (response.data.viajes != 'nores') {
                            $scope.listaViajes = response.data.viajes;
                            $scope.dataUsuarios = response.data.usuarios;
                            console.log(response.data.viajes);
                            $scope.verViajes = true;
                        }
                        else {

                            $scope.verViajes = false;
                            $scope.verMsj = true;
                            $scope.listaViajes = {};
                            $scope.dataUsuarios = {};
                            $scope.mensaje = "Sin resultados :(";
                        }


                    }
                    else { // error
                        console.log(response.data);

                    }

                });


            }
            else {
                console.log('Formulario invalido');
            }







        };




        // Origen autocomplete
        var self = this;

        self.simulateQuery = false;
        self.isDisabled = false;

        // list of `state` value/display objects
        self.states = loadAll();
        self.querySearch = querySearch;
        self.selectedItemChange = selectedItemChange;
        self.searchTextChange = searchTextChange;

        self.newState = newState;

        function newState(state) {
            alert("Sorry! You'll need to create a Constitution for " + state + " first!");
        }

        // ******************************
        // Internal methods
        // ******************************

        /**
         * Search for states... use $timeout to simulate
         * remote dataservice call.
         */
        function querySearch(query) {
            var results = query ? self.states.filter(createFilterFor(query)) : self.states,
                deferred;
            if (self.simulateQuery) {
                deferred = $q.defer();
                $timeout(function() {
                    deferred.resolve(results);
                }, Math.random() * 1000, false);
                return deferred.promise;
            }
            else {
                return results;
            }
        }

        function searchTextChange(text) {
            $log.info('Text changed to ' + text);
        }

        function selectedItemChange(item) {
            $log.info('Item changed to ' + JSON.stringify(item));
        }

        /**
         * Build `states` list of key/value pairs
         */
        function loadAll() {
            var allStates = "Abadiño, Abanto y Ciérvana, Ajangiz, Alonsotegi, Amorebieta-Etxano, Amoroto,\
                            Arakaldo, Arantzazu, Areatza, Arrankudiaga, Arratzu, Arrieta, Arrigorriaga, Artea, Artzentales, Atxondo, \
                            Aulesti, Bakio, Balmaseda, Barakaldo, Barrika, Basauri, Bedia, Berango, Bermeo, Berriatua, Berriz, Bilbao, Busturia, \
                            Derio, Dima, Durango, Ea, Elantxobe, Elorrio, Erandio, Ereño, Ermua, Errigoiti, Etxebarri, Etxebarria, Forua, Fruiz, \
                            Galdakao, Galdames, Gamiz - Fika, Garai, Gatika, Gautegiz - Arteaga, Gernika - Lumo, Getxo, Gizaburuaga, Gordexola, Gorliz, Gueñes, \
                            Ibarrangelu, Igorre, Ispaster, Iurreta, Izurtza, Karrantza Harana, Kortezubi, Lanestosa, Larrabetzu, Laukiz, Leioa, Lekeitio, \
                            Lemoa, Lemoiz, Lezama, Loiu, Mallabia, Mañaria, Markina - Xemein, Maruri - Jatabe, Mendata, Mendexa, Meñaka, Morga, Mundaka, \
                            Mungia, Munitibar - Arbatzegi Gerrikaitz, Murueta, Muskiz, Muxika, Nabarniz, Ondarroa, Orozko, Ortuella, Otxandio, Plentzia, \
                            Portugalete, Santurtzi, Sestao, Sondika, Sopela, Sopuerta, Sukarrieta, Trucios - Turtzioz, Ubide, Ugao - Miraballes, Urduliz, Orduña, \
                            Valle de Trápaga - Trapagaran, Zaldibar, Zalla, Zamudio, Zaratamo, Zeanuri, Zeberio, Zierbena, Ziortza - Bolibar ";
            return allStates.split(/, +/g).map(function(state) {
                return {
                    value: state.toLowerCase(),
                    display: state
                };
            });
        }

        /**
         * Create filter function for a query string
         */
        function createFilterFor(query) {
            var lowercaseQuery = angular.lowercase(query);

            return function filterFn(state) {
                return (state.value.indexOf(lowercaseQuery) === 0);
            };

        }



    });



})();
