<?php

namespace Views;


class Wyposazenie extends View
{
    public function getAll($data = null){

        if (isset($data['message']))
            $this->set('message', $data['message']);
        if (isset($data['error']))
            $this->set('error', $data['error']);


        $id_ZbiorModelu = \Tools\Session::get('id_ZbiorModeli');

        $model = $this->getModel('ZbiorModeli');
        $data = $model->getAll2();
        $this->set('ZbiorModeli', $data['ZbiorModeli']);

        $model = $this->getModel('Silnik');
        $data = $model->getAll($id_ZbiorModelu);
        $this->set('silnik', $data['SamochodParametry']);

        $model = $this->getModel('Kola');
        $data = $model->getAll($id_ZbiorModelu);
        $this->set('felgi', $data['kola']);

        $model = $this->getModel('Reflektor');
        $data = $model->getAll($id_ZbiorModelu);
        $this->set('swiatla', $data['SamochodSwiatla']);

        $model = $this->getModel('Wyposazenie');
        $data = $model->getAll($id_ZbiorModelu);
        $this->set('wyposazenie', $data['SamochodWyposazenie']);

        $model = $this->getModel('Lakier');
        $data = $model->getAll($id_ZbiorModelu);
        $this->set('lakier', $data['SamochodLakier']);


        if(isset($data['error']))
            $this->set('error', $data['error']);

        $this->set('sciezka',\Config\Website\Config::$subdirimage);




        $model = $this->getModel('Wyposazenie');
        $data = $model->SelectWyposazenie();
        $this->set('selectwyposazenie',$data);




        $this->render('Konfigurator/SamochodWyposazenie');
    }

    public function addform(){
        $this->render('Formularze/TapicerkaAdd');
    }
}