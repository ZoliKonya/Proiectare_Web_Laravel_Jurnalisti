<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::orderBy('name','ASC')->paginate(5);
        $value=($request->input('page',1)-1)*5;
        return view('tasks.list',compact('tasks'))->with('i',$value);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required','description' => 'required']);
        // create new task
        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Your Articol added successfully store!');
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show',compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
        Task::find($id)->update($request->all());
        return redirect()->route('tasks.index')->with('success','Articol updated successfully update');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('tasks.index')->with('success','Articol removed successfully delete');
    }

    public function approveTask($id)
    {
        // SE Obține utilizatorul autentificat
        $user = auth()->user();

        // SE Verifică dacă utilizatorul este un editor
        if ($user && $user->type_utilizator == 'editor') {
            // Găsește task-ul/articolul după ID
            $task = Task::find($id);

            // Marchează task-ul/articolul ca aprobat (actualizare de la 0 la 1)
            $task->aprobat = true;
            $task->save();

            // Redirecționează la lista de task-uri cu un mesaj de succes
            return redirect()->route('tasks.index')->with('success', 'Articol aprobat cu succes!');
        }

        // Dacă utilizatorul nu este editor, întoarce un mesaj de eroare
        return redirect()->route('tasks.index')->with('error', 'Nu aveți permisiunea de a aproba articolul!');
    }

}
