<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function newPassword()
    {
        return view('auth.change_password');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        User::find(auth()->user()->id)
            ->update(
                ['password'=> Hash::make($request->getNewPassword())]
            );
        session()->flash('message', __('Contraseña actualizada con éxito'));
        return view('auth.change_password');
    }
}
