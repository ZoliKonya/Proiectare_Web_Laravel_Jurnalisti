<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request, $category = null)
    {
        // Interogare pentru modelul Task, filtrând doar task-urile aprobate
        $query = Task::where('aprobat', 1);

        // Verifică dacă a fost furnizată o categorie în URL
        if ($category) {
            // Dacă există o categorie, adaugă o condiție pentru filtrare pe acea categorie
            $query->where('categorie', $category);
        }

        // Execută interogarea și obține rezultatele sortate alfabetic și paginatează rezultatele cu 5 elemente pe pagină
        $tasks = $query->orderBy('name', 'ASC')->paginate(5);

        // Calculul valorii de început pentru numerotarea paginării
        $value = ($request->input('page', 1) - 1) * 5;

        // Returnează vizualizarea 'sites.sitelist', transmițând variabilele tasks, category și i (pentru numerotarea paginării)
        return view('sites.sitelist', compact('tasks', 'category'))->with('i', $value);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
