<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_all = Absen::orderBy('absensi.created_at', 'desc')
                ->join('materi', 'absensi.id_materi', 'materi.id')
                ->join('kelas', 'absensi.id_kelas', 'kelas.id')
                ->join('code', 'absensi.id_code', 'code.id')
                ->join('users', 'absensi.id_asisten', 'users.id')
                ->get();

        return view('riwayat.all_absen', compact('data_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data_absen = Absen::orderBy('absensi.created_at', 'desc')
                ->join('materi', 'absensi.id_materi', 'materi.id')
                ->join('kelas', 'absensi.id_kelas', 'kelas.id')
                ->join('code', 'absensi.id_code', 'code.id')
                ->join('users', 'absensi.id_asisten', 'users.id')
                ->where('users.id', Auth::id())
                ->get();

        // $data_absen = Absen::orderBy('absensi.created_at ', 'desc')
        //         ->join('materi', 'absensi.id_materi', 'materi.id')
        //         ->join('kelas', 'absensi.id_kelas', 'kelas.id')
        //         ->join('code', 'absensi.id_code', 'code.id')
        //         ->join('users', 'absensi.id_asisten', 'users.id')
        //         ->where('users.id', Auth::id())
        //         ->get();

        return view('riwayat.absen', compact('data_absen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
