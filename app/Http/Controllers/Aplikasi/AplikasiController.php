<?php

namespace App\Http\Controllers\Aplikasi;

use App\Http\Controllers\Controller;
use App\Models\Aplikasi;
use Illuminate\Http\Request;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplikasi = Aplikasi::all();
        return view('admin.aplikasi.index', compact('aplikasi'));
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
        Aplikasi::create($request->all());
        return back()->with('ds','Aplikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Aplikasi $aplikasi)
    {
        $statistik = statistikAplikasi($aplikasi->fitur);
        return view('admin.aplikasi.show', compact('aplikasi','statistik'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Aplikasi $aplikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Aplikasi::where('id',$request->id)->update([
            'nama_aplikasi' => $request->nama_aplikasi,
            'nama_client' => $request->nama_client,
            'tgl_awalproyek' => $request->tgl_awalproyek,
            'tgl_akhirproyek' => $request->tgl_akhirproyek,
            'keterangan' => $request->keterangan,
            'level' => $request->level,
        ]);

        return back()->with('du','Aplikasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aplikasi  $aplikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aplikasi $aplikasi)
    {
        $aplikasi->delete();

        return back()->with('dd','Aplikasi');
    }
}
