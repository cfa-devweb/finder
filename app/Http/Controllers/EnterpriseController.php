<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enterprise;

class EnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enterprises = Enterprise::all();

        return view('student.enterprise', compact('enterprises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('student.enterprise');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_company' => 'required|max:30',
            'name_contact' => 'required|max:30',
            'phone_contact' => 'required|digits:6',
            'email_contact' => 'required|email',
        ]);

        $request->merge(['student_id' => $request->user()->student->id]);

        Enterprise::create($request->all());

        return back()->with('successadd', "Entreprise créer avec succèss");
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
        $editenterprises = Enterprise::findOrFail($id);

        return view('enterprise', compact('editenterprises'));
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
            'name_company' => 'required|max:30',
            'name_contact' => 'required|max:30',
            'phone_contact' => 'required|digits:6',
            'email_contact' => 'required',
            'student_id' => 'required',
        ]);

        Enterprise::whereId($id)->update($validateData);

        return redirect('enterprises')->with('successedit', 'Entreprise modifier avec succèss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enterprise = Enterprise::findOrFail($id);
        $enterprise->delete();

        return redirect('enterprises')->with('successdelete', 'Entreprise supprimer avec succèss');
    }
}
