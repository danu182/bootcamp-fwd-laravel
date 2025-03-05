<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Consultation\ConsultationStoreRequest;
use App\Http\Requests\Consultation\ConsultationUpdateRequest;
use App\Models\MasterData\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultation=Consultation::orderBy('created_at', 'DESC')->get();
        return view('pages.backsite.consultation.index', compact('consultation'));
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
    public function store(ConsultationStoreRequest $request, Consultation $consultation)
    {
        $data= $request->all();

        $consultation=Consultation::create($data);;

        alert()->success('Success message', 'successfully added new consultation');
        return redirect()->route('backsite.consultation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        return view('pages.backsite.master-data.consultation.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        return view('pages.backsite.master-data.consultation.EDIT', compact('consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationUpdateRequest $request, Consultation $consultation)
    {
        $data = $request->all();
        $consultation->update($data);
        alert()->success('Success message', 'Successfully updated consultation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        $consultation->delete();
        alert()->success('Success message', 'Successfully deleted consultation');
        return redirect()->route('backsite.consultation.index');
    }
}
