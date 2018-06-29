angular.module('appMiCuenta', ['ngRoute', 'ngFileUpload', 'ngAnimate']);

angular.module('appMiCuenta').config(['$qProvider', function($qProvider) {
    $qProvider.errorOnUnhandledRejections(false);
}]);
