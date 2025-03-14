<?php

namespace App\Http\Middleware;

use App\Models\ManagementAccess\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // get all user by session
        $user= Auth::user();

        // check vlaidation 
        if (!app()->runningInConsole() &&  $user) 
        {
            $roles=Role::with('permission')->get();
            $permissionArray= [];
            
            foreach ($roles as $role){
                foreach ($role->permission as $permissions){
                    $permissionArray[$permissions->title][]=$permissions->id;
                }
            }

            // check user permission
            foreach ($permissionArray as $title => $roles) {
                Gate::define($title, function(User $user)
                use ($roles) {
                    return count(array_intersect($user->role->pluck('id')
                    ->toArray(), $roles)) > 0;
                });
            }
        }

        // check user role
        if ($user && $user->role_id !== 1) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 403);
        }

        
        return $next($request);
    }
}
