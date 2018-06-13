app.controller('MainCtrl', ['$scope', '$http', 'UtilsSvc', function ($scope, $http, UtilsSvc) {
	$scope.gravatar_url = UtilsSvc.getGravatarUrl('test@gmail.com');
	console.log($scope.gravatar_url);
}]);