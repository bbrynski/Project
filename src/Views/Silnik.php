<?php

namespace Views;


class Silnik extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);


        /*
        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);

        $model = $this->getModel('Silnik');
        $data = $model->getAll();
        $this->set('silniki', $data['silniki']);

        $model = $this->getModel('Skrzynia');
        $data = $model->getAll();
        $this->set('skrzynie', $data['skrzynie']);

        $model = $this->getModel('Lakier');
        $data = $model->getAll();
        $this->set('lakiery', $data['lakiery']);

        $model = $this->getModel('Reflektor');
        $data = $model->getAll();
        $this->set('reflektory', $data['reflektory']);

        $model = $this->getModel('Kola');
        $data = $model->getAll();
        $this->set('kola', $data['kola']);

        $model = $this->getModel('Naped');
        $data = $model->getAll();
        $this->set('napedy', $data['napedy']);

        */

        $model = $this->getModel('Silnik');
        $data = $model->getAll(\Tools\Session::get('id_ZbiorModeli'));
        $this->set('SamochodParametry', $data['SamochodParametry']);


        $this->set('sciezka',\Config\Website\Config::$subdirimage);

        /*
        $model = $this->getModel('Samochod');
        $data = $model->getOne(1);
        $data=$data['samochody'];
        */

        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('SamochodParametry');
    }
}