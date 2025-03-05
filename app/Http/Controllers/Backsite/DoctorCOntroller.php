<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\DoctorStoreRequest;
use App\Http\Requests\Doctor\DoctorUpdateRequest;
use App\Models\MasterData\Specialist;
use App\Models\Operational\Doctor;
use Illuminate\Http\Request;

class DoctorCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor= Doctor::orderBy('created_at', 'desc')->get();
        
        $specialist= Specialist::orderBy('name', 'asc')->get();

        return view('pages.backsite.operational.doctor.index', compact('doctor','specialist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorStoreRequest $request)
    {
        $data=$request->all();
        Doctor::create($data);

        alert()->success('Success Message','Successfully added new Doctor');
        return redirect()->route('doctor.index')->with('success', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $specialist= Specialist::orderBy('nmae', 'asc')->get();

        return view('pages.backsite.operational.doctor.edit', compact('doctor','specialist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {
        $data=$request->all();

        $doctor->update($data);

        alert()->success('Success Massage','Successfully updated doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        alert()->success('Success Message','Successfully deleted doctor');
        return redirect()->route('backsite.doctor.index');
    }
}
