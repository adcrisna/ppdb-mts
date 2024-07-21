<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function register(Request $request) {
        DB::beginTransaction();
        try {
            $cekNisn = User::where('nisn',$request->nisn)->first();
            if (!empty($cekNisn)) {
                \Session::flash('msg_error','NISN Sudah ada!');
                return Redirect::route('register');
            }
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->nisn = $request->nisn;
            $user->password = bcrypt($request->password);
            $user->level = 'User';
            $user->save();

            DB::commit();
            \Session::flash('msg_success','Pendaftaran Akun Berhasil!');
            return Redirect::route('login');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('register');
        }
    }
}
