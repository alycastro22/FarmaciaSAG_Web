
<html lang="es">
	
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tienda en linea - DEMO</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="css/all.min.css" rel="stylesheet">
		<link href="css/estilos.css" rel="stylesheet">
	</head>
	
	<body>
		
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<a class="navbar-brand" href="index.php">Carrito</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarTop" aria-controls="navBarTop" aria-expanded="false">
						<span class="navbar-toggler-icon"></span>
					</button>
						</a>
					</div>
				</div>
			</nav>
		</header>
		
		<main>
			<div class="container">
				
				<div class="row">
					<div class="col">
					</div>
				</div>
				
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>Producto</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>Subtotal</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
																<tr>
										<td>Laptop 15.6" con Windows 10</td>
										<td>$14,399.10</td>
										<td><input type="number" id="cantidad_2" min="1" max="10" step="1" value="34" size="5" onchange="actualizaCantidad(this.value, 2)" /></td>
										
										<td>
											<div id="subtotal_2" name="subtotal[]">$489,569.40</div>
										</td>
										<td><a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="2" data-bs-toggle="modal" data-bs-target="#eliminaModal"><i class="fas fa-trash-alt"></i></a></td>
									</tr>
																
								<tr>
									<td colspan="3"></td>
									<td colspan="2">
										<p class="h3" id="total">$489,569.40</p>
									</td>
								</tr>
								
														
						</tbody>
					</table>
				</div>
				
				<!--<div class="row justify-content-end">-->
									<div class="row">
						<div class="col-md-5 offset-md-7 d-grid gap-2">
							<a href="pago.php" class="btn btn-primary btn-lg">Realizar pago</a>
						</div>
					</div>
							</div>
		</main>
		
		<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body">
						¿Desea eliminar el producto de la lista?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						<button id="btn-elimina" class="btn btn-danger" onclick="elimina()">Eliminar</button>
					</div>
				</div>
			</div>
		</div>

    </body>
</html>