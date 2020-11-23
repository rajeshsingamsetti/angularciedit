<!DOCTYPE html>
<html data-ng-app="myapp">
<head>
<meta charset="ISO-8859-1">
<title>Rajesh Singamsetti Angularjs Edit Project Developement Mode</title>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
	var app = angular.module('myapp', []);
	
		app.controller('myController',['$scope','$http', function($scope, $http) {
			$scope.name = "Java Honk";
			$scope.loading = true;
			  $http.post('http://localhost/ci/index.php/welcome/get_departlist', { foo: 'bar' }).success(function(response) {

			    $scope.services = response.tabledata; 
			});

			 $scope.editService = function(varResult){
		if($scope.selectval != '' && $scope.selectval != undefined){
			$('#formModal').modal('show'); $scope.submitBtn = true; $scope.service = $scope.selectval;
		}else{
			$scope[varResult] = "Please Select Service"; myService.resMessage($scope,$timeout,202);
		}
	}

	$scope.serviceUpdate = function(service,varResult) {
		$scope.loader = true; var config = { params: { formdata : service } };
		$http.post('http://localhost/ci/index.php/welcome/update_depart', null, config).then(function(response){ 

			if(response.errcode == 200){ 
				 $('#formModal').modal('hide'); }
				alert('updated sucessfully');
				location.reload();
				});			
    };



		}]);
</script>
</head>
<body data-ng-controller="myController">
<div class="wrapper">

<div class="content-wrapper">
	<section class="content-header">
		<h1>Raj Edit UnderDevelopement</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Rajesh Singamsetti Angularjs Edit Project Developement Mode</a></li>
			<li class="active">Edit Under Development mode</li>
		</ol>
	</section>
	
	<section class="content">
		<div class="box">
			<div class="box-body">
				<form class="form-inline">
				<div class="row" style=" margin-bottom:10px;">
					<div class="col-md-6 pull-left">
						
					</div>
					<div class="col-md-6 pull-right text-right">
						
						<div class="pull-right">
							<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button">Action  <span class="caret"></span></button>
							<ul role="menu" class="dropdown-menu">
								<li><a href="" ng-click="addService();">Add</a></li>
								<li><a href="" ng-click="editService('ajaxResult');">Edit</a></li>
								<li><a href="" ng-click="deleteService('ajaxResult');">Delete</a></li>
							</ul>
						</div>
					</div>
				</div>
				</form>
				
				<div class="col-md-12 table-responsive no-padding">
				<table class="table table-striped table-bordered table02">
					<thead>
						<th width="100px">S No.</th> 
						<th>Project Name</th>
					</thead>
					<tbody>
					<tr><td colspan="6" ng-show="services.length == ''" align="center"> No data found. </td></tr>
<!-- 					{{services}}
 -->					<tr ng-click="selectedRow($index,list);" ng-class="{activeRow : selRow == $index}" ng-repeat="list in services">
						<td>
							{{$index+1}} &nbsp;
							<input type="radio" name="selectval" id="selectval_{{$index}}" ng-model="$parent.selectval" ng-value="list" ng-click="selectedRow($index,list);">
						</td>
						<td>{{list.service_name}}</td>
					</tr>
					</tbody>
				</table>
				</div>
				<!-- <div class="col-md-12 text-right">
					<div class="col-xs-4 pull-left text-left" style="padding-top:10px;" ng-if="totalCount > pageSize"><label>Showing  {{startval}} to {{endval}} Out of {{totalCount}}</label></div>
					<dir-pagination-controls max-size="8" direction-links="true" boundary-links="true" on-page-change="pageData(newPageNumber)"> </dir-pagination-controls>
				</div> -->
			</div>
		</div>
	</section>

</div>

</div>

<!--popup-->
<div id="formModal" class="modal fade"><div class="modal-dialog">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">Add Project Name</h4>
	</div>
	<div class="modal-body">
		<form role="form" name="otherForm" class="form-horizontal">
		<div class="form-group">
			<label class="control-label col-sm-4 no-padding">Project Name</label>
			<div class="col-sm-8">
				<input type="text" class="form-control" ng-model="service.service_name"  required>
			</div>
		</div>
		</form>
	</div>
	<div class="modal-footer text-center" style="text-align:center !important;">
		<button type="submit" ng-hide="submitBtn" ng-click="serviceCreate(service,'ajaxResult');" class="btn btn-info" ng-disabled="otherForm.$invalid">Create</button>
		<button type="submit" ng-show="submitBtn" ng-click="serviceUpdate(service,'ajaxResult');" class="btn btn-info" ng-disabled="otherForm.$invalid">Update</button>
		<button type="button" data-dismiss="modal" class="btn btn-warning">Cancel</button>
	</div>
</div>
</div></div>
</form> 
</body>
</html>