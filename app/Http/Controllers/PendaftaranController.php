<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use Validator;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Hasil;
use App\Models\Nilai;
use App\Models\OrangTua;
use App\Models\Sekolah;
use App\Models\Siswa;
use App\Models\Riwayat;
use App\Models\Setting;

class PendaftaranController extends Controller
{
    public function pendaftaran_reguler()
    {
        $title = "Pendaftaran Reguler";
        return view('user.pendaftaran_reguler', compact('title'));
    }
    public function pendaftaran_prestasi()
    {
        $title = "Pendaftaran Prestasi";
        return view('user.pendaftaran_prestasi', compact('title'));
    }
    public function addPendaftaran(Request $request) {
        // return $request;
        DB::beginTransaction();
        try {
            $rules = array(
                'foto'=> 'required|mimes:jpeg,jpg,png|max:2048',
                'skhun'=> 'mimes:jpeg,jpg,png|max:2048',
                'bukti_prestasi'=> 'mimes:jpeg,jpg,png|max:2048',
                // 'rapor_4_sm_1'=> 'required|mimes:jpeg,jpg,png|max:2048',
                // 'rapor_4_sm_2'=> 'required|mimes:jpeg,jpg,png|max:2048',
                // 'rapor_5_sm_1'=> 'required|mimes:jpeg,jpg,png|max:2048',
                // 'rapor_5_sm_2'=> 'required|mimes:jpeg,jpg,png|max:2048',
                'akta_kel'=> 'required|mimes:jpeg,jpg,png|max:2048',
                'ijazah_skl'=> 'required|mimes:jpeg,jpg,png|max:2048',
                'kartu_keluarga'=> 'required|mimes:jpeg,jpg,png|max:2048',
            );
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                \Session::flash('msg_error','Berkas Harus Berupa JPG/PNG dengan Max File 2 MB!');
                return redirect()->back()->withInput();
            }

            $namafoto = "Foto Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            $extention = $request->file('foto')->extension();
            $photo = sprintf('%s.%0.8s', $namafoto, $extention);
            $destination = base_path() .'/public/foto';
            $request->file('foto')->move($destination,$photo);

            $namaakta_kel = "akta_kel Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            $extentionakta_kel = $request->file('akta_kel')->extension();
            $akta_kel = sprintf('%s.%0.8s', $namaakta_kel, $extentionakta_kel);
            $destinationakta_kel= base_path() .'/public/foto';
            $request->file('akta_kel')->move($destinationakta_kel,$akta_kel);

            $namaijazah_skl = "ijazah_skl Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            $extentionijazah_skl= $request->file('ijazah_skl')->extension();
            $ijazah_skl = sprintf('%s.%0.8s', $namaijazah_skl, $extentionijazah_skl);
            $destinationijazah_skl = base_path() .'/public/foto';
            $request->file('ijazah_skl')->move($destinationijazah_skl,$ijazah_skl);

            // $namarapor_5_sm_1 = "rapor_5_sm_1 Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            // $extentionrapor_4_sm_2 = $request->file('rapor_5_sm_1')->extension();
            // $rapor_5_sm_1 = sprintf('%s.%0.8s', $namarapor_5_sm_1, $extentionrapor_4_sm_2);
            // $destinationrapor_4_sm_2 = base_path() .'/public/foto';
            // $request->file('rapor_5_sm_1')->move($destinationrapor_4_sm_2,$rapor_5_sm_1);

            // $namarapor_5_sm_2 = "rapor_5_sm_2 Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            // $extentionrapor_4_sm_2 = $request->file('rapor_5_sm_2')->extension();
            // $rapor_5_sm_2 = sprintf('%s.%0.8s', $namarapor_5_sm_2, $extentionrapor_4_sm_2);
            // $destinationrapor_4_sm_2 = base_path() .'/public/foto';
            // $request->file('rapor_5_sm_2')->move($destinationrapor_4_sm_2,$rapor_5_sm_2);

            // $namarapor_6_sm_1 = "rapor_6_sm_1 Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            // $extentionrapor_4_sm_2 = $request->file('rapor_6_sm_1')->extension();
            // $rapor_6_sm_1 = sprintf('%s.%0.8s', $namarapor_6_sm_1, $extentionrapor_4_sm_2);
            // $destinationrapor_4_sm_2 = base_path() .'/public/foto';
            // $request->file('rapor_6_sm_1')->move($destinationrapor_4_sm_2,$rapor_6_sm_1);

            $namakartu_keluarga = "kartu_keluarga Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
            $extentionkartu_keluarga = $request->file('kartu_keluarga')->extension();
            $kartu_keluarga = sprintf('%s.%0.8s', $namakartu_keluarga, $extentionkartu_keluarga);
            $destinationkartu_keluarga = base_path() .'/public/foto';
            $request->file('kartu_keluarga')->move($destinationkartu_keluarga,$kartu_keluarga);

            if (!empty($request->skhun)) {
                $namaskhun = "SKHUN Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionskhun = $request->file('skhun')->extension();
                $skhun = sprintf('%s.%0.8s', $namaskhun, $extentionskhun);
                $destinationskhun = base_path() .'/public/foto';
                $request->file('skhun')->move($destinationskhun,$skhun);
            }else{
                $skhun = null;
            }

            if (!empty($request->bukti_prestasi)) {
                $namabukti_prestasi = "Bukti Prestasi Calon Siswa"."  ".$request->name."-".$request->nisn." ".date("Y-m-d H-i-s");
                $extentionbukti_prestasi = $request->file('bukti_prestasi')->extension();
                $bukti_prestasi = sprintf('%s.%0.8s', $namabukti_prestasi, $extentionbukti_prestasi);
                $destinationbukti_prestasi = base_path() .'/public/foto';
                $request->file('bukti_prestasi')->move($destinationbukti_prestasi,$bukti_prestasi);
            }else{
                $bukti_prestasi = null;
            }

            $siswa = new Siswa;
            $siswa->tempat_lahir = $request->tempat_lahir;
            $siswa->tanggal_lahir = $request->tanggal_lahir;
            $siswa->jenis_kelamin = $request->jenis_kelamin;
            $siswa->agama = $request->agama;
            $siswa->no_hp = $request->no_hp;
            $siswa->alamat = $request->alamat;
            $siswa->is_reguler = $request->is_reguler;
            $siswa->user_id = $request->user_id;
            $siswa->foto = $photo;
            $siswa->save();

            $orangTua = new OrangTua;
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
            $orangTua->user_id = $request->user_id;
            $orangTua->save();

            $sekolah = new Sekolah;
            $sekolah->nama_sekolah = $request->nama_sekolah;
            $sekolah->status_sekolah = $request->status_sekolah;
            $sekolah->tanggal_lulus = $request->tanggal_lulus;
            $sekolah->alamat_sekolah = $request->alamat_sekolah;
            $sekolah->user_id = $request->user_id;
            $sekolah->save();

            $nilai = new Nilai;
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
            $nilai->skhun = $skhun;

            $nilai->jenis_prestasi = $request->jenis_prestasi;
            $nilai->nama_prestasi = $request->nama_prestasi;
            $nilai->bukti_prestasi = $bukti_prestasi;

            $nilai->user_id = $request->user_id;
            $nilai->save();

            /*if ($request->is_reguler == 1) {
                $total_nilai = ($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1 + $nilai->bi_un + $nilai->ipa_un + $nilai->mt_un) / 18;
            } else {
                $total_nilai = ($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1 ) / 15;
            }*/
            if ($request->is_reguler == 1) {
                $total_rapor =($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1 );
                $total_un = $nilai->bi_un + $nilai->ipa_un + $nilai->mt_un;
                $total_nilai = ($total_un*0.4 + $total_rapor * 0.6);

            } else {
                $total_rapor = ($nilai->bi_iv_sm_1 + $nilai->ipa_iv_sm_1 + $nilai->mt_iv_sm_1 + $nilai->bi_iv_sm_2 + $nilai->ipa_iv_sm_2 + $nilai->mt_iv_sm_2 + $nilai->bi_v_sm_1 + $nilai->ipa_v_sm_1 + $nilai->mt_v_sm_1 + $nilai->bi_v_sm_2 + $nilai->ipa_v_sm_2 + $nilai->mt_v_sm_2 + $nilai->bi_vi_sm_1 + $nilai->ipa_vi_sm_1 + $nilai->mt_vi_sm_1 );
                $total_nilai = $total_rapor + $nilai->poin_prestasi;
            }

            $berkas = new Berkas;
            // $berkas->rapor_4_sm_1 = $rapor_4_sm_1;
            // $berkas->rapor_4_sm_2 = $rapor_4_sm_2;
            // $berkas->rapor_5_sm_1 = $rapor_5_sm_1;
            // $berkas->rapor_5_sm_2 = $rapor_5_sm_2;
            // $berkas->rapor_6_sm_1 = $rapor_6_sm_1;
            $berkas->akta_kel = $akta_kel;
            $berkas->ijazah_skl = $ijazah_skl;
            $berkas->kartu_keluarga = $kartu_keluarga;
            $berkas->user_id = $request->user_id;
            $berkas->save();

            $hasil = new Hasil;
            $hasil->status = 'Pemeriksaan Berkas';
            $hasil->catatan_berkas = null;
            $hasil->total_nilai = $total_nilai;
            $hasil->total_un = $total_un ?? null;
            $hasil->total_rapor = $total_rapor;
            $hasil->keterangan = null;
            $hasil->no_pendaftaran = date('Y').sprintf('%04d',$request->user_id);
            $hasil->user_id = $request->user_id;
            $hasil->save();

            DB::commit();
            \Session::flash('msg_success','Pendaftaran Berhasil!');
            return Redirect::route('user.jalur_pendaftaran');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error',$th);
            return Redirect::route('user.jalur_pendaftaran');
        }
    }
    public function data_pendaftaran()
    {
        $title = "Data Pendaftaran";
        $user = User::find(Auth::user()->id);
        return view('user.data_pendaftaran', compact('title','user'));
    }
    public function hasil_seleksi()
    {
        $title = "Hasil Seleksi";
        $user = User::find(Auth::user()->id);
        return view('user.hasil_seleksi', compact('title','user'));
    }
    public function peringkat()
    {
        $title = "Peringkat";
        $setting =  Setting::find(1);
        // return $setting;
        $user = Hasil::whereDate('created_at','>=',date('Y-m-d', strtotime($setting->start_prestasi)))
        ->whereDate('created_at','<=',date('Y-m-d', strtotime($setting->end_prestasi)))
        ->where('status','BERKAS DITERIMA')
        ->where('keterangan','DITERIMA')
        ->orderBy('total_nilai','DESC')->get();
        // return $user;
        return view('user.peringkat', compact('title','user'));
    }
    public function cabut_berkas(Request $request) {

        DB::beginTransaction();
        try {
            $hasil = Hasil::find($request->id);
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
            $riwayat->keterangan = $request->keterangan;
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
            return Redirect::route('admin.verifikasi_berkas');
        } catch (\Throwable $th) {
            DB::rollback();
            \Session::flash('msg_error',$th);
            return Redirect::route('admin.verifikasi_berkas');
        }
    }
}
