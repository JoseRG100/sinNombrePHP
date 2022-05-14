@extends('layouts.app')
@section('title', 'Listado de asignaturas')

@section('template_title')
    Asignatura
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Asignatura') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('asignaturas.create') }}" class="btn btn-success float-right"  data-placement="left">
                                  {{ __('Crear Asignatura') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Id Teacher</th>
										<th>Id Course</th>
										<th>Id Shedule</th>
										<th>Name</th>
										<th>Color</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignaturas as $asignatura)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $asignatura->id_teacher }}</td>
											<td>{{ $asignatura->id_course }}</td>
											<td>{{ $asignatura->id_schedule }}</td>
											<td>{{ $asignatura->name }}</td>
											<td>{{ $asignatura->color }}</td>

                                            <td>
                                                <form action="{{ route('asignaturas.destroy',$asignatura->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('asignaturas.show',$asignatura->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('asignaturas.edit',$asignatura->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $asignaturas->links() !!}
            </div>
        </div>
    </div>
@endsection
