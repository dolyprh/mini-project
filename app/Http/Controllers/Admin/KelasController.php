<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kelas::all();
        $title = 'Hapus Data!';
        $text = 'Apakah anda yakin ingin menghapus Data?';
        confirmDelete($title, $text);

        return view('admin.kelas', compact('data'));
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
        Kelas::updateOrCreate([
            'jurusan'   => $request->jurusan,
            'fakultas'   => $request->fakultas,
            'tingkat'   => $request->tingkat,
            'nama_kelas'   => $request->name,
        ]);

        return redirect()->back()->withSuccess('Hore, Kelas Berhasil ditambahkan');
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
        $post = Kelas::find($id);

        $post->jurusan = $request->jurusan;
        $post->fakultas = $request->fakultas;
        $post->tingkat = $request->tingkat;
        $post->nama_kelas = $request->name;

        $post->save();

        if($post) {
            return redirect()->back()->withSuccess('Data Berhasil di Update');
        } else {
            return redirect()->back()->with([
                'error' => 'Some problem has occured, please try again'
            ]);
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
        $data = Kelas::findOrFail($id);
        $data->delete();
        // Alert::success('Hore, Data Kelas Berhasil dihapus');
        return back()->withSuccess('Data Kelas Berhasil dihapus');
    }
}
