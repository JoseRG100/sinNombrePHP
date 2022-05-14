<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class ScheduleController
 * @package App\Http\Controllers
 */

 //id_class es id de asignatura
class ScheduleController extends Controller
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
            $schedules = Schedule::paginate();

            return view('schedule.index', compact('schedules'))
           ->with('i', (request()->input('page', 1) - 1) * $schedules->perPage());
        }if($user == 3){


            // $schedules= DB::SELECT('SELECT  schedules.* from schedules, asignaturas where asignaturas.id = schedules.id_class and asignaturas.id_teacher = $id ;');
            $schedules = DB::table('schedules')
                 ->join('asignaturas', function($join)
                 {
                        $join->on('schedules.id_class', '=', 'asignaturas.id')
                             ->where('asignaturas.id_teacher', '=', Auth::user()->id);
                    })
                    ->paginate();

                    return view('schedule.index', compact('schedules'))
                    ->with('i', (request()->input('page', 1) - 1) * $schedules->perPage());
        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schedule = new Schedule();
        return view('schedule.create', compact('schedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Schedule::$rules);

        $schedule = Schedule::create($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);

        return view('schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::find($id);

        return view('schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Schedule $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        request()->validate(Schedule::$rules);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id)->delete();

        return redirect()->route('schedules.index')
            ->with('success', 'Schedule deleted successfully');
    }
}
