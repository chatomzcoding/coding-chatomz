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