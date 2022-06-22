<?php

function uiStatus($value)
{
    switch ($value) {
        case 'proses':
            $warna = 'warning';
            break;
        case 'selesai':
            $warna = 'success';
            break;
        case 'ubah':
            $warna = 'info';
            break;
        case 'sembunyikan':
            $warna = 'secondary';
            break;
        
        default:
            return NULL;
            break;
    }
    $ui     = "<span class='badge bg-".$warna." w-100'>".$value."</span>";
    return $ui;
}

function uiAksi($value)
{
    switch ($value) {
        case 'tambah':
            $warna  = 'primary';
            $icon   = 'plus';
            break;
        case 'ubah':
            $warna = 'success';
            $icon = 'pencil';
            break;
        case 'lihat':
            $warna = 'info';
            $icon = 'eye';
            break;
        case 'detail':
            $warna = 'info';
            $icon = 'book';
            break;
        case 'hapus':
            $warna = 'danger';
            $icon = 'trash';
            break;
        case 'cetak':
            $warna = 'info';
            $icon = 'print';
            break;
        case 'filter':
            $warna = 'info';
            $icon = 'file';
            break;
        case 'statistik':
            $warna = 'primary';
            $icon = 'chart';
            break;
        
        default:
            $warna = 'secondary';
            $icon = 'file';
            break;
    }
    $ui     = "<span class='badge bg-".$warna." w-100'><i class='bi-".$icon."'></i>".$value."</span>";
    return $ui;
}