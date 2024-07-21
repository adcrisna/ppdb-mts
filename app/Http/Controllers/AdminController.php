<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Hasil;
use App\Models\Nilai;
use App\Models\OrangTua;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Riwayat;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() {
        $title = "Home";
        $setting =  Setting::find(1);
        $user = Hasil::whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))->get();
        $prestasi = Siswa::where('is_reguler',0)->whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))->get();
        $reguler = Siswa::where('is_reguler',1)->whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))->get();
        return view('admin.index', compact('title','user','prestasi','reguler'));
    }
    public function profile()
    {
        $title = 'Profile';
        $admin = User::find(Auth::user()->id);
        return view('admin.profile', compact('title','admin'));
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
                        $user->password = bcrypt($request->password);
                        $user->save();
                    }else {
                       \Session::flash('msg_error','Password baru tidak sama!');
                        return Redirect::route('admin.profile');
                    }
                }else {
                    \Session::flash('msg_error','Password lama tidak valid!');
                        return Redirect::route('admin.profile');
                }
            }else{
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
            }
             DB::commit();
            \Session::flash('msg_success','Profile Berhasil Diubah!');
            return Redirect::route('admin.profile');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.profile');
        }
    }

    public function user()
    {
        $title = 'Data Pendaftar';
        $setting =  Setting::find(1);
        $user = Hasil::whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))->get();
        return view('admin.user', compact('title','user'));
    }
    public function addUser(Request $request) {
        DB::beginTransaction();
        try {
            $cekNisn = User::where('nisn',$request->nisn)->first();
            if (!empty($cekNisn)) {
                \Session::flash('msg_error','NISN Sudah ada!');
                return Redirect::route('admin.user');
            }

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->nisn = $request->nisn;
            $user->password = bcrypt($request->password);
            $user->level = 'User';
            $user->save();

            DB::commit();
            \Session::flash('msg_success','User Berhasil Ditambah!');
            return Redirect::route('admin.user');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.user');
        }
    }
    public function updateUser(Request $request) {
        DB::beginTransaction();
        try {

            if (!empty($request->password)) {
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->nisn = $request->nisn;
                $user->password = bcrypt($request->password);
                $user->save();
            }else{
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->nisn = $request->nisn;
                $user->save();
            }

            DB::commit();
            \Session::flash('msg_success','User Berhasil Diubah!');
            return Redirect::route('admin.user');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.user');
        }
    }
    public function deleteUser($id)
    {
        DB::beginTransaction();
        try {
            $user = User::where('id',$id)->delete();

            DB::commit();
            \Session::flash('msg_success','Data User Berhasil Dihapus!');
            return Redirect::route('admin.user');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.user');
        }
    }
    public function data_seleksi()
    {
        $title = "Data Seleksi";
        $setting =  Setting::find(1);
        $user = Hasil::whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))
        ->where('status','BERKAS DITERIMA')->orderBy('total_nilai','DESC')->get();
        // return $user;
        return view('admin.data_seleksi', compact('title','user'));
    }
    public function detail_seleksi($id)
    {
        $title = 'Detail Seleksi';
        $user = Hasil::find($id);
        return view('admin.detail_seleksi', compact('title','user'));
    }
    public function seleksi(Request $request)
    {
        DB::beginTransaction();
        try {

                $hasil = Hasil::find($request->id);
                $hasil->keterangan = $request->keterangan;
                $hasil->save();

            DB::commit();
            \Session::flash('msg_success','Seleksi Berhasil Diubah!');
            return Redirect::route('admin.data_seleksi');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.data_seleksi');
        }
    }
    public function delete_seleksi($id)
    {
        DB::beginTransaction();
        try {

                $hasil = Hasil::find($id);
                $hasil->keterangan = null;
                $hasil->save();

            DB::commit();
            \Session::flash('msg_success','Seleksi Berhasil Diubah!');
            return Redirect::route('admin.data_seleksi');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.data_seleksi');
        }
    }
    function pdfHasilSeleksi(Request $request)
    {
        if ($request->jalur == 1) {
           $hasil = Hasil::join('users','users.id','=','hasil.user_id')
           ->join('siswa','siswa.user_id','=','users.id')->where('siswa.is_reguler',1)
           ->whereYear('hasil.created_at',date('Y', strtotime($request->tanggal)))
           ->where('hasil.keterangan',$request->keterangan)->orderBy('hasil.total_nilai','DESC')->get();
        }else{
            $hasil = Hasil::join('users','users.id','=','hasil.user_id')
           ->join('siswa','siswa.user_id','=','users.id')->where('siswa.is_reguler',0)
           ->whereYear('hasil.created_at',date('Y', strtotime($request->tanggal)))
           ->where('hasil.keterangan',$request->keterangan)->orderBy('hasil.total_nilai','DESC')->get();
        }
        $tahun = date('Y', strtotime($request->tanggal));
        $pdf = Pdf::loadView('pdf.hasil_seleksi', compact('hasil','tahun'))->setPaper('a4','landscape');
        // return $hasil;
        return $pdf->stream();
    }
    public function verifikasi_berkas()
    {
        $title = 'Verifikasi Berkas';
        $setting =  Setting::find(1);
        $user = Hasil::whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))
        ->where('keterangan', null)->get();
        return view('admin.verifikasi_berkas', compact('title','user'));
    }
    public function detail_verifikasi($id)
    {
        $title = 'Detail Berkas';
        $user = Hasil::find($id);
        return view('admin.detail_verifikasi', compact('title','user'));
    }
    public function verifikasi(Request $request)
    {
        // return $request;
         DB::beginTransaction();
        try {
            $hasil = Hasil::find($request->id);

            $siswa = Siswa::find($hasil->User->Siswa->id);
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->agama = $request->agama;
            $siswa->no_hp = $request->no_hp;
            $siswa->alamat = $request->alamat;
            if (!empty($request->foto)) {
                $namafoto = "Foto Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extention = $request->file('foto')->extension();
                $photo = sprintf('%s.%0.8s', $namafoto, $extention);
                $destination = base_path() .'/public/foto';
                $request->file('foto')->move($destination,$photo);

                $siswa->foto = $photo;
            }
            $siswa->save();

            $orangTua = OrangTua::find($hasil->User->OrangTua->id);
            $orangTua->nama_ayah = $request->nama_ayah;
            $orangTua->tempat_lahir_ayah = $request->tempat_lahir_ayah;
            $orangTua->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
            $orangTua->pendidikan_terakhir_ayah = $request->pendidikan_terakhir_ayah;
            $orangTua->no_hp_ayah = $request->no_hp_ayah;
            $orangTua->pekerjaan_ayah = $request->pekerjaan_ayah;
            $orangTua->alamat_ayah = $request->alamat_ayah;
            $orangTua->nama_ibu = $request->nama_ibu;
            $orangTua->tempat_lahir_ibu = $request->tempat_lahir_ibu;
            $orangTua->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
            $orangTua->pendidikan_terakhir_ibu = $request->pendidikan_terakhir_ibu;
            $orangTua->no_hp_ibu = $request->no_hp_ibu;
            $orangTua->pekerjaan_ibu = $request->pekerjaan_ibu;
            $orangTua->alamat_ibu = $request->alamat_ibu;
            $orangTua->nama_wali = $request->nama_wali;
            $orangTua->tempat_lahir_wali = $request->tempat_lahir_wali;
            $orangTua->tanggal_lahir_wali = $request->tanggal_lahir_wali;
            $orangTua->pendidikan_terakhir_wali = $request->pendidikan_terakhir_wali;
            $orangTua->no_hp_wali = $request->no_hp_wali;
            $orangTua->pekerjaan_wali = $request->pekerjaan_wali;
            $orangTua->alamat_wali = $request->alamat_wali;
            $orangTua->hubungan_wali = $request->hubungan_wali;
            $orangTua->save();

            $sekolah = Sekolah::find($hasil->User->Sekolah->id);
            $sekolah->nama_sekolah = $request->nama_sekolah;
            $sekolah->status_sekolah = $request->status_sekolah;
            $sekolah->tanggal_lulus = $request->tanggal_lulus;
            $sekolah->alamat_sekolah = $request->alamat_sekolah;
            $sekolah->save();

            $nilai = Nilai::find($hasil->User->Nilai->id);
            $nilai->bi_iv_sm_1 = $request->bi_iv_sm_1;
            $nilai->ipa_iv_sm_1 = $request->ipa_iv_sm_1;
            $nilai->mt_iv_sm_1 = $request->mt_iv_sm_1;

            $nilai->bi_iv_sm_2 = $request->bi_iv_sm_2;
            $nilai->ipa_iv_sm_2 = $request->ipa_iv_sm_2;
            $nilai->mt_iv_sm_2 = $request->mt_iv_sm_2;

            $nilai->bi_v_sm_1 = $request->bi_v_sm_1;
            $nilai->ipa_v_sm_1 = $request->ipa_v_sm_1;
            $nilai->mt_v_sm_1 = $request->mt_v_sm_1;

            $nilai->bi_v_sm_2 = $request->bi_v_sm_2;
            $nilai->ipa_v_sm_2 = $request->ipa_v_sm_2;
            $nilai->mt_v_sm_2 = $request->mt_v_sm_2;

            $nilai->bi_vi_sm_1 = $request->bi_vi_sm_1;
            $nilai->ipa_vi_sm_1 = $request->ipa_vi_sm_1;
            $nilai->mt_vi_sm_1 = $request->mt_vi_sm_1;

            $nilai->bi_un = $request->bi_un;
            $nilai->ipa_un = $request->ipa_un;
            $nilai->mt_un = $request->mt_un;

            if (!empty($request->skhun)) {
                $namaskhun = "SKHUN Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionskhun = $request->file('skhun')->extension();
                $skhun = sprintf('%s.%0.8s', $namaskhun, $extentionskhun);
                $destinationskhun = base_path() .'/public/foto';
                $request->file('skhun')->move($destinationskhun,$skhun);

                $nilai->skhun = $skhun;
            }

            $nilai->jenis_prestasi = $request->jenis_prestasi;
            $nilai->nama_prestasi = $request->nama_prestasi;
            $nilai->poin_prestasi = $request->poin_prestasi;
            if (!empty($request->bukti_prestasi)) {
                $namabukti_prestasi = "Bukti Prestasi Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionbukti_prestasi = $request->file('bukti_prestasi')->extension();
                $bukti_prestasi = sprintf('%s.%0.8s', $namabukti_prestasi, $extentionbukti_prestasi);
                $destinationbukti_prestasi = base_path() .'/public/foto';
                $request->file('bukti_prestasi')->move($destinationbukti_prestasi,$bukti_prestasi);

                $nilai->bukti_prestasi = $bukti_prestasi;
            }
            
            $total_rapor = ($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1);
            $total_un = $nilai->bi_un + $nilai->ipa_un + $nilai->mt_un;
            $nilai->save();

            if ($request->is_reguler == 1) {
                //$total_rapor =($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1 ) / 15;
                //$total_un = $nilai->bi_un + $nilai->ipa_un + $nilai->mt_un;
                $total_nilai = ($total_un * 0.4 + $total_rapor * 0.6) + $nilai->poin_prestasi;

            } else {
                //$total_rapor = ($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1 ) / 15;
                $total_nilai = $total_rapor + $nilai->poin_prestasi;
            }

             $berkas = Berkas::find($hasil->User->Berkas->id);
            if (!empty($request->akta_kel)) {
                $namaakta_kel = "akta_kel Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionakta_kel = $request->file('akta_kel')->extension();
                $akta_kel = sprintf('%s.%0.8s', $namaakta_kel, $extentionakta_kel);
                $destinationakta_kel = base_path() .'/public/foto';
                $request->file('akta_kel')->move($destinationakta_kel,$akta_kel);

                $berkas->akta_kel = $akta_kel;
            }
            if (!empty($request->ijazah_skl)) {
                $namaijazah_skl= "ijazah_skl Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionijazah_skl = $request->file('ijazah_skl')->extension();
                $ijazah_skl = sprintf('%s.%0.8s', $namaijazah_skl, $extentionijazah_skl);
                $destinationijazah_skl = base_path() .'/public/foto';
                $request->file('ijazah_skl')->move($destinationijazah_skl,$ijazah_skl);

                $berkas->ijazah_skl = $ijazah_skl;
            }
            // if (!empty($request->rapor_5_sm_1)) {
            //     $namarapor_5_sm_1 = "rapor_5_sm_1 Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            //     $extentionrapor_4_sm_2 = $request->file('rapor_5_sm_1')->extension();
            //     $rapor_5_sm_1 = sprintf('%s.%0.8s', $namarapor_5_sm_1, $extentionrapor_4_sm_2);
            //     $destinationrapor_4_sm_2 = base_path() .'/public/foto';
            //     $request->file('rapor_5_sm_1')->move($destinationrapor_4_sm_2,$rapor_5_sm_1);

            //     $berkas->rapor_5_sm_1 = $rapor_5_sm_1;
            // }
            // if (!empty($request->rapor_5_sm_2)) {
            //     $namarapor_5_sm_2 = "rapor_5_sm_2 Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            //     $extentionrapor_4_sm_2 = $request->file('rapor_5_sm_2')->extension();
            //     $rapor_5_sm_2 = sprintf('%s.%0.8s', $namarapor_5_sm_2, $extentionrapor_4_sm_2);
            //     $destinationrapor_4_sm_2 = base_path() .'/public/foto';
            //     $request->file('rapor_5_sm_2')->move($destinationrapor_4_sm_2,$rapor_5_sm_2);

            //     $berkas->rapor_5_sm_2 = $rapor_5_sm_2;
            // }
            // if (!empty($request->rapor_6_sm_1)) {
            //     $namarapor_6_sm_1 = "rapor_6_sm_1 Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            //     $extentionrapor_4_sm_2 = $request->file('rapor_6_sm_1')->extension();
            //     $rapor_6_sm_1 = sprintf('%s.%0.8s', $namarapor_6_sm_1, $extentionrapor_4_sm_2);
            //     $destinationrapor_4_sm_2 = base_path() .'/public/foto';
            //     $request->file('rapor_6_sm_1')->move($destinationrapor_4_sm_2,$rapor_6_sm_1);
            //     $berkas->rapor_6_sm_1 = $rapor_6_sm_1;
            // }
            if (!empty($request->kartu_keluarga)) {
                $namakartu_keluarga = "kartu_keluarga Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionkartu_keluarga = $request->file('kartu_keluarga')->extension();
                $kartu_keluarga = sprintf('%s.%0.8s', $namakartu_keluarga, $extentionkartu_keluarga);
                $destinationkartu_keluarga = base_path() .'/public/foto';
                $request->file('kartu_keluarga')->move($destinationkartu_keluarga,$kartu_keluarga);

                 $berkas->kartu_keluarga = $kartu_keluarga;
             }
             $berkas->save();

            $updateHasil = Hasil::find($request->id);
            $updateHasil->total_nilai = $total_nilai;
            $updateHasil->total_un = $total_un;
            $updateHasil->total_rapor = $total_rapor;
            $updateHasil->status = $request->status;
            $updateHasil->catatan_berkas = $request->catatan_berkas;
            $updateHasil->save();

            DB::commit();
            \Session::flash('msg_success','Verifikasi Berkas Berhasil Diubah!');
            return Redirect::route('admin.verifikasi_berkas');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.verifikasi_berkas');
        }
    }
    public function delete_berkas($id)
    {
        DB::beginTransaction();
        try {
            $hasil = Hasil::find($id);
            $user = User::find($hasil->user_id);

            \File::delete(public_path('foto/'.$user->Siswa->foto));
            \File::delete(public_path('foto/'.$user->Nilai->skhun));
            \File::delete(public_path('foto/'.$user->Nilai->bukti_prestasi));
            \File::delete(public_path('foto/'.$user->Berkas->akta_kel));
            \File::delete(public_path('foto/'.$user->Berkas->ijazah_skl));
            // \File::delete(public_path('foto/'.$user->Berkas->rapor_5_sm_1));
            // \File::delete(public_path('foto/'.$user->Berkas->rapor_5_sm_2));
            // \File::delete(public_path('foto/'.$user->Berkas->rapor_6_sm_1));
            \File::delete(public_path('foto/'.$user->Berkas->kartu_keluarga));

            $riwayat = new Riwayat;
            $riwayat->jalur = $user->Siswa->is_reguler == 1 ? 'Reguler' : 'Prestasi';
            $riwayat->keterangan = 'Cabut Berkas';
            $riwayat->user_id = $user->id;
            $riwayat->save();

            $hasil->status = 'CABUT BERKAS';
            $hasil->keterangan = 'CABUT BERKAS';
            $hasil->save();

            // $deleteSiswa = Siswa::where('user_id',$user->id)->delete();
            // $deleteBerkas = Berkas::where('user_id',$user->id)->delete();
            // $deleteNilai = Nilai::where('user_id',$user->id)->delete();
            // $deleteOrangTua = OrangTua::where('user_id',$user->id)->delete();
            // $deleteSekolah = Sekolah::where('user_id',$user->id)->delete();
            // $deleteHasil = Hasil::where('user_id',$user->id)->delete();

            DB::commit();
            \Session::flash('msg_success','Cabut Berkas Berhasil!');
            return Redirect::route('admin.user');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error',$th);
            return Redirect::route('admin.user');
        }
    }
    function pdfPendaftaran(Request $request)
    {
        if ($request->jalur == 1) {
           $hasil = Hasil::join('users','users.id','=','hasil.user_id')
           ->join('siswa','siswa.user_id','=','users.id')->where('siswa.is_reguler',1)
           ->whereYear('hasil.created_at',date('Y', strtotime($request->tanggal)))
           ->orderBy('hasil.total_nilai','DESC')->get();
        }else{
            $hasil = Hasil::join('users','users.id','=','hasil.user_id')
           ->join('siswa','siswa.user_id','=','users.id')->where('siswa.is_reguler',0)
           ->whereYear('hasil.created_at',date('Y', strtotime($request->tanggal)))
           ->orderBy('hasil.total_nilai','DESC')->get();
        }

        $tahun = date('Y', strtotime($request->tanggal));
        $pdf = Pdf::loadView('pdf.pendaftaran', compact('hasil','tahun'))->setPaper('a4','landscape');
        return $pdf->stream();
    }
    public function riwayat_cabut_berkas() {
        $title = 'Data Riwayat Cabut Berkas';
        $setting =  Setting::find(1);
        $riwayat = Riwayat::whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))->get();
        return view('admin.riwayat', compact('title','riwayat'));
    }

    public function admin()
    {
        $title = 'Data Admin';
        $admin = User::where('level','Admin')->get();
        return view('admin.admin', compact('title','admin'));
    }
    public function addAdmin(Request $request) {
        DB::beginTransaction();
        try {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->level = 'Admin';
            $user->save();

            DB::commit();
            \Session::flash('msg_success','Admin Berhasil Ditambah!');
            return Redirect::route('admin.admin');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.admin');
        }
    }
    public function updateAdmin(Request $request) {
        DB::beginTransaction();
        try {

            if (!empty($request->password)) {
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();
            }else{
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
            }

            DB::commit();
            \Session::flash('msg_success','Admin Berhasil Diubah!');
            return Redirect::route('admin.admin');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.admin');
        }
    }
    public function deleteAdmin($id)
    {
        DB::beginTransaction();
        try {
            $admin = User::where('id',$id)->delete();

            DB::commit();
            \Session::flash('msg_success','Data Admin Berhasil Dihapus!');
            return Redirect::route('admin.admin');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.admin');
        }
    }

    public function setting()
    {
        $title = 'Setting';
        $setting = Setting::find(1);
        return view('admin.setting', compact('title','setting'));
    }
    public function updateSetting(Request $request){
        DB::beginTransaction();
        try {
                $setting = Setting::find($request->id);
                $setting->start_prestasi = $request->start_prestasi;
                $setting->start_reguler = $request->start_reguler;
                $setting->end_reguler = $request->end_reguler;
                $setting->end_prestasi = $request->end_prestasi;
                $setting->user_id = Auth::user()->id;
                $setting->save();
             DB::commit();
            \Session::flash('msg_success','Data Berhasil Diubah!');
            return Redirect::route('admin.setting');

        } catch (Exception $e) {
            DB::rollback();
            \Session::flash('msg_error','Somethings Wrong!');
            return Redirect::route('admin.setting');
        }
    }

    public function riwayat_pendaftaran() {
        $title = 'Data Riwayat Pendaftaran';
        $setting =  Setting::find(1);
        $hasil = Hasil::where('created_at', '<=', Carbon::parse($setting->start_prestasi))
              ->whereNotNull('keterangan')
              ->get();
        return view('admin.riwayat_pendaftaran', compact('title','hasil'));
    }
    function pdfRiwayat(Request $request)
    {
        if ($request->keterangan != 'ALL') {
            $hasil = Hasil::whereYear('hasil.created_at',$request->tanggal)
            ->where('hasil.keterangan',$request->keterangan)->orderBy('hasil.total_nilai','DESC')->get();
        }else{
            $hasil = Hasil::whereYear('hasil.created_at',$request->tanggal)
            ->orderBy('hasil.total_nilai','DESC')->get();
        }
        $tahun = $request->tanggal;
        $pdf = Pdf::loadView('pdf.riwayat_pendaftaran', compact('hasil','tahun'))->setPaper('a4','landscape');
        // return $hasil;
        return $pdf->stream();
    }
}
