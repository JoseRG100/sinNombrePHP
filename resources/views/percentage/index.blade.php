@extends('layouts.app')

@section('template_title')
    Percentage
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Porcentaje') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('percentage.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
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

										<th>Id Course</th>
										<th>Id Class</th>
										<th>Continuous Assessment</th>
										<th>Exams</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($percentages as $percentage)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $percentage->id_course }}</td>
											<td>{{ $percentage->id_class }}</td>
											<td>{{ $percentage->continuous_assessment }}</td>
											<td>{{ $percentage->exams }}</td>

                                            <td>
                                                <form action="{{ route('percentage.destroy',$percentage->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('percentage.show',$percentage->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('percentage.edit',$percentage->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $percentages->links() !!}
            </div>
        </div>
    </div>
@endsection
