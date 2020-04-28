<?php

use Phalcon\Mvc\Model;

class Pemesanan extends Model
{
    public $id;
    public $id_user;
    public $id_meja;
    public $tanggal_pemesanan;
    public $waktu_reservasi;
    public $waktu_selesai;
    public $biaya;
    public $lunas;
    public $bukti_pembayaran;

    public function initialize()
    {
        $this->belongsTo(
            'id_user',
            'Users',
            'id'
        );

        $this->belongsTo(
            'id_meja',
            'Meja',
            'id'
        );
    }
}