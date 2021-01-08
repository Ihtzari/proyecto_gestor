<?php

session_start();
require_once "../../clases/Conexion.php";
$idUsuario= $_SESSION['idUsuario'];
$conexion= new conectar();
$conexion = $conexion->conexion();

?>

<div class="table-responsive" >
	<table class="table table-hover table-primary" id="tablaCategoriasDataTable" background="../img/fondo2.jpg">
		<thead>
			<tr >
				<th style="text-align: center; color: #FFFFFF ">Nombre</th>
				<th style="text-align: center; color: #FFFFFF ">Fecha</th>
				<th style="text-align: center; color: #FFFFFF ">Editar</th>
				<th style="text-align: center; color: #FFFFFF ">Eliminar</th>	
			</tr>
		</thead>
		<tbody>

			<?php
				$sql = "SELECT id_categoria,
							nombre,
							fechaInsert
						FROM t_categorias 
						WHERE id_usuario = '$idUsuario'";
				$result = mysqli_query($conexion,$sql);

				while($mostrar = mysqli_fetch_array($result)){
					$idCategoria=$mostrar['id_categoria'];
			?>
				<tr>
					<td align="center"><font color= FFFFFF ><?php echo $mostrar['nombre'];  ?></td>
					<td align="center"><font color= FFFFFF ><?php echo $mostrar['fechaInsert']; ?></td>
					<td style="text-align: center; color: #FFFFFF">
						<span class="btn btn-warning btn-sm" 
								onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" 
								data-toggle="modal" data-target="#modalActualizarCategoria">
							<span class="fas fa-edit"></span>
						</span>
					</td>
					<td style="text-align: center; color: #FFFFFF">
						<span class="btn btn-danger btn-sm" 
								onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
							<span class="fas fa-trash-alt"></span>
						</span>
					</td>
				</tr>
			<?php 
				}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaCategoriasDataTable').DataTable();
	});
</script>