// var app = angular.module('show_hide_password', []);

//  app.controller('show_hide_password_controller', function($scope){

//   $scope.inputType = 'password';
//   $scope.showHideClass = 'glyphicon glyphicon-eye-open';

//   $scope.showPassword = function(){
//    if($scope.password_field != null)
//    {
//     if($scope.inputType == 'password')
//     {
//      $scope.inputType = 'text';
//      $scope.showHideClass = 'glyphicon glyphicon-eye-close';
//     }
//     else
//     {
//      $scope.inputType = 'password';
//      $scope.showHideClass = 'glyphicon glyphicon-eye-open';
//     }
//    }
//   };

//  });


var myApp = angular.module('myApp', []);
myApp.controller('mainCtrl', ['$scope', function( $scope ){
  
  // Set the default value of inputType
  $scope.inputType = 'password';
  
  // Hide & show password function
  $scope.hideShowPassword = function(){
    if ($scope.inputType == 'password')
      $scope.inputType = 'text';
    else
      $scope.inputType = 'password';
  };
  
}]);