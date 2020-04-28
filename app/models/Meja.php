<?php

use Phalcon\Mvc\Model;

class Meja extends Model
{
    public $id;
    public $kapasitas;
    public $harga;

    public function initialize()
    {
        $this->hasMany(
            'id',
            'pemesanan',
            'id_meja'
        );
    }
}