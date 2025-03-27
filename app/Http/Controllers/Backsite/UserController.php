<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserUpdateRequest;
use App\Models\ManagementAccess\DetailUser;
use App\Models\ManagementAccess\Role;
use App\Models\MasterData\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 


        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::orderBy('created_at', 'desc')->get();
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        $roles = Role::all()->pluck('title', 'id');     


        // return $roles;


        return view('pages.backsite.management-access.user.index', compact('user', 'roles', 'type_user'));

        // return view('pages.backsite.management-access.user.index',compact('user'));
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
        // get all request from frontsite
        $data = $request->all();

        // hash password
        $data['password'] = Hash::make($data['email']);

        // store to database
        $user = User::create($data);

        // sync role by users select
        $user->role()->sync($request->input('role', []));

        // save to detail user , to set type user
        $detail_user = new DetailUser;
        $detail_user->user_id = $user['id'];
        $detail_user->type_user_id = $request['type_user_id'];
        $detail_user->save();

        alert()->success('Success Message', 'Successfully added new user');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
          $user->load('role');

        return view('pages.backsite.management-access.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
          $role = Role::all()->pluck('title', 'id');
        $type_user = TypeUser::orderBy('name', 'asc')->get();
        $user->load('role');

        return view('pages.backsite.management-access.user.edit', compact('user', 'role', 'type_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
         // get all request from frontsite
        $data = $request->all();

        // update to database
        $user->update($data);

        // update roles
        $user->role()->sync($request->input('role', []));

        // save to detail user , to set type user
        $detail_user = DetailUser::find($user['id']);
        $detail_user->type_user_id = $request['type_user_id'];
        $detail_user->save();

        alert()->success('Success Message', 'Successfully updated user');
        return redirect()->route('backsite.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
