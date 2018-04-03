<?php
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title></title>
	<!--Nothing was precised about using CSS but I thought it would look cleaner with some Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!--<script src="https://ajax.googleapis.com/ajax/libs/mootools/1.5.2/mootools.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

</head>
<body>
	<div class="container" ng-app="AApp" ng-controller="ACtrl">
		<h3>With Angular</h3>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Email</th>
					<th scope="col">Alert</th>
				</tr>
			</thead>
			<tbody ng-repeat="person in people | filter:query">
				<tr>
					<td>{{ person.first_name }}</td>
					<td>{{ person.last_name }}</td>
					<td>{{ person.email }}</td>
					<td>
						<button class="btn btn-primary" ng-click="doAlert(person.first_name, person.last_name)" name="submit">Alert!</button>
					</td>
				</tr>
			</tbody>
		</table>
		
		<h3>With PHP</h3>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Email</th>
					<th scope="col">Alert</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($people as $person): ?>
					<tr>
						<td><?=$person['first_name'];?></td>
						<td><?=$person['last_name'];?></td>
						<td><?=$person['email'];?></td>
						<td>
							<button class="btn btn-primary" onclick="alert('<?=$person['first_name']. ' ' .$person['last_name'];?>')" name="submit">Alert!</button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script>
		var app = angular.module('AApp', []);
		app.controller('ACtrl', function($scope) {
			$scope.people=<?php echo json_encode($people);?>;
			$scope.doAlert = function(first, second) {
				alert(first + ' ' + second);
			};
		});
	</script>

</body>
</html>
