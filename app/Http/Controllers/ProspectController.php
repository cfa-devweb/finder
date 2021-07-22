<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prospects = Prospect::all();

        return view('student.prospect', compact('prospects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('student.prospect');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'company_name' => 'required|max:30',
            'phone_contact' => 'required|digits:6',
            'email_contact' => 'required|email|unique:prospects,email_contact',
            'date' => 'required|date',
            'student_id' => 'required',
        ]);

        $prospect = Prospect::create($validateData);

        return back()->with('success', 'Entreprise créer avec succèss');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prospect = Prospect::findOrFail($id);

        return view('prospect', compact('prospect'));
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
        $validateData = $request->validate([
            'company_name' => 'required|max:30',
            'phone_contact' => 'required|digits:6',
            'email_contact' => 'required|email|unique:prospects,email_contact',
            'date' => 'required|date',
            'student_id' => 'required',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prospect = Prospect::findOrFail($id);
        $prospect->delete();

        return redirect('prospect')->with('success', 'Entreprise supprimer avec succèss');
    }
}
