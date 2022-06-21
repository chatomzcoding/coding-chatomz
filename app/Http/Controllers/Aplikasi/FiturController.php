<?php

namespace App\Http\Controllers\Aplikasi;

use App\Http\Controllers\Controller;
use App\Models\Fitur;
use Illuminate\Http\Request;

class FiturController extends Controller
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
        Fitur::create($request->all());

        return back()->with('ds','Fitur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fitur  $fitur
     * @return \Illuminate\Http\Response
     */
    public function show(Fitur $fitur)
    {
        return view('admin.fitur.show', compact('fitur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fitur  $fitur
     * @return \Illuminate\Http\Response
     */
    public function edit(Fitur $fitur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fitur  $fitur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Fitur::where('id',$request->id)->update([
            'nama_fitur' => $request->nama_fitur,
            'tabel' => $request->tabel,
            'deskripsi' => $request->deskripsi,
        ]);

        return back()->with('du','Fitur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fitur  $fitur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fitur $fitur)
    {
        $fitur->delete();

        return back()->with('dd','Fitur');
    }
}
