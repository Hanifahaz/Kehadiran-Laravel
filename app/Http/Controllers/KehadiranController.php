<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Keterangan;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KehadiranController extends Controller
{
    public function index()
    {
        //get posts
        $kehadirans = Kehadiran::orderBy('nama','asc')->paginate(6);

        //render view with posts
        return view('kehadirans.index', compact('kehadirans'));
    }

    public function create()
    {
        return view('kehadirans.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'      => 'required|min:2',
            'kelas'     => 'required|min:2',
            'tanggal'     => 'required|min:5',
            'keterangan'    => 'required|min:2'
        ]);

        //create post
        Kehadiran::create([
            'nama'      => $request->nama,
            'kelas'     => $request->kelas,
            'tanggal'     => $request->tanggal,
            'keterangan'    => $request->keterangan
        ]);

        //redirect to index
        return redirect()->route('kehadirans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Kehadiran $kehadiran)
    {
        return view('kehadirans.edit',compact('kehadiran'));
    }

    public function update(Request $request, Kehadiran $kehadiran)
    {
        //validate form
        $this->validate($request, [
            'nama'      => 'required|min:2',
            'kelas'     => 'required|min:2',
            'tanggal'     => 'required|min:5',
            'keterangan'    => 'required|min:2'
        ]);

        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/kehadirans', $image->hashName());

            //delete old image
            Storage::delete('public/kehadirans/'.$kehadiran->image);

            //update post with new image
            $anggota->update([
                'nama'         => $request->nama,
                'kelas'        => $request->kelas,
                'tanggal'      => $request->tanggal,
                'keterangan'   => $request->keterangan
            ]);
        } else {

            //update post without image
            $kehadiran->update([
                'nama'     => $request->nama,
                'kelas'    => $request->kelas,
                'tanggal'    => $request->tanggal,
                'keterangan'   => $request->keterangan
            ]);
        }

        //redirect to index
        return redirect()->route('kehadirans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Kehadiran $kehadiran)
    {

        //delete post
        $kehadiran->delete();

        //redirect to index
        return redirect()->route('kehadirans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
