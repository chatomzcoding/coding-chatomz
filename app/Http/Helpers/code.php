<?php 

function listakseslevel($level)
{
    $dlevel = explode('|',$level);
    $dlevel = array_map('trim',$dlevel);
    return $dlevel;
}
function liststatusaksi()
{
    $status = ['proses','selesai','ubah','sembunyikan'];
    return $status;
}
function listnamaaksi()
{
    $status = ['tambah','ubah','lihat','hapus','cetak','filter','statistik','lainnya'];
    return $status;
}

function statistikprogress($aksi)
{
    $result = [];
    $status = liststatusaksi();
    foreach ($status as $key) {
        if (isset($aksi[$key])) {
            $result[$key] = count($aksi[$key]);
        } else {
            $result[$key] = 0;
        }
    }
    $progress = 100;
    if (count($aksi) > 0) {
        if ($result['selesai'] == 0) {
            $progress = 0;
        } else {
            $progress = ($result['selesai']/count($aksi)) * 100;
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