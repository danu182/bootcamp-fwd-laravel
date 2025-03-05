<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HospitalPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospitalPatient=User::whereHas('detail_user', function($query){
        $query->where('type_user_id', 3); // role_id = 3 for hospital patient
        })->orderBy('created_at', 'desc')->get();

        return view('pages.backsite.operational.hospital-patient.index', compact('hospitalPatient'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
