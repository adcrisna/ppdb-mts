<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Redirect;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Hasil;
use App\Models\Siswa;
use App\Models\Setting;

class IndexController extends Controller
{
    public function index()
    {
        $title = "Selamat Datang";
        return view('index', compact('title'));
    }
    public function informasi_pendaftaran()
    {
        $title = "Informasi Pendaftaran";
        return view('informasi_pendaftaran', compact('title'));
    }
    public function kontak_kami()
    {
        $title = "Kontak Kami";
        return view('kontak_kami', compact('title'));
    }
    public function jalur_pendaftaran()
    {
        $title = "Jalur Pendaftaran";
        $setting = Setting::find(1);
        $dateNow =  date('Y-m-d');
        return view('jalur_pendaftaran', compact('title','setting','dateNow'));
    }
    function pdfBuktiPendaftaran($id)
    {
        $user = User::find($id);
        $pdf = Pdf::loadView('pdf.bukti_pendaftaran', compact('user'));
        return $pdf->stream();
    }
    function pdfBuktiHasilSeleksi($id)
    {
        $user = User::find($id);
        $pdf = Pdf::loadView('pdf.bukti_hasilseleksi', compact('user'));
        return $pdf->stream();
    }
}
