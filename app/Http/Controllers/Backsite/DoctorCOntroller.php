<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\DoctorStoreRequest;
use App\Http\Requests\Doctor\DoctorUpdateRequest;
use App\Models\MasterData\Specialist;
use App\Models\Operational\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class DoctorCOntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor= Doctor::with('specialist')->orderBy('created_at', 'desc')->get();
        
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
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['fee'] = str_replace(',', '', $data['fee']);
        $data['fee'] = str_replace('IDR ', '', $data['fee']);

        // upload process here
        $path = public_path('app/public/assets/file-doctor');
        if(!File::isDirectory($path)){
            $response = Storage::makeDirectory('public/assets/file-doctor');
        }

        // change file locations
        if(isset($data['photo'])){
            $data['photo'] = $request->file('photo')->store(
                'assets/file-doctor', 'public'
            );
        }else{
            $data['photo'] = "";
        }


        // return $data;

        // store to database
        $doctor = Doctor::create($data);

        alert()->success('Success Message', 'Successfully added new doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        // abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('pages.backsite.operational.doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        // abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $specialist= Specialist::orderBy('name', 'asc')->get();

        $doctor2 = Doctor::with('specialist')->where('id', $doctor->id)->first();
        // return$doctor2;


        return view('pages.backsite.operational.doctor.edit', compact('doctor2','specialist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['fee'] = str_replace(',', '', $data['fee']);
        $data['fee'] = str_replace('IDR ', '', $data['fee']);

        // upload process here
        // change format photo
        if(isset($data['photo'])){

             // first checking old photo to delete from storage
            $get_item = $doctor['photo'];

            // change file locations
            $data['photo'] = $request->file('photo')->store(
                'assets/file-doctor', 'public'
            );

            // delete old photo from storage
            $data_old = 'storage/'.$get_item;
            if (File::exists($data_old)) {
                File::delete($data_old);
            }else{
                File::delete('storage/app/public/'.$get_item);
            }

        }


        // return $data;

        $doctor->update($data);


        alert()->success('Success Massage','Successfully updated doctor');
        return redirect()->route('backsite.doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {  
        // first checking old file to delete from storage
        $get_item = $doctor['photo'];

        $data = 'storage/'.$get_item;
        if (File::exists($data)) {
            File::delete($data);
        }else{
            File::delete('storage/app/public/'.$get_item);
        }

        $doctor->forceDelete();

        alert()->success('Success Message','Successfully deleted doctor');
        return redirect()->route('backsite.doctor.index');
    }
}
