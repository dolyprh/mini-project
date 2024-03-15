<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Absen;

class AbsenExportAll implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absen::orderBy('absensi.created_at', 'desc')
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
        ->get();
    }
}
