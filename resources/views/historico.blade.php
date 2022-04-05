@extends('layouts.app')
@section('contenido')
<div class="mb-3">
	<h1 class="h3 d-inline align-middle">Historico</h1>
</div>
<div class="row">
    <div class="col">
        <table id="readHumedad" class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>
</div>

@endsection