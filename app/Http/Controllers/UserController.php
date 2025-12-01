<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function indexUser()
    {
        $users = User::paginate(10);
        $roles = RoleEnum::cases();

        return view('dashboard.users.index', compact('users', 'roles'));
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'role' => 'required',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
                    ->uncompromised()
            ],
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'name.required' => 'Nama tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Password harus sama',
            'password.min' => 'Password harus berjumlah 8',
            'password.mixedCase' => 'Password harus kombinasi',
            'password.symbols' => 'Password harus mengandung simbol',
            'password.numbers' => 'Password harus mengandung angka',
            'password.uncompromised' => 'password sudah digunakan',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return Redirect::back()->with('succes', 'User berhasil dibuat');
    }

    public function editUserData($id)
    {
        $user = User::find($id);
        $roles = RoleEnum::cases();

        return view('dashboard.users.edit_data', compact('user', 'roles'));
    }

    public function editUserPassword($id)
    {
        $user = User::find($id);

        return view('dashboard.users.edit_password', compact('user'));
    }

    public function updateUserData($id, Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'role' => 'required',
        ], [
            'username.required' => 'Username tidak boleh kosong',
            'username.unique' => 'Username sudah digunakan',
            'name.required' => 'Nama tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
        ]);

        $user = User::find($id);

        if ($user->username == $request->username) {
            $user->update([
                'name' => $request->name,
                'role' => $request->role,
            ]);
        } else {
            $user->update([
                'username' => $request->username,
                'name' => $request->name,
                'role' => $request->role,
            ]);
        }

        return Redirect::back()->with('succes', 'Data berhasil dirubah');
    }

    public function updateUserPassword($id, Request $request) {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->symbols()
                    ->numbers()
                    ->uncompromised()
            ],
        ], [
            'password.required' => 'Password tidak boleh kosong',
            'password.confirmed' => 'Password harus sama',
            'password.min' => 'Password harus berjumlah 8',
            'password.mixedCase' => 'Password harus kombinasi',
            'password.symbols' => 'Password harus mengandung simbol',
            'password.numbers' => 'Password harus mengandung angka',
            'password.uncompromised' => 'password sudah digunakan',
        ]);

        $user = User::find($id);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return Redirect::back()->with('succes', 'Password berhasil dirubah');
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();

        return Redirect::back()->with('succes', 'User berhasil dihapus');
    }
}
