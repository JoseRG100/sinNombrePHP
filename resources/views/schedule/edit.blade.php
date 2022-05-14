@extends('layouts.app')
@section('title', 'Edita una clase')

@section('template_title')
    Update Schedule
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Schedule</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('schedules.update', $schedule->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('schedule.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
