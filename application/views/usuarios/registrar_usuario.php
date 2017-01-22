<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo?></title>
	<meta charset="utf-8">      <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="/extra/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/extra/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/extra/css/jquery.dataTables.min.css">    
    <script src="/extra/js/jquery-1.11.3.min.js"></script>
    <script src="/extra/bootstrap/js/bootstrap.min.js"></script>
    <script src="/extra/js/validator.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<?php echo form_open('usuarios/registrar_usuario', array(
						'class'=>'form-horizontal',
						'data-toggle' => 'validator',
						'id' => 'fm_usuarios',
						'name' => 'fm_usuarios',
						'role' => 'form'
					));
				?>
				<fieldset>
					<br>
					<div id="legend" align="center"><legend class="text-danger"><b><?php echo $titulo?></b></legend></div>
					<div class="form-group">	
						<label for="email" class="text-info">Email:</label>
						<div class="controls">
						<?php							
							echo form_input($email);		
						?>						
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="password" class="text-info">Password:</label>
						<div class="controls">
						<?php							
							echo form_password($password);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="confirmar_password" class="text-info">Confirmar Password:</label>
						<div class="controls">
						<?php
							echo form_password($confirmar_password);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="cumpleanos" class="text-info">Cumpleaños:</label>
						<div class="controls">
						<?php
							echo form_input($cumpleanos);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="nombre" class="text-info">Nombre:</label>
						<div class="controls">
						<?php
							echo form_input($nombre);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="apellidos" class="text-info">Apellidos:</label>
						<div class="controls">
						<?php
							echo form_input($apellidos);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="telefono" class="text-info">Teléfono:</label>
						<div class="controls">
						<?php
							echo form_input($telefono);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">	
						<label for="fotografia" class="text-info">Fotografía:</label>
						<div class="controls">
						<?php
							echo form_input($fotografia);		
						?>
						<div class="help-block with-errors"></div>
						</div>
					</div>

					<div class="form-group">
						<div class="controls">
							<button class="btn btn-success">Registrar</button>
						</div>
					</div>
				</fieldset>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</body>
</html>