<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FilterUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index(FilterUserRequest $request)
    {
        $users = User::filter($request)->paginate(10);

        return(view('admin.users.index', compact('users')));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'));
    }
}
