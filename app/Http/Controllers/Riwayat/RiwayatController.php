<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;
// use Maatwebsite\Excel\Excel;
use App\Exports\AbsenExport;
use App\Exports\AbsenExportAll;
use Maatwebsite\Excel\Facades\Excel;

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
            ->leftJoin('users as user_approve', 'code.id_user', 'user_approve.id')
            ->leftJoin('users as user_get', 'code.id_user_get', 'user_get.id')
            ->select(
                'users.id_asisten',
                'user_get.name as user_get_name',
                'materi.materi',
                'kelas.nama_kelas',
                'absensi.teaching_role',
                'absensi.date',
                'absensi.start',
                'absensi.end',
                'absensi.duration',
                'user_approve.name as name_approve'
            )
            ->get();

        return view('riwayat.all_absen', compact('data_all'));
    }

    function ExportAbsen()
    {
        return Excel::download(new AbsenExport, 'dataabsen.xlsx');
    }

    function ExportAbsenAll()
    {
        return Excel::download(new AbsenExportAll, 'data_all_asben.xlsx');
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
            ->leftJoin('users as user_approve', 'code.id_user', 'user_approve.id')
            ->leftJoin('users as user_get', 'code.id_user_get', 'user_get.id')
            ->select(
                'absensi.teaching_role',
                'absensi.date',
                'absensi.start',
                'absensi.end',
                'absensi.duration',
                'absensi.end',
                'materi.materi',
                'kelas.nama_kelas',
                'code.code',
                'users.id_asisten',
                'user_approve.name as name_approve',
                'user_get.name as user_get_name'
            )
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
