<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Enrollment;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
/**
 * Class AsignaturaController
 * @package App\Http\Controllers
 */
class AsignaturaController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
            $asignaturas = Asignatura::paginate();
            return view('asignatura.index', compact('asignaturas'))
            ->with('i', (request()->input('page', 1) - 1) * $asignaturas->perPage());
        }
        if($user == 3){
            //los profesores ven solo sus asingnaturas
            $asignaturas = Asignatura::where('id_teacher','=',$id)->paginate();
            return view('asignatura.index', compact('asignaturas'))
            ->with('i', (request()->input('page', 1) - 1) * $asignaturas->perPage());


         }if($user == 2){
        //                     select asignaturas.*
        //                     from asignaturas, enrollments
        //                     where  asignaturas.id_course = enrollments.id_course and enrollments.id_student = 2;
            $asignaturas = DB::table('asignaturas')
                                ->join('enrollments', 'asignaturas.id_course', '=', 'enrollments.id_course')
                                ->where('enrollments.id_student','=',Auth::user()->id)
                                ->select('asignaturas.*')
                                ->paginate();

            return view('asignatura.index', compact('asignaturas'))
            ->with('i', (request()->input('page', 1) - 1) * $asignaturas->perPage());


        }



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
            $asignatura = new Asignatura();
        return view('asignatura.create', compact('asignatura'));
        }if($user == 3){
            $asignatura = new Asignatura();
            return view('asignatura.create', compact('asignatura'));
        }
        if($user == 2){
            return redirect()->route('asignaturas.index')
            ->with('success', 'No puedes crear asignaturas.');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asignatura::$rules);
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
        $asignatura = Asignatura::create($request->all());

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura created successfully.');
        }if($user == 3){
            $asignatura = Asignatura::create($request->all());

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura created successfully.');
        }if($user == 2){
            return redirect()->route('asignaturas.index')
            ->with('success', 'No puedes crear asignaturas.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idu = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
        $asignatura = Asignatura::find($id);

        return view('asignatura.show', compact('asignatura'));
        }if($user == 3){
            $asignatura = Asignatura::find($id);

            return view('asignatura.show', compact('asignatura'));
        }
        if($user == 2){
              $asignatura = Asignatura::find($id);
             //$exams = Exam::where('id_class', '=', $id);
            $exam = DB::table('exams')
                    ->where('exams.id_student', '=', Auth::user()->id)
                    ->where('exams.id_class','=', $id)
                    ->select('exams.name', 'exams.mark')
                    ->first();
            //  $asignatura = DB::table('asignaturas')
            //             ->join('exams', 'asignaturas.id', '=', 'exams.id_class')
            //             ->where('asignaturas.id','=',$id)
            //             ->where('exams.id_student','=',Auth::user()->id)
            //             ->select('asignaturas.*', 'exams.mark')
            //             ->paginate();

            return view('asignatura.showUser', compact('asignatura'), ['exam' => $exam]);
            //return  $asignatura;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 2){
        return redirect()->route('asignaturas.index')
        ->with('success', 'No puedes editar las asignaturas.');

    }else{
        $asignatura = Asignatura::find($id);

        return view('asignatura.edit', compact('asignatura'));
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asignatura $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        request()->validate(Asignatura::$rules);

        $asignatura->update($request->all());

        return redirect()->route('asignaturas.index')
            ->with('success', 'Asignatura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 2){
        return redirect()->route('asignaturas.index')
        ->with('success', 'No puedes editar las asignaturas.');

    }else{
        $asignatura = Asignatura::find($id)->delete();

        return redirect()->route('asignaturas.index')
            ->with('success', 'No puedes eliminar asignaturas');
    }
    }
}
