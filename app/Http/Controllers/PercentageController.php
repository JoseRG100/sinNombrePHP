<?php

namespace App\Http\Controllers;

use App\Models\Percentage;
use Illuminate\Http\Request;

/**
 * Class PercentageController
 * @package App\Http\Controllers
 */
class PercentageController extends Controller
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
        $percentages = Percentage::paginate();

        return view('percentage.index', compact('percentages'))
            ->with('i', (request()->input('page', 1) - 1) * $percentages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $percentage = new Percentage();
        return view('percentage.create', compact('percentage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Percentage::$rules);

        $percentage = Percentage::create($request->all());

        return redirect()->route('percentage.index')
            ->with('success', 'Percentage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $percentage = Percentage::find($id);

        return view('percentage.show', compact('percentage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $percentage = Percentage::find($id);

        return view('percentage.edit', compact('percentage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Percentage $percentage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Percentage $percentage)
    {
        request()->validate(Percentage::$rules);

        $percentage->update($request->all());

        return redirect()->route('percentage.index')
            ->with('success', 'Percentage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $percentage = Percentage::find($id)->delete();

        return redirect()->route('percentage.index')
            ->with('success', 'Percentage deleted successfully');
    }
}
