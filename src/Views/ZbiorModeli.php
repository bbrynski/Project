<?php

namespace Views;

class ZbiorModeli extends View
{
    public function getAll($data = null)
    {
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $model = $this->getModel('ZbiorModeli');
        $data = $model->getAll();

        $this->set('ZbiorModeli', $data['ZbiorModeli']);
        if(isset($data['error']))
            $this->set('error', $data['error']);

        $this->set('sciezka',\Config\Website\Config::$subdirimage);

        $this->render('Konfigurator/WyborModelu');
    }


    public function WyborWersji($data = null, $nazwaModelu)
    {
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);

        $model = $this->getModel('ZbiorModeli');
        $data = $model->WyborWersji($nazwaModelu);

        $this->set('WyborWersji', $data['WyborWersji']);

        if(isset($data['error']))
            $this->set('error', $data['error']);

        $this->set('sciezka',\Config\Website\Config::$subdirimage);

        $this->render('Konfigurator/WyborWersji');
    }

    public function addform()
    {

        $model = $this->getModel('ZbiorModeli');
        $wersje = $model->SelectWersje();

        if(isset($_FILES['Foto']['name'])) {
            $zmienna = $_FILES['Foto']['name'];
        }

        $this->set('wersje',$wersje);

        $this->render('Formularze/ModelAdd');
    }

}