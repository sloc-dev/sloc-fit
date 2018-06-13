var app = angular.module('app', ['ngRoute', 'ngSanitize', 'ui-notification']);

app.config(function(NotificationProvider) {
	NotificationProvider.setOptions({
		startTop: 20,
		startRight: 10,
		verticalSpacing: 20,
		horizontalSpacing: 20,
		positionX: 'right',
		positionY: 'top'
	});
});
	
app.config(function($routeProvider) {
	$routeProvider
	.when('/home', {
		title: 'Home',
		activeMenu: 'home',
		templateUrl: 'views/home/index.html',
		controller: 'HomeCtrl'
	})
	.when('/clienti', {
		title: 'Clienti',
		activeMenu: 'clienti',
		templateUrl: 'views/clienti/index.html',
		controller: 'ClientiCtrl'
	})
	.otherwise({
		redirectTo: '/home'
	});
});

app.run(['$rootScope', function($rootScope) {
	$rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
		$rootScope.title = current.$$route.title;
		$rootScope.activeMenu = current.$$route.activeMenu;
	});
}]);