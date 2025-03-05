<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigPayment\ConfigPaymentUpdateRequest;
use App\Models\MasterData\ConfigPayment;
use Illuminate\Http\Request;

class ConfigPaymentController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $config_payments = ConfigPayment::all();

        return view('pages.backsite.config_payment.index', compact('config_payments'));
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
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConfigPayment $config_payment)
    {
        return view('pages.backsite.config_payment.edit', compact('config_payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConfigPaymentUpdateRequest $request, ConfigPayment $config_payment)
    {
        $data= $request->all();

        $config_payment->update($data);

        alert()->success('Success Message',"Successfully updated config Payment");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return abort(404);
    }
}
