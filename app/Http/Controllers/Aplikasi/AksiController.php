<?php

namespace App\Http\Controllers\Aplikasi;

use App\Http\Controllers\Controller;
use App\Models\Aksi;
use App\Models\Fitur;
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
        $s = (isset($request->s)) ? $request->s : 'store' ;
        switch ($s) {
            case 'crud':
                $crud   = ['tambah','lihat','ubah','hapus'];
                for ($i=0; $i < count($crud) ; $i++) { 
                    Aksi::create([
                        'fitur_id' => $request->fitur_id,
                        'nama_aksi' => $crud[$i],
                        'status' => $request->status,
                        'akses' => json_encode($request->akses),
                        'label' => $request->label,
                        'detail' => $request->detail,
                    ]);
                }
                break;
            
            default:
                Aksi::create([
                    'fitur_id' => $request->fitur_id,
                    'nama_aksi' => $request->nama_aksi,
                    'status' => $request->status,
                    'akses' => json_encode($request->akses),
                    'label' => $request->label,
                    'detail' => $request->detail,
                ]);
                break;
        }

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
        $s = (isset($request->s)) ? $request->s : 'update' ;
        switch ($s) {
            case 'selesai':
                $aksi   = Fitur::find($request->fitur_id)->aksi;
                foreach ($aksi as $key) {
                    Aksi::where('id',$key->id)->update([
                        'status' => 'selesai'
                    ]);
                }
                break;
            
            default:
                Aksi::where('id',$request->id)->update([
                    'nama_aksi' => $request->nama_aksi,
                    'status' => $request->status,
                    'akses' => json_encode($request->akses),
                    'detail' => $request->detail,
                    'label' => $request->label,
                ]);
                break;
        }

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
