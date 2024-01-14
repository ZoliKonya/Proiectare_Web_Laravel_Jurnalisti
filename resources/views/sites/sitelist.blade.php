@extends('layouts.app')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            Lista Categorii
        </div>
        <br>
        <div class="btn-group">
            <a class="btn btn-warning" href="{{ route('sites.list') }}">Toate</a>
            <a class="btn btn-primary" href="{{ route('sites.list', 'Artistic') }}">Artistic</a>
            <a class="btn btn-primary" href="{{ route('sites.list', 'Tehnic') }}">Tehnic</a>
            <a class="btn btn-primary" href="{{ route('sites.list', 'Science') }}">Science</a>
            <a class="btn btn-primary" href="{{ route('sites.list', 'Moda') }}">Moda</a>
        </div>
        <br><br>
        <div class="panel-heading">
            Lista Articole
        </div>
        <div class="panel-body">
            <div class="form-group">

            </div>
            <table class="table table-bordered table-stripped table-hover">
                <tr>
                    <th width="20">Nr</th>
                    <!--<th>Categorie</th>-->
                    <th>Titlu</th>
                    <th>Autor</th>
                    <th>Data</th>
                    <!--<th>Continut/Articol</th>-->
                    <th width="265">Actiune</th>
                </tr>
                @if (count($tasks) > 0)
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <!--<td>{{ $task->categorie }}</td></th>-->
                            <td>{{ $task->name }}</td>  <!-- titlu -->
                            <td>{{ $task->autor }}</td> <!-- autor -->
                            <td>{{ $task->data }}</td>
                            <!--<td>{{ $task->description }}</td>-->
                            <td>
                                <button class="btn btn-success" data-taskid="{{ $task->id }}" id="registerButton_{{ $task->id }}" onclick="handleButtonClick({{ $task->id }})">Vezi Tot Articolul</button>                            </td>
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
    <script>
        function handleButtonClick(taskId) {
            // Verificăm starea de autentificare
            var isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};

            if (isAuthenticated) {
                // Utilizatorul este autentificat, deschidem vizualizarea
                window.location.href = "{{ route('tasks.show', '') }}/" + taskId;
            } else {
                // Utilizatorul nu este autentificat, deschidem pagina de înregistrare
                window.open("{{ route('auth.register') }}", '');
            }
        }
        </script>

@endsection
