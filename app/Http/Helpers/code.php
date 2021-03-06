<?php 

function listakseslevel($level)
{
    $dlevel = explode('|',$level);
    $dlevel = array_map('trim',$dlevel);
    return $dlevel;
}
function listtabel($tabel)
{
    $result = explode('|',$tabel);
    $result = array_map('trim',$result);
    return $result;
}
function liststatusaksi()
{
    $status = ['proses','selesai','ubah','sembunyikan'];
    return $status;
}
function listnamaaksi()
{
    $status = ['tambah','ubah','lihat','hapus','detail','cetak','import','filter','statistik','lainnya'];
    return $status;
}

function statistikprogress($aksi)
{
    $result = [];
    $status = liststatusaksi();
    $total  = 0;
    foreach ($status as $key) {
        if (isset($aksi[$key])) {
            $subtotal     = count($aksi[$key]);  
            $total        = $total + $subtotal;
            $result[$key] = $subtotal;
        } else {
            $result[$key] = 0;
        }
    }
    $progress = 100;
    if ($total > 0) {
        if ($result['selesai'] == 0) {
            $progress = 0;
        } else {
            $progress = ($result['selesai']/$total) * 100;
        }
    }
    $statistik = [
        'data' => $result,
        'progress' => round($progress,2)
    ];
    return $statistik;
}

// statistik 
function statistikAplikasi($data)
{
    $aksi = [];
    foreach ($data as $key) {
        foreach ($key->aksi as $k) {
            $aksi[$k->status][] = 1;
        }
    }
    $statistik = statistikprogress($aksi);
    return $statistik;
}
function statistikFitur($data)
{
    $aksi = [];
    foreach ($data as $k) {
        $aksi[$k->status][] = 1;
    }
    $statistik = statistikprogress($aksi);
    return $statistik;
}