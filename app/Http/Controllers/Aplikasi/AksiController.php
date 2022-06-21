<?php

namespace App\Http\Controllers\Aplikasi;

use App\Http\Controllers\Controller;
use App\Models\Aksi;
use Illuminate\Http\Request;

class AksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Aksi::create([
            'fitur_id' => $request->fitur_id,
            'nama_aksi' => $request->nama_aksi,
            'status' => $request->status,
            'akses' => json_encode($request->akses),
            'detail' => $request->detail,
        ]);

        return back()->with('ds','Aksi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aksi  $aksi
     * @return \Illuminate\Http\Response
     */
    public function show(Aksi $aksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aksi  $aksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Aksi $aksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aksi  $aksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Aksi::where('id',$request->id)->update([
            'nama_aksi' => $request->nama_aksi,
            'status' => $request->status,
            'akses' => json_encode($request->akses),
            'detail' => $request->detail,
        ]);

        return back()->with('du','Aksi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aksi  $aksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aksi $aksi)
    {
        $aksi->delete();

        return back()->with('dd','Aksi');
    }
}
