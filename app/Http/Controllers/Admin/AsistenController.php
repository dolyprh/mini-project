<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AsistenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $title = 'Hapus Data!';
        $text = 'Apakah anda yakin ingin menghapus Data?';
        confirmDelete($title, $text);

        return view('admin/asisten', compact('data'));
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
        User::updateOrCreate([
            'id_asisten'   => $request->id_asisten,
            'name'   => $request->name,
            'join_date'   => $request->join_date,
            'email'   => $request->email,
            'role'   => $request->role,
            'password'=> Hash::make($request->input('password')),
        ]);

        return redirect()->back()->withSuccess('Hore, Asisten Berhasil ditambahkan');
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
        $data = User::find($id);
        return view('admin.asisten', ['data' => $data]);
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
        $post = User::findOrFail($id);

        $post->name = $request->update_name;
        $post->email = $request->update_email;
        $post->name = $request->update_name;
        $post->role = $request->update_role;

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
        User::find($id)->delete();
        return back()->withSuccess('Hore, Data Asisten Berhasil dihapus');
    }
}
