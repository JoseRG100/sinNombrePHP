<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourses;
use App\Models\Enrollment;
use Psy\CodeCleaner\EmptyArrayDimFetchPass;


class CoursesController extends Controller
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

    public function index(){

        //return back()->with('flash', 'Curso bonito');
        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
            $courses = Courses::orderBy('id','desc')->paginate();
        return view('courses.index', compact('courses'));
        }
        if($user == 2){
            $enrollments = Enrollment::where('id_student', '=', Auth::user()->id)->get();


            if(sizeof($enrollments) == 0){
                $courses = Courses::orderBy('id','desc')->paginate();

                return view('courses.index', compact('courses'))->with('flash', 'Elige un curso, no estas en ningun curso');
            }else{
                return redirect()->route('asignaturas.index')->with('success', 'Ya tienes un curso asignado.');

            }
        }
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request){
        $course = new Courses();

        $request->validate([
            'name'=>'required|max:50',
            'description'=>'required|max:255',
            'date_start'=>'required',
            'date_end'=>'required',
            'active'=>'required|max:1'
        ]);

        $course ->name = $request->name;
        $course ->description = $request->description;
        $course ->date_start = $request->date_start;
        $course ->date_end = $request->date_end;
        $course ->active = $request->active;

         $course->save();




         return redirect()->route('courses.showCourses',$course);


     }

     public function show(Courses $course){

        $id = Auth::user()->id;
        $user = Auth::user()->tipo;
        if($user == 1){
            return view('courses.showCourses',['course' => $course]);
        }
        if($user == 2){
            $enrollment1 = Enrollment::create([
                'id_student' => $id,
                'id_course' => $course->id,
                'status' => '1',

            ]);
            return redirect()->route('asignaturas.index')->with('success', 'Ya tienes un curso asignado '.$course->name);
        }


    }


    public function edit(Courses $course){
        return view('courses.edit',compact('course'));
    }

    public function update(Request $request, Courses $course){


        $course ->name = $request->name;
        $course ->description = $request->description;
        $course ->date_start = $request->date_start;
        $course ->date_end = $request->date_end;
        $course ->active = $request->active;


         $course->save();

         return redirect()->route('courses.showCourses',$course);

    }

    public function destroy(Courses $course){
        $course->delete();

        return redirect()->route('courses.index');

    }

}
