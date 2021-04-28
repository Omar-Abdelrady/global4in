<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login()
    {
        return view('admin.pages.auth.login');
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'email'=> 'required',
            'password'  => 'required'
        ]);
        $admin = DB::table('admins')->where('email', $data['email'])->first();
        if ($admin){

            if (Auth::guard('admin')->attempt($data, $request->has('remember') ? $request->has('remember'):''))
            {
                return redirect()->route('admin.index');
            }
        }else{
            dd('no');
        }
    }
}
