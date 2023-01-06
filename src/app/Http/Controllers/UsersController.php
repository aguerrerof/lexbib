<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all()
            ->except(auth()->user()->id);

        return view('users.list', ['users' => $users]);
    }

    public function create()
    {
        return view('users.new');
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => Hash::make($request->getUserPassword()),
            'change_password' => true
        ]);
        return redirect()->route('users.list');
    }

    public function enable(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update([
            'deleted_at' => null
        ]);
        return redirect()->route('users.list');
    }

    public function disable(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update([
            'deleted_at' => Carbon::now()
        ]);
        return redirect()->route('users.list');
    }

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
                ['password' => Hash::make($request->getNewPassword())]
            );
        session()->flash('message', __('Contraseña actualizada con éxito'));
        return view('auth.change_password');
    }
}
