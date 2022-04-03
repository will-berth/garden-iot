@extends('layouts.app')
@section('styles-perfil')
<link href="{{ asset('pages/perfil.css') }}" rel="stylesheet">
@endsection
@section('contenido')

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle">Perfil</h1>
					</div>
					<div class="row">
						<div class="col-md-4 col-xl-3">
							<div class="card mb-3">
								<div class="card-header">
									<h5 class="card-title mb-0">Foto de perfil</h5>
								</div>
								<div class="card-body text-center">
									<div class="img-fluid rounded-circle mb-2 photoProfile d-flex align-items-center justify-content-center">
										<div class="img-fluid rounded-circle photoProfileOverlay d-flex align-items-center justify-content-center">
											<a href="#" class="btn btn-editPhoto" data-bs-toggle="modal" data-bs-target="#modal-small"><i class="align-middle iconEditPhoto" data-feather="edit"></i></a>
										</div>
										@if ($dataProfile['photo'] == '')
											<img src="{{ asset('profile-photos/default.png') }}" alt="Christina Mason" class="img-fluid rounded-circle" width="128" height="128" />
										@else
											
											<img src="{{ asset('profile-photos/'.$dataProfile['photo']) }}" alt="Christina Mason" class="img-fluid rounded-circle" width="128" height="128" />

											
										@endif
									</div>
									<h5 class="card-title mb-0">{{$dataProfile['name']}}</h5>
									<div>
										<a class="btn btn-primary btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#modal-small"><span data-feather="edit"></span> Editar Foto</a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-8 col-xl-9">
							<div class="card">
								<div class="card-header">

									<h5 class="card-title mb-0">Información de cuenta</h5>
								</div>
								<div class="card-body h-100">

									<form action="{{ route('updateUser') }}" method="post">
										@csrf
										<fieldset class="form-fieldset">
											<div class="mb-3">
												<label class="form-label required">Nombre</label>
												<input name="name" type="text" class="form-control" autocomplete="off" value="{{$dataProfile['name']}}">
											</div>
											<!-- <div class="mb-3">
												<label class="form-label required">Company</label>
												<input type="text" class="form-control" autocomplete="off">
											</div> -->
											<div class="mb-3">
												<label class="form-label required">Email</label>
												<input name="email" type="email" class="form-control" autocomplete="off" value="{{$dataProfile['email']}}">
											</div>
											<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
					</div>

	<div class="modal modal-blur fade" id="modal-small" tabindex="-1" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
			<form action="{{ route('updatePhoto') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-content">
					<div class="modal-body">
						<div class="modal-title">Cambiar foto de perfil</div>
						<div class="row">
							<div class="col">
								<div class="mb-3">
									<div class="form-label require">Archivo</div>
									<input type="file" class="form-control" name="photo">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancelar</button>
						<button type="submit" class="btn btn-success" data-bs-dismiss="modal">Guardar</button>
					</div>
				</div>
			</form>
		</div>
    </div>
@endsection