<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
        $resume->update($request->all());

        return redirect()->back()->with('successadd', 'Votre CV a été mise à jour.');
    }
}