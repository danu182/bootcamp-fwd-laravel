<?php

namespace App\Http\Controllers;

use App\Http\Requests\Specialist\SpecialistStoreRequest;
use App\Http\Requests\Specialist\SpecialistUpdateRequest;
use App\Models\MasterData\Specialist;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialist=Specialist::orderBy('id','desc')->get();
        // return $specialist;
        return view('pages\backsite.master-data.specialist.index', compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialistStoreRequest $request)
    {
        $data= $request->id;

        $specialist= Specialist::create($data);

        alert()->success('Ssuccess Message', 'Successfully added new Specialist');
        return redirect()->route('backsite.specialist.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $specialist)
    {
        return $specialist;
        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialist $specialist)
    {
        return $specialist;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecialistUpdateRequest $request, Specialist $specialist)
    {
        $data= $request->all(); 
        $specialist->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialist $specialist)
    {
        //
    }
}
