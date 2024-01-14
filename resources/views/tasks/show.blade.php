@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Vizualizare Articol
        </div>
        <div class="panel-body">
            <div class="pull-right">
                <a class="btn btn-default" href="javascript:history.back()">Inapoi</a>
            </div>
            <div class="form-group">
                <strong>Categorie: </strong> {{ $task->categorie }}
            </div>
            <div class="form-group">
                <strong>Titlu: </strong> {{ $task->name }}
            </div>
            <div class="form-group">
                <strong>Autor: </strong> {{ $task->autor }}
            </div>
            <div class="form-group">
                <strong>Data: </strong> {{ $task->data }}
            </div>
            <div class="form-group">
                <strong>Continut/Articol: </strong> {{ $task->description }}
            </div>
        </div>
    </div>
@endsection
