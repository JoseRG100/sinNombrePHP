<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class ExamController
 * @package App\Http\Controllers
 */
class ExamController extends Controller
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
        if ($user == 1) {
            $exams = Exam::paginate();

            return view('exam.index', compact('exams'))
                ->with('i', (request()->input('page', 1) - 1) * $exams->perPage());
        }
        if ($user == 3) {
            // SELECT exams.*
            // FROM exams, asignaturas
            // where asignaturas.id = exams.id_class and asignaturas.id_teacher = '1';

            $exams = DB::table('exams')
                ->join('asignaturas', function ($join) {
                    $join->on('exams.id_class', '=', 'asignaturas.id')
                        ->where('asignaturas.id_teacher', '=', Auth::user()->id);
                })
                ->paginate();
            return view('exam.index', compact('exams'))
                ->with('i', (request()->input('page', 1) - 1) * $exams->perPage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exam = new Exam();
        return view('exam.create', compact('exam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Exam::$rules);

        $exam = Exam::create($request->all());

        return redirect()->route('exams.index')
            ->with('success', 'Exam created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exam = Exam::find($id);

        return view('exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);

        return view('exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Exam $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        request()->validate(Exam::$rules);

        $exam->update($request->all());

        return redirect()->route('exams.index')
            ->with('success', 'Exam updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $exam = Exam::find($id)->delete();

        return redirect()->route('exams.index')
            ->with('success', 'Exam deleted successfully');
    }
}
