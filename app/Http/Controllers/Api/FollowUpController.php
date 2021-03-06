<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FollowUp::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'mode_contact' => 'required',
            'date' => 'required',
            'answer' => 'required|min:1',
            'comment' => 'max:255'
        ]);
        $request->merge(['student_id' => $request->user()->student->id]);

        return FollowUp::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function show(FollowUp $followUp)
    {
        return $followUp;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FollowUp $followUp)
    {
        $request -> validate([
            'mode_contact' => 'required',
            'date' => 'required',
            'answer' => 'required|min:1',
            'comment' => 'max:255'
        ]);
        $request->merge(['student_id' => $request->user()->student->id]);

        return $followUp->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FollowUp  $followUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(FollowUp $followUp)
    {
        return $followUp->delete();
    }
}
