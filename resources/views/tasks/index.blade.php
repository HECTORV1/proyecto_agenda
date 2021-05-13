@extends('layouts.master')

@section('content')
<br>
<br>
<br>
<br>
<div class="container-fluid mb-4">
	<div class="row align-items-center">
		<div class="col-md-8">
			<div class="title-page px-4 py-5">
				<h3 class="display-1"> Revisa los cumpleaños</h3>
				<!--<p class="lead">Revisa los proximos cumpleaños</p>-->
			</div>
		</div>
		<div class="col-md-4">
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTarea">
			  Agregar cumpleaños
			</button>
		</div>
	</div>
</div>

<div class="modal fade" id="modalTarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar cumpleaños</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>

			<form method="POST" action="{{ route('tareas.store') }}">
				<div class="modal-body">
					<!-- Nuestro campo de protección de formulario -->
					{{ csrf_field() }}

					<!-- Campos de formulario -->
					<div class="form-group mb-3">
						<label>Nombre</label>
						<input class="form-control" type="text" name="name">
					</div>


					{{-- 
					@php
						$proyectos = \App\Models\Project::all();
					@endphp
					--}}
					
				
					<div class="form-group mb-3">
						<label>Fecha</label><br>
						<input class="form-control" type="date" name="due_date">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>	
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<h5 class="card-header">Listado de Cumpleaños</h5>
				<div class="card-body">
					<h5 class="card-title">Cumpleaños</h5>
					<p class="card-text">Este es tu listado principal de cumpleaños.</p>

					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Fecha</th>
					     
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($tareas as $tarea)
					    <tr>
					      <th scope="row">{{ $tarea->id }}</th>
					      
					      <td>{{ $tarea->name }}</td>
					      <td>{{ $tarea->description }}</td>
					      <td>
					      	<span class="badge bg-primary">{{ $tarea->modality }}</span>
					      </td>
					      <td>{{ $tarea->due_date }}</td>
					      
					      	<a href="{{ route('tareas.show', $tarea->id) }}" class="btn btn-sm btn-primary">Ver</a>
					      	<a href="javascript:void(0)" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#editarTarea_{{ $tarea->id }}">
							  Editar
							</a>
							<form method="POST" action="{{ route('tareas.destroy', $tarea->id) }}">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button class="btn btn-sm btn-danger" type="submit">Borrar</button>
							</form>
					      </td>
					    </tr>

					    <div class="modal fade" id="editarTarea_{{ $tarea->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					    	<div class="modal-dialog">
					    		<div class="modal-content">
					    			<div class="modal-header">
					    				<h5 class="modal-title" id="exampleModalLabel">Editar</h5>
					    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					    			</div>
					    			<form method="POST" action="{{ route('tareas.update', $tarea->id) }}">
						    			<div class="modal-body">
						    				<!-- Nuestro campo de protección de formulario -->
											{{ csrf_field() }}
											{{ method_field('PUT') }}
											<input type="hidden" name="origen" value="index">

											<!-- Campos de formulario -->
											<div class="form-group mb-3">
												<label>Nombre</label><br>
												<input class="form-control" type="text" name="name" value="{{ $tarea->name }}">
											</div>
										
											
											<div class="form-group mb-3">
												<label>Fecha</label><br>
												<input class="form-control" type="date" name="due_date" value="{{ $tarea->due_date }}">
											</div>
						    			</div>
						    			<div class="modal-footer">
						    				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						    				<button type="submit" class="btn btn-primary">Guardar Cambios</button>
						    			</div>
						    		</form>
					    		</div>
					    	</div>
					    </div>
					    @endforeach
					  </tbody>
					</table>

					{{ $tareas->links() }}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
