(function() {

	'use strict';

	angular
		.module('timeTracker')
		.controller('TimeEntry', TimeEntry);

		function TimeEntry(time) {

			var vm = this;

			vm.timeentries = [];

			vm.totalTime = {};

			time.getTime().then(function(results) {
				vm.timeentries = results;
				updateTotalTime(vm.timeentries);
			}, function(error) {
				console.log(error);
			});

			function updateTotalTime(timeentries) {
				vm.totalTime = time.getTotalTime(timeentries);
			}

			vm.logNewTime = function() {

				if(vm.clockOut < vm.clockIn) {
					alert("You can't clock before you clock in!");
					return;
				}
				vm.timeentries.push({
					"user_id": 1,
					"user_firstname":"Ryan",
					"user_lastname":"Chenkie",
					"start_time":vm.clockIn,
					"end_time":vm.clockOut,
					"loggedTime": time.getTimeDiff(vm.clockIn, vm.clockOut),
					"comment":vm.comment
				});

				updateTotalTime(vm.timeentries);

				vm.comment = "";
			}
		}
})();