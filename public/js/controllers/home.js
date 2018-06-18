app.controller('HomeCtrl', ['$scope', '$http', function ($scope, $http) {
	
	$scope.tab = 'statistiche';
  	$scope.count = 0;
  
  	$scope.initCount = function(){
		$http.get('/api/clienti/count')
		.success(function (data, status, headers, config) {
			$scope.count = data.data.count;
		}).error(function (data, status, headers, config) {
			UtilsSvc.notifyError(data.response);
		});
	};
  
  	$scope.initCount();
	
}]);
