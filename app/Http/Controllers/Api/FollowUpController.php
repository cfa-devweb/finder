<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FollowUp;
use Illuminate\Http\Request;

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
            'answer' => 'required|max:150',
            'comment' => 'required|max:255'
        ]);

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
            'answer' => 'required|max:150',
            'comment' => 'required|max:255'
        ]);

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
