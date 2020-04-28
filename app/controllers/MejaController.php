<?php

class MejaController extends BaseController
{

    public function createAction()              // Meja awal
    {
        // return ke view
    }

    public function saveAction()                // Meja awal
    {
        // Ambil semua data yang ada di response
        $kapasitas          = $this->request->getPost('kapasitas');
        $harga              = $this->request->getPost('harga');

        echo $kapasitas, $harga;

        if($kapasitas == "" || $harga == "")
        {
            $this->flash->error("It's look like some field is not filled!");
            return $this->response->redirect('/meja/create');
        }

        $meja = new Meja();

        $meja->kapasitas    = $kapasitas;
        $meja->harga        = $harga;


        $meja->save();
        $this->response->redirect("/meja/read");
    }

    public function readAction()                // Melihat pesanan yang dipesan oleh user
    {
        if($this->session->get('user')->name == "admin")
        {
            $mejas = Meja::find();
            $this->view->user->name = "admin";
            $this->view->mejas = $mejas;
        }
        else
        {
            return $this->response->redirect('/');
        }

        // return ke view $pemesanannya
    }

    public function updateAction()              // Upload pembayaran saja
    {
        $meja = Meja::findFirst($id);

    }

    public function changeAction()              // Save dari upload pembayaran saja
    {
        $meja = Meja::findFirst($id);
        
        $this->view->meja = $meja;

        $meja->save();

    }

    public function deleteAction($id)
    {

        $meja = Meja::findFirst($id);
        $meja->delete();
        return $this->response->redirect('/meja/read');

    }

    

}