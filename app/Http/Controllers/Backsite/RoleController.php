<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\RoleStoreRequest;
use App\Http\Requests\Role\RoleUpdateRequest;
use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Role $role)
    {
        $role= Role::orderBy('created_at', 'desc')->get();
        return view('pages.backsite.master-data.role.index', compact('role'));
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
    public function store(RoleStoreRequest $request, Role $role)
    {
        $data=$request->all();
        $role=Role::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $role->load('permission');

        return view('pages.backsite.master-data.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permission=Permission::all();
        $role->load('permissions');

        return view('pages.backsite.master-data.role.edit', compact('role', 'permission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permission()->sync($request->input('permission',[]));
        
        alert()->success('Success Massage', 'Successfully update role');
        return redirect()->route('backsite.role.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->forceDelete();

        alert()->success('success Massage','Successfully removed role');
        // return redirect()->route('backsite.role.index');
        return back();
    }
}
