@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Articole
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="">
                    <a href="/tasks/create" class="btn btn-warning">Adaugare Articol Nou</a>
                    <a class="btn btn-danger" href="{{ route('sites') }}" >Catre SITE</a>
                </div>
            </div>
            <table class="table table-bordered table-stripped table-hover">
                <tr>
                    <th width="20">Nr</th>
                    <th>Categorie</th>
                    <th>Titlu</th>
                    <th>Autor</th>
                    <th>Data</th>
                    <th>Continut/Articol</th>
                    <th width="365">Actiune</th>
                </tr>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $key => $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task->categorie }}</td>
                            <td>{{ $task->name }}</td>  <!-- titlu -->
                            <td>{{ $task->autor }}</td> <!-- autor -->
                            <td>{{ $task->data }}</td>
                            <td>{{ $task->description }}</td> <!-- continut/articol -->
                            <td>
                                <a class="btn btn-success" href="{{route('tasks.show',$task->id) }}">Vizualizare</a>
                                <a class="btn btn-primary" href="{{route('tasks.edit',$task->id) }}">Modificare</a>
                                {{ Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) }}
                                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                                <a class="btn btn-warning" href="#" onclick="event.preventDefault(); document.getElementById('approve-form-{{$task->id}}').submit();">Valideaza</a>
                                {{ Form::open(['method' => 'PUT', 'route' => ['tasks.approve', $task->id], 'id' => 'approve-form-'.$task->id, 'style'=>'display:none']) }}
                                {{ Form::submit('Approve', ['style' => 'display:none']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Nu exista Articole!</td>
                    </tr>
                @endif
            </table>
            <!-- Introduce nr pagina -->
            {{$tasks->render()}}
        </div>
    </div>
@endsection
