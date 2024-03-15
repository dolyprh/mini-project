<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Code;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Absen::all();

        // return view('admin.dashboard', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idAsistenLogin = Auth::id();
        $idAsistenRequest = $request->id_asisten;
        $kodeAbsen = $request->kode;
        $idMateri = $request->materi;
        $idKelas = $request->kelas;
        $peranAsisten = $request->peranJaga;

        // Cek asisten yang sedang login sesuai id_asisten
        $asisten = User::where('id_asisten', $idAsistenRequest)->where('id', $idAsistenLogin)->first();
        if (!$asisten) {
            return redirect()->back()->with(['error' => 'Gagal Login, Absen Error']);
        }

        // Cari kode absen yang belum digunakan
        $kodeAbsenRecord = Code::where('code', $kodeAbsen)->whereNull('id_user_get')->first();
        if (!$kodeAbsenRecord) {
            return redirect()->back()->with(['error' => 'Gagal Login, Absen Error']);
        }

        if ($kodeAbsenRecord->id_user == $idAsistenLogin) {
            return redirect()->back()->with(['error' => 'Gagal Login, Absen Error']);
        }

        $datetoday = Carbon::now("GMT+7")->toDateString();
        $datenow = Carbon::now("GMT+7")->toTimeString();

        $absen = new Absen();
        $absen->id_kelas = $idKelas;
        $absen->id_materi = $idMateri;
        $absen->id_asisten = $idAsistenLogin;
        $absen->teaching_role = $peranAsisten;
        $absen->date = $datetoday;
        $absen->start = $datenow;
        $absen->id_code = $kodeAbsenRecord->id;
        $absen->save();

        $kodeAbsenRecord->id_user_get = $idAsistenLogin;
        $kodeAbsenRecord->save();

        return redirect()->back()->withSuccess('Anda Berhasil Absen');
        $idAsistenLogin = Auth::id();
        $idAsistenRequest = $request->id_asisten;
        $kodeAbsen = $request->kode;
        $idMateri = $request->materi;
        $idKelas = $request->kelas;
        $peranAsisten = $request->peranJaga;

        $asisten = User::where('id_asisten', $idAsistenRequest)->where('id', $idAsistenLogin)->first();
        if (!$asisten) {
            return redirect()->back()->with(['error' => 'Gagal Login, Absen Error']);
        }

        $kodeAbsenRecord = Code::where('code', $kodeAbsen)->whereNull('id_user_get')->first();
        if (!$kodeAbsenRecord) {
            return redirect()->back()->with(['error' => 'Gagal Login, Absen Error']);
        }

        if ($kodeAbsenRecord->id_user == $idAsistenLogin) {
            return redirect()->back()->with(['error' => 'Gagal Login, Absen Error']);
        }

        $absen = new Absen();
        $absen->id_kelas = $idKelas;
        $absen->id_materi = $idMateri;
        $absen->id_asisten = $idAsistenLogin;
        $absen->teaching_role = $peranAsisten;
        $absen->date = now()->toDateString();
        $absen->start = now()->toTimeString();
        $absen->id_code = $kodeAbsenRecord->id;
        $absen->save();

        $kodeAbsenRecord->id_user_get = $idAsistenLogin;
        $kodeAbsenRecord->save();

        return redirect()->back()->withSuccess('Anda Berhasil Absen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $now = Carbon::now('GMT+7');
        $today = Carbon::now('GMT+7')->toDateString();
        $idLogin = Auth::id();
        $cekAbsen = Absen::where('id_asisten', $idLogin)->where('date', $today)->where('end', null)->first();

        $masuk = $cekAbsen->start;
        $keluar = Carbon::now("GMT+7")->toTimeString();
        $cekAbsen->end = $keluar;
        $hasil = $now->diffInMinutes($masuk);
        $cekAbsen->duration = $hasil;
        $cekAbsen->save();

        if (!$cekAbsen) {
            return redirect()->back()->with([
                'error'     => "Clockout Gagal"
            ]);
        } else {
            return redirect()->back()->withSuccess("Berhasil Clock-Out");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
