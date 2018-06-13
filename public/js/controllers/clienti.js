app.controller('ClientiCtrl', ['$scope', '$http', 'UtilsSvc', function ($scope, $http, UtilsSvc) {
	$scope.page = 'list';
	var cliente_backup = null;
	
	$scope.loadClienti = function(){
		$http.get('/api/clienti')
		.success(function (data, status, headers, config) {
			$scope.clienti = data.data.clienti;
			console.log(angular.toJson($scope.clienti));
		}).error(function (data, status, headers, config) {
			// ngNotify.set(data.response, {type: 'error', duration: 3000, html: true});
		});
	};
	
	$scope.addCliente = function(){
		$scope.cliente = {};
		$scope.clienti.push($scope.cliente);
		goToForm();
	};
	
	$scope.saveCliente = function(){
		$http.post('/api/cliente/save', $scope.cliente)
		.success(function (data, status, headers, config) {
			UtilsSvc.notifySuccess(data.response);
		}).error(function (data, status, headers, config) {
			UtilsSvc.notifyError(data.response);
		});
	};
	
	$scope.editCliente = function(cliente){
		$scope.cliente = cliente;
		goToForm();					
	};
	
	$scope.undo = function(){
		$scope.page = 'list';
	};
	
	function goToForm(){
		cliente_backup = $scope.cliente;
		$scope.page = 'form';
	};

	
	$scope.loadClienti();
}]);