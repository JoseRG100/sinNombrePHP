<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class WorkController
 * @package App\Http\Controllers
 */
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
        $works = Work::paginate();

        return view('work.index', compact('works'))
            ->with('i', (request()->input('page', 1) - 1) * $works->perPage());
        }
        if($user == 3){
            $works = DB::table('works')
            ->join('asignaturas', function($join)
            {
                   $join->on('works.id_class', '=', 'asignaturas.id')
                        ->where('asignaturas.id_teacher', '=', Auth::user()->id);
               })
               ->paginate();
               return view('work.index', compact('works'))
            ->with('i', (request()->input('page', 1) - 1) * $works->perPage());

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $work = new Work();
        return view('work.create', compact('work'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Work::$rules);

        $work = Work::create($request->all());

        return redirect()->route('works.index')
            ->with('success', 'Work created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $work = Work::find($id);

        return view('work.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = Work::find($id);

        return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Work $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        request()->validate(Work::$rules);

        $work->update($request->all());

        return redirect()->route('works.index')
            ->with('success', 'Work updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $work = Work::find($id)->delete();

        return redirect()->route('works.index')
            ->with('success', 'Work deleted successfully');
    }
}
