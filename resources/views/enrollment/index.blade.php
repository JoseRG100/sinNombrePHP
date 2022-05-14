@extends('layouts.app')

@section('template_title')
    Enrollment
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Enrollment (Inscripción)') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('enrollment.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nueva') }}
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

										<th>Id Student</th>
										<th>Id Course</th>
										<th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($enrollments as $enrollment)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $enrollment->id_student }}</td>
											<td>{{ $enrollment->id_course }}</td>
											<td>{{ $enrollment->status }}</td>

                                            <td>
                                                <form action="{{ route('enrollment.destroy',$enrollment->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('enrollment.show',$enrollment->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('enrollment.edit',$enrollment->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $enrollments->links() !!}
            </div>
        </div>
    </div>
@endsection
