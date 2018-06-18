app.controller('ClientiCtrl', ['$scope', '$http', 'UtilsSvc', function ($scope, $http, UtilsSvc) {
	
	$scope.page = 'list';
	$scope.clienti = [];
	$scope.clienti_last = [];
	var cliente_backup = null;
	
	$scope.loadClienti = function(){
		$http.get('/api/clienti')
		.success(function (data, status, headers, config) {
			$scope.clienti = data.data.clienti;
		}).error(function (data, status, headers, config) {
			UtilsSvc.notifyError(data.response);
		});
	};
	
	$scope.loadUltimiClienti = function(){
		$http.get('/api/clienti/lasts')
		.success(function (data, status, headers, config) {
			$scope.clienti_last = data.data.clienti;
		}).error(function (data, status, headers, config) {
			UtilsSvc.notifyError(data.response);
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
          	var index = $scope.clienti.indexOf($scope.cliente);
			$scope.clienti[index].id = data.data.id;
			$scope.cliente = null;
          	$scope.page = 'list';
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
	$scope.loadUltimiClienti();
	
}]);
