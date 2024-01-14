@extends('layouts.app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"> Modificare</div>
        <div class="panel-body">
            <!—exista inregistrari in tabelul task 
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Eroare:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!—populez campurile formularului cu datele aferente din tabela task -->
            {!! Form::model($task, ['method' => 'PATCH','route' => ['tasks.update', $task->id]]) !!}
            <div class="form-group">
                <label for="categorie">Categorie</label>
                <select name="categorie" class="form-control">
                    <option value="artistic" {{ old('categorie') == 'artistic' ? 'selected' : '' }}>Artistic</option>
                    <option value="tehnic" {{ old('categorie') == 'tehnic' ? 'selected' : '' }}>Tehnic</option>
                    <option value="science" {{ old('categorie') == 'science' ? 'selected' : '' }}>Science</option>
                    <option value="moda" {{ old('categorie') == 'moda' ? 'selected' : '' }}>Moda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" name="name" class="form-control"
                       value="{{old('name') }}">
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" name="autor" class="form-control"
                       value="{{old('autor') }}">
            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="text" name="data" class="form-control"
                       value="{{old('data') }}">
            </div>
            <div class="form-group">
                <label for="description">Continut/Articol</label>
                <textarea name="description" class="form-control"
                          rows="3">{{old('description') }}</textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Salvare Modificari" class="btn btn-info">
                <a href="{{route('tasks.index') }}" class="btn btn-default">Cancel</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
