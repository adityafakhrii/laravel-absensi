<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function index(Request $request)
    {
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $users = User::where('role','!=','admin')
                            ->where('nik', 'like','%'.$search.'%')
                            ->orderBy('nama','asc')->get();
        }else{
            $users = User::where('role','!=','admin')->orderBy('nama','asc')->get();
        }
        return view('karyawan',compact('users'));
    }


    public function create()
    {
        return view('tambah-karyawan');
    }


    public function store(Request $request)
    {

        $u = new User;
        $u->nik = $request->nik;
        $u->password = Hash::make($request->password);
        $u->nama = $request->nama;
        $u->jabatan = $request->jabatan;
        $u->role = 'user';
        $u->save();

        return redirect('/data-karyawan')->with('success','Karyawan berhasil ditambahkan.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('edit-karyawan',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nik = $request->nik;
        $user->nama = $request->nama;
        $user->jabatan = $request->jabatan;
        $user->role = 'user';
        $user->save();

        return redirect('data-karyawan')->with('ubah','Data berhasil diubah.');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('data-karyawan')->with('hapus','Data berhasil dihapus.');
    }
}
