<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\ManagementAccess\Permission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
// use App\Http\Middleware\AuthGates;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Permission $permission)
    {


        $permission =Permission::all();
        // return $permission;
        // abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        // $permission=Permission::orderBy('id','asc')->get();
        
        // return view('pages.backsite.management-access.permission.index', compact('permission'));
        // dd($permission);

        // if (Gate::allows('permission_access')) {
            return view('pages.backsite.management-access.permission.index', compact('permission'));
        // }

        // Pengguna tidak diizinkan
        // abort(Response::HTTP_FORBIDDEN, '403 Forbidden');

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
    public function store(Request $request, Permission $permission)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        return abort(404);
    }
}
