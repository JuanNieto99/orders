<?php 	require_once '../includes.php' ; ?>
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
		  <h1 class="display-4"><?=p_5?></h1> 
		 
		  <hr class="my-4">
	 		<div class="row">
		  		<div class="col-3">
		  			<a href="city" style="text-decoration: none;color:grey;"> <p class="lead" style="text-align: center;"><?=p_1?><br> <i class="fa fa-map" style="font-size:30px ;" aria-hidden="true"></i></i></p></a>
		  		</div>
		  		<div class="col-3">
		  			<a href="customer" style="text-decoration: none;color:grey;"> <p class="lead" style="text-align: center;"><?=p_2?><br><i class="fa fa-address-book" aria-hidden="true" style="font-size: 45px;"></i></p></a>
		  		</div>
		  		<div class="col-3">
		  			<a href="product" style="text-decoration: none;color:grey;"> <p class="lead" style="text-align: center;"><?=p_3?><br><i class="fa fa-archive" aria-hidden="true" style="font-size: 45px;"></i></p></a>
		  		</div>
				<div class="col-3">
		  			<a href="orders" style="text-decoration: none;color:grey;"> <p class="lead" style="text-align: center;"><?=p_4?><br><i class="fa fa-handshake-o" aria-hidden="true" style="font-size: 45px;"></i></p></a>
		  		</div>
		  	</div>
		 
		</div>
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>