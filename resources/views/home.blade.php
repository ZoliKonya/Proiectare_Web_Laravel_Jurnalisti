@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><b>ALEGE UN MODUL</b></h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @if(auth()->user()->type_utilizator == 'jurnalist' || auth()->user()->type_utilizator == 'editor')
                                <div class="col-md-6 text-center mb-3">
                                    <a class="btn btn-warning btn-lg btn-block" href="{{ route('tasks.index') }}" >
                                        <i class="fas fa-tasks"></i> Către CRUD
                                    </a>
                                    <p>Administrează articolele jurnaliștilor.</p>
                                </div>
                            @endif

                            <div class="col-md-6 text-center mb-3">
                                <a class="btn btn-primary btn-lg btn-block" href="{{ route('sites') }}" >
                                    <i class="fas fa-globe"></i> Către SITE
                                </a>
                                <p>Vizualizează site-ul cu articolele aprobate.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

