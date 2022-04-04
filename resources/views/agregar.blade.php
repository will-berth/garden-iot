@extends('layouts.app')
@section('contenido')

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Nueva maceta</h1>
					</div>
					<div class="row">

						<div class="col-md-12 col-xl-12">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Información para maceta</h5>
								</div>
								<div class="card-body h-100">

									<form action="{{ route('nuevaMaceta') }}" method="post">
										@csrf
										<fieldset class="form-fieldset">
											<div class="mb-3">
												<label class="form-label required">Administrador</label>
												<input name="admin" type="text" class="form-control" autocomplete="off">
											</div>
											<!-- <div class="mb-3">
												<label class="form-label required">Company</label>
												<input type="text" class="form-control" autocomplete="off">
											</div> -->
											<div class="mb-3">
												<label class="form-label required">Tipo de planta</label>
												<input name="tipo" type="text" class="form-control" autocomplete="off">
											</div>
											<div class="mb-3">
												<label class="form-label required">Limite</label>
												<input name="limite" type="number" class="form-control" autocomplete="off">
											</div>
											<div class="mb-3">
												<label class="form-label required">ID del sensor</label>
												<input name="id_sensor" type="text" class="form-control" autocomplete="off">
											</div>
											<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>
@endsection