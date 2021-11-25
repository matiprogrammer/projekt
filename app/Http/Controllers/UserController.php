<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    public function index()
    {
        $users = User::all();

        return view('users/index', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        User::where('id', '=', $id)->update([
            'surname' => $request->input('surname'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'login' => $request->input('login')

        ]);
        return redirect('/users');
    }

    public function showResetForm($errors = null)
    {
        if ($errors != null) {
            return view('users.resetPassword')->with('errors', $errors);
        }
        return view('users.resetPassword');
    }

    public function resetPassword(Request $request)
    {
        if (Hash::check($request->input('curPassword'), Auth::user()->password)) {
            if ($request->input('password') == $request->input('password-confirm')) {
                User::find(Auth::user()->id)->update([
                    'password' => Hash::make($request->input('password'))
                ]);
                return $this->index();
            }
            return $this->showResetForm('Hasła nie są takie same');
        }

        return $this->showResetForm('Hasło nie zgadza się z aktualnym');
    }

}
