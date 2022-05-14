<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

/**
 * Class EnrollmentController
 * @package App\Http\Controllers
 */
class EnrollmentController extends Controller
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
        $enrollments = Enrollment::paginate();

        return view('enrollment.index', compact('enrollments'))
            ->with('i', (request()->input('page', 1) - 1) * $enrollments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enrollment = new Enrollment();
        return view('enrollment.create', compact('enrollment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Enrollment::$rules);

        $enrollment = Enrollment::create($request->all());

        return redirect()->route('enrollment.index')
            ->with('success', 'Enrollment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enrollment = Enrollment::find($id);

        return view('enrollment.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enrollment = Enrollment::find($id);

        return view('enrollment.edit', compact('enrollment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Enrollment $enrollment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        request()->validate(Enrollment::$rules);

        $enrollment->update($request->all());

        return redirect()->route('enrollment.index')
            ->with('success', 'Enrollment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $enrollment = Enrollment::find($id)->delete();

        return redirect()->route('enrollment.index')
            ->with('success', 'Enrollment deleted successfully');
    }
}
