<!DOCTYPE html>
<html>
	<head>
		<script src='js/angular.min.js'></script>
		<title></title>
		<body>
			<div ng-app='codeTestApp' ng-controller='codeTestCtrl'>
			Sort Type: {{ sortType }} <br>
			Sort Reverse: {{ sortReverse }} <br>
			Search Query: {{ searchCompany }} <br>
				<table>
					<tr>
						<td>
							<a href="#" ng-click="sortType = 'name'">Name
								<span ng-show="sortType == 'name'"></span>
							</a>
						</td>
						<td>
							<a href="#" ng-click="sortType = 'gender'">Gender
								<span ng-show="sortType == 'gender'"></span>
							</a>
						</td>
						<td>
							<a href="#" ng-click="sortType = 'age'">Age
								<span ng-show="sortType == 'age'"></span>
							</a>
						</td>
						<td>
							<a href="#" ng-click="sortType = 'company'">Company
								<span ng-show="sortType == 'company'"></span>
							</a>
						</td>
						<td>
							<a href="#" ng-click="sortType = 'email'">Email
								<span ng-show="sortType == 'email'"></span>
							</a>
						</td>
						<td>
							<a href="#" ng-click="sortType = 'phone'">Phone
								<span ng-show="sortType == 'phone'"></span>
							</a>
						</td>
						<td>
							<a href="#" ng-click="sortType = 'balance'">Balance
								<span ng-show="sortType == 'balance'"></span>
							</a>
						</td>
					</tr>
					<tr ng-repeat="x in records | orderBy:sortType:sortReverse">
						<td>{{x.name}}</td>
						<td>{{x.gender}}</td>
						<td>{{x.age}}</td>
						<td>{{x.company}}</td>
						<td>{{x.email}}</td>
						<td>{{x.phone}}</td>
						<td>{{x.balance}}</td>
					</tr>
				</table>
			</div>

			<script>
				var app = angular.module('codeTestApp', []);
				app.controller('codeTestCtrl', function($scope, $http)
				{
					$scope.sortType = 'name';
					$scope.sortReverse = false;
					$scope.searchCompany = '';
					$http.get('json/sample.json')
					.then(function (response)
					{
						$scope.records = response.data;
					});
				});
			</script>
		</body>
	</head>
</html>