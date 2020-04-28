<?php

class PemesananController extends BaseController
{

    public function createAction()              // Pemesanan awal
    {
        if(!$this->session->has('user'))
        {
            $this->response->redirect('/signin');
        }
        // return ke view
    }

    public function saveAction()                // Pemesanan awal
    {
        if(!$this->session->has('user'))
        {
            $this->response->redirect('/signin');
        }

        // Ambil semua data yang ada di response
        $meja       = $this->request->getPost('meja');
        $harga      = $this->request->getPost('harga');
        $waktu    = $this->request->getPost('waktu');
        $durasi     = $this->request->getPost('durasi');
        $mulai      = $this->request->getPost('mulai');
        $tanggal    = new DateTime();
        $mytgl      = $tanggal->format('Y-m-d H:i:s');

        $datetime   = $mulai . ' '  . $waktu ;
        $final_date = date('Y-m-d H:i', strtotime($datetime. ' + '. $durasi .' hour '));

        // echo $harga;

        if($meja == "" || $harga == "" || $mulai == "")
        {
            $this->flash->error("It's look like some field is not filled!");
            return $this->response->redirect('/pemesanan/create');
        }

        $pemesanan = new Pemesanan();

        $pemesanan->id_meja                 = $meja;
        $pemesanan->id_user                 = $this->session->get('user')->id;
        $pemesanan->tanggal_pemesanan       = date('Y-m-d H:i', strtotime($mytgl));
        $pemesanan->waktu_reservasi         = date('Y-m-d H:i', strtotime($datetime));
        $pemesanan->waktu_selesai           = date('Y-m-d H:i', strtotime($final_date));
        $pemesanan->biaya                   = $harga;
        $pemesanan->lunas                   = 0;
        $pemesanan->bukti_pembayaran        = '/public/img/no_image.jpg';
        
        $pemesanan->create();
        return $this->response->redirect('/pemesanan/upload/' . $pemesanan->id);
    }

    public function readAction()                // Melihat pesanan yang dipesan oleh user
    {
        if($this->session->get('user')->name == "admin")
        {
            $pemesanans = Pemesanan::find('lunas = 1');
        }
        else
        {
            $pemesanans = Pemesanan::find("id_user = '". $this->session->get('user')->id ."'");
        }

        // return ke view $pemesanannya
        $this->view->pemesanans = $pemesanans;
    }

    public function updateAction()              // Upload pembayaran saja
    {
        $pemesanan = Pemesanan::findFirst($id);

        $this->view->pemesanan = $pemesanan;

    }

    public function changeAction()              // Save dari upload pembayaran saja
    {
        $id         = $this->request->getPost('id');
        $file       = $this->request->getUploadedFiles()[0];
        $path       = 'img/';

        if ($file == NULL)
        {
            return $this->response->redirect('/pemesanan/upload/' . $id);
        }
        else
        {
            $ext = pathinfo($file->getName(), PATHINFO_EXTENSION);
            if($ext == "jpg" || $ext == "jpeg")
            {
                $pemesanan = Pemesanan::findFirst($id);
                $pathfile = $path . $id . time() . $file->getName();
                $file->moveTo($pathfile);
                $savepathfile = '/public/' . $pathfile;
                echo $pathfile;
                echo $pemesanan->bukti_pembayaran;
                $pemesanan->bukti_pembayaran = $savepathfile;
                $pemesanan->lunas = 1;
                $pemesanan->save();
                return $this->response->redirect('/pemesanan/read/');
            }
            else
            {
                return $this->response->redirect('/pemesanan/upload/' . $id);
            }
        }
    }

    public function deleteAction($id)
    {

        $pemesanan = Pemesanan::findFirst($id);
        $pemesanan->delete();
        return $this->response->redirect('/pemesanan/read');

    }

    public function uploadAction($id)
    {
        $pemesanan = Pemesanan::findFirst($id);
        
        $this->view->pemesanan = $pemesanan;

    }

    public function verifikasiAction($id)
    {
        if($this->session->get('user')->name == 'admin')
        {
            $pemesanan = Pemesanan::findFirst($id);
            $pemesanan->lunas = 2;
            $pemesanan->save();
            return $this->response->redirect('/pemesanan/read');
        }
        else
        {
            return $this->response->redirect('/');
        }
    }

    public function listAction()
    {
        if(!$this->session->has('user'))
        {
            $this->response->redirect('/signin');
        }

        $date           = $this->request->getPost('date');
        $waktu          = $this->request->getPost('waktu');
        $durasi         = $this->request->getPost('durasi');

        if(!$date || !$waktu || !$durasi)
        {
            $this->response->redirect('/pemesanan/create');
        }

        $datetime   = $date . ' '  . $waktu ;
        $final_date = date('Y-m-d H:i', strtotime($datetime. ' + '. $durasi .' hour '));

        echo $datetime, $final_date;
        $sqlWhere = "'" . $datetime . "' BETWEEN waktu_reservasi AND waktu_selesai OR '" . $final_date . "' BETWEEN waktu_reservasi AND waktu_selesai";
        // // echo $datetime;
        // echo $sqlWhere;
        // // echo $date, $waktu, $durasi;

        $pemesanans = Pemesanan::query()->where($sqlWhere)->execute();

        // echo count($pemesanans);

        $reserved = array();
        $mejas = array();

        foreach ($pemesanans as $pemesanan)
        {
            array_push($reserved, $pemesanan->id_meja);
        }

        var_dump($reserved);

        $mejass = Meja::find();

        foreach($mejass as $meja)
        {
            if (!in_array($meja->id, $reserved))
            {
                array_push($mejas, $meja);
            }
        }

        $this->view->mejas          = $mejas         ;
        $this->view->selesai        = $final_date    ;
        $this->view->mulai          = $datetime      ;
        $this->view->durasi         = $durasi        ;
        $this->view->date           = $date          ;
        $this->view->waktu          = $waktu         ;

    }

}