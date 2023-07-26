<?php
$id =$tipo_id= $nombre= $apellido= $telefono=$email=$genero="";

if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["tipo_id"])) $tipo_id = $dataToView["data"]["tipo_id"];
if(isset($dataToView["data"]["nombre"])) $nombre = $dataToView["data"]["nombre"];
if(isset($dataToView["data"]["apellido"])) $apellido = $dataToView["data"]["apellido"];
if(isset($dataToView["data"]["telefono"])) $telefono = $dataToView["data"]["telefono"];
if(isset($dataToView["data"]["email"])) $email = $dataToView["data"]["email"];
if(isset($dataToView["data"]["genero"])) $genero = $dataToView["data"]["genero"];



?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=paciente&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=paciente&action=save" method="POST">
		
	<div class="form-group">
			<label>ID</label>
			<input class="form-control" type="text" name="id" value="<?php echo $id; ?>" />
		</div>
	
	


		<div class="form-group">
			<label>Identificación</label>
			<input class="form-control" type="text" name="tipo_id" value="<?php echo $tipo_id; ?>" />
		</div>

		<div class="form-group">
			<label>Nombre</label>
			<input class="form-control" type="text" name="nombre" value="<?php echo $nombre; ?>" />
		</div>

		<div class="form-group">
			<label>Apellido</label>
			<input class="form-control" type="text" name="apellido" value="<?php echo $apellido; ?>" />
		</div>

		<div class="form-group">
			<label>Telefono</label>
			<input class="form-control" type="phone" name="telefono" value="<?php echo $telefono; ?>" />
		</div>

		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" />
		</div>

		<div class="form-group">
			<label>Genero</label>
			<input class="form-control" type="text" name="genero" value="<?php echo $genero; ?>" />
		</div>

		<br>

		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=paciente&action=list">Cancelar</a>
	</form>
</div>