<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialist\SpecialistStoreRequest;
use App\Http\Requests\Specialist\SpecialistUpdateRequest;
use App\Models\MasterData\Specialist;
use Illuminate\Http\Request;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialist=Specialist::orderBy('id','desc')->get();
        
        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
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
    public function store(SpecialistStoreRequest $request, Specialist $specialist)
    {
        $data = $request->all();

         // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        // wtore data
        $specialist= Specialist::create($data);

        alert()->success('Success Message', 'Successfully added new Specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialist $specialist)
    {
        // return $specialist;
        return view('pages.backsite.master-data.specialist.show', compact('specialist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialist $specialist)
    {
        return view('pages.backsite.master-data.specialist.edit', compact('specialist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecialistUpdateRequest $request, Specialist $specialist)
    {
        $data= $request->all(); 

        // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        $specialist->update($data);

        // return $specialist;

        alert()->success('Success Message', 'Successfully update Specialist');
        return redirect()->route('backsite.specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialist $specialist)
    {
        $specialist->delete();

        alert()->success('Success Message', 'Successfully deleted specialist');

        return back();
    }
}
