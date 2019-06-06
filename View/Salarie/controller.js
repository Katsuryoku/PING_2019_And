var app = angular.module('app', [
	'ui.bootstrap',
	'smart-table',
	'mw-datepicker-range',
	'multipleDatePicker'
				
]);


app.controller('MainCtrl',['$scope', 'mwMultiSelectService', function($scope, mwMultiSelectService) {

	//datepicker range popup
	$scope.activeDate = null;
	$scope.selectedDates = [];
	$scope.open = function() {
		$scope.opened = true;
	};
	$scope.opened = false;
	$scope.options = {
		minDate:new Date()

	};
	


}]);