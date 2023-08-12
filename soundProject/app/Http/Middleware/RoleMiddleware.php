<?php

// app/Http/Middleware/RoleMiddleware.php
namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = $request->session()->get('user');
        if (!$user) {
            return redirect('/'); // Redirect to the login page if the user is not logged in.
        }

        // if (in_array($user->role, $roles)) {
        // dd($user);
        //     if ($user->role === 1) {
        //         _____ php artisan make:provider CustomViewServiceProvider __________
        //         and  set   Resoure dynamicaly
        //         $request->viewLocations[] = resource_path('views/admin');
        //     } elseif ($user->role === 2) {
        //         $request->viewLocations[] = resource_path('views/user');
        //     } elseif ($user->role === 3) {
        //         $request->viewLocations[] = resource_path('views/employee');
        //     }
        //     return $next($request); // User is
        // }
        // return redirect('/RestractedArea');



        // $user = $request->session()->get('user');

        // if (!$user) {
        //     return redirect()->route('loginAccount'); // Redirect to the login page if the user is not logged in.
        // };

        $roleName = [];

        if ($user->role === 1) {
            // dd("admin"); // This will print "admin" if the user's role is 1 (admin).
            $roleName = [
                'admin' => 'admin',
            ];
        } elseif ($user->role === 2) {
            // dd("user"); // This will print "user" if the user's role is 2 (user).
            $roleName = [
                'user' => 'user',
            ];
        } elseif ($user->role === 3) {
            // dd("employee"); // This will print "employee" if the user's role is 3 (employee).
            $roleName = [
                'employee' => 'employee',
            ];
        }

        foreach ($roles as $role) {
            if (in_array($role, $roleName)) {
                $request->attributes->set('layout', $role);
                return $next($request);
            }
        }

        return redirect('/RestractedArea');
    }
}
