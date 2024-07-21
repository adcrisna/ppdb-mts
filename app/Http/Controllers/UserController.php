<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use App\Models\Setting;

class UserController extends Controller
{
    public function index() {
        $title = "Home";
        return view('user.index', compact('title'));
    }
    public function profile()
    {
        $title = 'Profile';
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('title','user'));
    }
    public function updateProfile(Request $request){
        DB::beginTransaction();
        try {
            if (!empty($request->password)) {
                $user = User::find($request->id);
                if (Hash::check($request->passwordLama, $user->password)) {
                    if ($request->password == $request->passwordConfirm) {
                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->nisn = $request->nisn;
                        $user->password = bcrypt($request->password);
                        $user->save();
                    }else {
                       \Session::flash('msg_error','Password baru tidak sama!');
                        return Redirect::route('user.profile');
                    }
                }else {
                    \Session::flash('msg_error','Password lama tidak valid!');
                        return Redirect::route('user.profile');
                }
            }else{
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->nisn = $request->nisn;
                $user->save();
            }
             DB::commit();
            \Session::flash('msg_success','Profile Berhasil Diubah!');
            return Redirect::route('user.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('user.profile');
        }
    }
    public function informasi_pendaftaran()
    {
        $title = "Informasi Pendaftaran";
        return view('user.informasi_pendaftaran', compact('title'));
    }
    public function kontak_kami()
    {
        $title = "Kontak Kami";
        return view('user.kontak_kami', compact('title'));
    }
    public function jalur_pendaftaran()
    {
        $title = "Jalur Pendaftaran";
        $user = User::find(Auth::user()->id);
        $setting = Setting::find(1);
        $dateNow =  date('Y-m-d');
        return view('user.jalur_pendaftaran', compact('title','user','setting','dateNow'));
    }
}
