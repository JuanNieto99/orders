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
					<h1 class="display-4"><?=p_49?></h1> 
				</div>
				<div class="col-1">
				<a class="fa fa-home" aria-hidden="true" style="font-size:40px ;cursor: pointer;" href="./" ></a>	
				</div>
				<div class="col-1">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="buttonCreate"><?=p_9?></button>
				</div>	 	
		 
			</div> 

		  	<hr class="my-4">
			 
			<table id="orders-table" class="table">
				<thead>
					<tr>
						<th scope="col"><?= p_63 ?></th>
						<th scope="col"><?= p_64 ?></th> 
						<th scope="col"><?= p_65 ?></th> 
						<th scope="col"><?= p_66 ?></th> 
						<th scope="col"><?= p_55 ?></th> 
					</tr>
				</thead>
			
			</table>
		</div>
	</div>
	<div class="modal fade" id="modalOrder" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog  modal-lg"> 
			<div class="modal-content"> 
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"><?=p_50?></h5>
			</div>
            <div class="modal-body">
                <form id="order-add" name="order-add">
                 <div class="row">
                    <div class="col-lg-4">
                        <label for="cliente"><?=p_51?></label>
                        <select name="cliente" id="cliente"  class="form-control" require>
                            <?= consultar_datos_cliente()?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="producto"><?=p_52?></label>
                        <select name="producto" id="producto"  class="form-control" require>
                            <?=consultar_datos_producto()?>
                        </select>                        
                    </div>
                    <div class="col-lg-1">
                        <br>
						
						<input type="hidden"  name="case"   value="addOrder">
                        <input type="hidden"  name="id" id="id_order">
                        <button type="submit" class="btn btn-info" id="btn_Agregar" data-dismiss="modal"><?=p_53?></button>
                    </div>
                 </div> 
                 </form>
                 <br>
                 <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th><?=p_54?></th>
                            <th><?=p_56?></th>
                            <th><?=p_55?></th>
                        </tr>
                    </thead> 
                    <tbody id="productData">
                     
                    </tbody> 
                 </table>
                 <h3>Total $<span id="price">0</span></h3>
            </div> 
			</div> 
		</div>
	</div>

	<div class="modal fade" id="modaledit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-lg"> 
			<div class="modal-content"> 
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"><?=p_71?></h5>
			</div>
            <div class="modal-body">
                <form id="order-edit" name="order-edit">
					<div class="row">
						<div class="col-lg-4">
							<label for="cliente"><?=p_51?></label>
							<select name="cliente" id="cliente_edit"  class="form-control" require>
								<?= consultar_datos_cliente()?>
							</select>
						</div>
						<div class="col-lg-4">
							<label for="producto"><?=p_52?></label>
							<select name="producto" id="producto_edit"  class="form-control" require>
								<?=consultar_datos_producto()?>
							</select>                        
						</div>
						<div class="col-lg-1">
							<br>
							
							<input type="hidden"  name="case"   value="addOrder">
							<input type="hidden"  name="id" id="id_order_edit">
							<button type="submit" class="btn btn-info" id="btn_Agregar" data-dismiss="modal"><?=p_53?></button>
						</div>
					</div> 
                 </form>
                 <br>
                 <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th><?=p_54?></th>
                            <th><?=p_56?></th>
                            <th><?=p_55?></th>
                        </tr>
                    </thead> 
                    <tbody id="productData_edit">
                     
                    </tbody> 
                 </table>
                 <h3>Total $<span id="price_edit">0</span></h3>
            </div> 
			</div> 
		</div>
		
		 
	</div>
	<!-- JavaScript Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="publico/assets/js/order.js"></script>
	<script type="text/javascript" src="publico/assets/datatables/datatables.min.js"></script>  
 	 <script src="publico/assets/js/sweetalert.min.js"></script>    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>