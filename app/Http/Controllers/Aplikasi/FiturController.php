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
        $fitur = Fitur::latest()->first();
        return redirect('fitur/'.$fitur->id)->with('ds','Fitur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fitur  $fitur
     * @return \Illuminate\Http\Response
     */
    public function show(Fitur $fitur)
    {
        $statistik = statistikFitur($fitur->aksi);
        $label = (isset($_GET['label'])) ? $_GET['label'] : 'semua' ;
        if ($label == 'semua') {
            $aksi = $fitur->aksi;
        } else {
            $aksi = $fitur->aksi->where('label',$label);
        }
        
        return view('admin.fitur.show', compact('fitur','statistik','label','aksi'));
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
            'akses_fitur' => $request->akses_fitur,
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
