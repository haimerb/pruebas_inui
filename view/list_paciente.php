<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=paciente&action=edit" class="btn btn-outline-primary">Crear paciente</a>
		<hr/>
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $paciente){
			?>
			<div class="col-md-3">
				<div class="card-body border border-secondary rounded">
					<h5 class="card-title"><?php echo $paciente['id']; ?></h5>
					<div class="card-text"><?php echo nl2br($paciente['tipo_id']); ?></div>

					<div class="card-text"><?php echo nl2br($paciente['nombre']); ?></div>
					<div class="card-text"><?php echo nl2br($paciente['apellido']); ?></div>
					<div class="card-text"><?php echo nl2br($paciente['telefono']); ?></div>
					<div class="card-text"><?php echo nl2br($paciente['email']); ?></div>
					<div class="card-text"><?php echo nl2br($paciente['genero']); ?></div>

					
					<hr class="mt-1"/>
					<a href="index.php?controller=paciente&action=edit&id=<?php echo $paciente['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="index.php?controller=paciente&action=confirmDelete&id=<?php echo $paciente['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualmente no existen pacientes.
		</div>
		<?php
	}
	?>
</div>