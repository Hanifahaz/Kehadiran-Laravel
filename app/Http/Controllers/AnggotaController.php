<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function index()
    {
        //get posts
        $anggotas = Anggota::orderBy('nama','asc')->paginate(6);

        //render view with posts
        return view('anggotas.index', compact('anggotas'));
    }

    public function create()
    {
        return view('anggotas.create');
        
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'NISN'      => 'required|min:10',
            'nama'      => 'required|min:2',
            'kelas'     => 'required|min:5',
            'lahir'     => 'required|min:5',
            'alamat'    => 'required|min:5',
            'phone'     => 'required|min:5'
        ]);

        //create post
        Anggota::create([
            'NISN'      => $request->NISN,
            'nama'      => $request->nama,
            'kelas'     => $request->kelas,
            'lahir'     => $request->lahir,
            'alamat'    => $request->alamat,
            'phone'     => $request->phone
        ]);

        //redirect to index
        return redirect()->route('anggotas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Anggota $anggota)
    {
        return view('anggotas.edit',compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        //validate form
        $this->validate($request, [
            'NISN'      => 'required|min:10',
            'nama'      => 'required|min:2',
            'kelas'     => 'required|min:5',
            'lahir'     => 'required|min:5',
            'alamat'    => 'required|min:5',
            'phone'     => 'required|min:5'
        ]);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/anggotas', $image->hashName());

            //delete old image
            Storage::delete('public/anggotas/'.$anggota->image);

            //update post with new image
            $anggota->update([
                'NISN'     => $request->NISN,
                'nama'     => $request->nama,
                'kelas'    => $request->kelas,
                'lahir'    => $request->lahir,
                'alamat'   => $request->alamat,
                'phone'    => $request->phone
            ]);
        } else {

            //update post without image
            $anggota->update([
                'NISN'     => $request->NISN,
                'nama'     => $request->nama,
                'kelas'    => $request->kelas,
                'lahir'    => $request->lahir,
                'alamat'   => $request->alamat,
                'phone'    => $request->phone
            ]);
        }

        //redirect to index
        return redirect()->route('anggotas.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Anggota $anggota)
    {

        //delete post
        $anggota->delete();

        //redirect to index
        return redirect()->route('anggotas.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
