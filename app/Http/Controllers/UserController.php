<?php

namespace App\Http\Controllers;

use App\Console\Commands\ExportUsers;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Jobs\DownloadUsers;
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
       return Excel::download(new UsersExport, "users-all.xlsx");
    }
}
