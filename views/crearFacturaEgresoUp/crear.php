<button class="btn btn-primary" name="button" id="iniciarProceso">Presione click para el Iniciar Proceso de creacion de Facturas de para egresos de la empresa</button>

<div style="display:none;" id="contenedor">

		<div class="row">
				<div class="col-lg-4">
					Nombre<input class="form-control" type="text" value="" placeholder="Nombre" id="cNombre">
				</div>
				<div class="col-lg-4">
					Valor<input class="form-control" type="text" value="" placeholder="Valor" id="cValor">
				</div>
				<div class="col-lg-4">
					Cantidad<input class="form-control" type="text" value="" placeholder="Cantidad"	id="cCantidad">
				</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				Descripcion<input class="form-control" type="text" value="" placeholder="Descripcion" id="cDescripcion">
			</div>
		</div><br>
		<button class="btn btn-primary" name="button" id="guardarDatos">Agregar +</button>

	<input type="hidden" id="ultimaFactEgresoCreada">
	<div id="contenido_egresoUp"></div>
	<div id="contenido_egresoUpTotal"></div>
	<button class="btn btn-primary" name="button" id="terminarProcesoEgresoUp">Terminar Proceso >></button>
</div>
