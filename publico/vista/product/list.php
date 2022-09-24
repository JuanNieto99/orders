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
					<h1 class="display-4"><?=p_33?></h1> 
				</div>
				<div class="col-1">
				<a class="fa fa-home" aria-hidden="true" style="font-size:40px ;cursor: pointer;" href="./" ></a>	
				</div>
				<div class="col-1">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonCreate"><?=p_9?></button>
				</div>	 	
		 
			</div>
		

		  	<hr class="my-4">
			 
			<table id="product-table" class="table">
				<thead>
					<tr>
						<th scope="col"><?= p_34 ?></th>
						<th scope="col"><?= p_35 ?></th> 
						<th scope="col"><?= p_36 ?></th> 			  
						<th scope="col"><?= p_8 ?></th> 
					</tr>
				</thead>
			
			</table>
		</div>
	</div>
	<div class="modal fade" id="modalsaveProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<form id="form-product" name="form-product">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel"><?=p_37?></h5>			
				</div>
				<div class="modal-body">
					<label for="price"><?=p_39?></label>
					<input type="number" name="price" id="price" class="form-control" required>
				</div>
				<div class="modal-body">
					<label for="cantidad"><?=p_40?></label>
					<input type="number" name="cantidad" id="cantidad" class="form-control" required>
				</div>
				<div class="modal-body">
					<label for="description"><?=p_41?></label>
					 <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
				</div>

				<div class="modal-footer">
					<input type="hidden" value="register_product" name="case"> 
					<button type="submit" class="btn btn-primary"><?=p_12?></button>
				</div>
			</div>
			</form>
		</div>
	</div>

	<div class="modal fade" id="modaledit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<form id="form-product-edit" name="form-product-edit">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel"><?=p_44?></h5>			
				</div>
				<div class="modal-body">
					<label for="price"><?=p_39?></label>
					<input type="number" name="price" id="price_edit" class="form-control" required>
				</div>
				<div class="modal-body">
					<label for="cantidad"><?=p_40?></label>
					<input type="number" name="cantidad" id="cantidad_edit" class="form-control" required>
				</div>
				<div class="modal-body">
					<label for="description"><?=p_41?></label>
					 <textarea name="description" id="description_edit" cols="30" rows="10" class="form-control" required></textarea>
				</div>

				<div class="modal-footer">
					<input type="hidden"  name="id" id="id_edit">
					<input type="hidden" value="modify_product" name="case"> 
					<button type="submit" class="btn btn-primary"><?=p_12?></button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="publico/assets/js/product.js"></script>
	<script type="text/javascript" src="publico/assets/datatables/datatables.min.js"></script>  
 	 <script src="publico/assets/js/sweetalert.min.js"></script>    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>