@extends('layouts.app')

@section('template_title')
    Work
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Trabajo') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('works.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
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

										<th>Id Class</th>
										<th>Id Student</th>
										<th>Name</th>
										<th>Mark</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($works as $work)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $work->id_class }}</td>
											<td>{{ $work->id_student }}</td>
											<td>{{ $work->name }}</td>
											<td>{{ $work->mark }}</td>

                                            <td>
                                                <form action="{{ route('works.destroy',$work->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('works.show',$work->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('works.edit',$work->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $works->links() !!}
            </div>
        </div>
    </div>
@endsection
