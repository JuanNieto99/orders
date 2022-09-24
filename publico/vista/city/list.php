<?php 	require_once '../../includes.php' ; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="publico/assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron">
			<div class="row">
				<div class="col-10">
					<h1 class="display-4"><?=p_6?></h1> 
				</div>
				<div class="col-1">
				<a class="fa fa-home" aria-hidden="true" style="font-size:40px ;cursor: pointer;" href="./" ></a>	
				</div>
				<div class="col-1">
				
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonCreate"><?=p_9?></button>
				</div>	 		  
			</div> 
		  	<hr class="my-4">
			 
			<table id="city-table" class="table">
				<thead>
					<tr>
						<th scope="col"><?= p_7 ?></th>
						<th scope="col"><?= p_8 ?></th> 
					</tr>
				</thead>
			
			</table>
		</div>
	</div>
	<div class="modal fade" id="modalsaveCity" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="form-city" name="form-city">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel"><?=p_10?></h5>
		 
			</div>
			<div class="modal-body">
				<label for="name"><?=p_11?></label>
		 		<input type="text" name="name" id="name" class="form-control" required>
			</div>
			<div class="modal-footer">
				<input type="hidden" value="register_city" name="case">
			 
				<button type="submit" class="btn btn-primary"><?=p_12?></button>
			</div>
			</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modaledit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="form-city-edit" name="form-city-edit">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel"><?=p_17?></h5>
		 
			</div>
			<div class="modal-body">
				<label for="name"><?=p_11?></label>
		 		<input type="text" name="name" id="name_edit" class="form-control" required>
			</div>
			<div class="modal-footer">
				<input type="hidden" value="modify_city" name="case">
				<input type="hidden" value="" name="id" id="id_edit">
			 
				<button type="submit" class="btn btn-primary"><?=p_12?></button>
			</div>
			</div>
			</form>
		</div>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="publico/assets/js/city.js"></script>
	<script type="text/javascript" src="publico/assets/datatables/datatables.min.js"></script>  
 	 <script src="publico/assets/js/sweetalert.min.js"></script>    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>