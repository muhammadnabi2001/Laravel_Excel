<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\UserCreate;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function user()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('User.users', ['users' => $users]);
    }

    public function usercreate()
    {
        return view('User.usercreate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:50|min:5|email|unique:users,email',
            'password' => 'required',
        ]);

        UserCreate::dispatch($data);
        return redirect('/users')->with('success', "Ma'lumot muvaffaqiyatli qo'shildi!");
    }

    public function exportUsers()
    {
        $users = User::all();

        $usersArray = $users->map(function ($user) {
            return [
                'Name' => $user->name,
                'Email' => $user->email,
                'Created At' => $user->created_at,
            ];
        })->toArray();

        return Excel::download(function ($excel) use ($usersArray) {
            $excel->sheet('Users', function ($sheet) use ($usersArray) {
                $sheet->fromArray($usersArray, null, 'A1', false, false);
            });
        }, 'users.xlsx');
    }
}
