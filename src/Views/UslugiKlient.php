<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-22
 * Time: 21:08
 */

namespace Views;


class UslugiKlient extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('UslugiKlient');
        $data = $model->getAll();
        $this->set('uslugiKlient', $data['uslugiKlient']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        
        $this->set('customScript', array('datatables.min','table'));

        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);

        $model = $this->getModel('Uslugi');
        $data = $model->getAll();
        $this->set('uslugi', $data['uslugi']);


        $model = $this->getModel('Klient');
        $data = $model->getAll();
        $this->set('klienci', $data['klienci']);
       
    


        
        
        $this->render('UslugiKlientGetAll');
    }



    public function getOne($id){
        $model = $this->getModel('UslugiKlient');
        $data = $model->getOne($id);
        $this->set('UslugiKlient', $data['UslugiKlient']);
        if(isset($data['error']))
            $this->set('error', $data['error']);

        $this->render('UslugiKlientEditForm');
    }


    public function addform(){

        $model_samochod = $this->getModel('SamochodSerwis');
        $samochody = $model_samochod->getAllForSelect();
        $this->set('Samochody',$samochody);

        $model_uslugi = $this->getModel('Uslugi');
        $uslugi = $model_uslugi->getAllForSelect();
        $this->set('Uslugi', $uslugi);




        $this->render('UslugiKlientAddForm');
    }

    public function editform($UslugiKlient){
        $this->set('id', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$id]);
        $this->set('Id_Uslugi', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$Id_Uslugi]);
        $this->set('Id_Klient', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$Id_KlientSamochod]);
        $this->set('Opis', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$Opis]);


        $model_klient = $this->getModel('Klient');
        $klienci = $model_klient->getAllForSelect();
        $this->set('Klient',$klienci);

        $model_samochod = $this->getModel('Samochod');
        $samochody = $model_samochod->getAllForSelect();
        $this->set('Samochody',$samochody);

        $model_uslugi = $this->getModel('Uslugi');
        $uslugi = $model_uslugi->getAllForSelect();
        $this->set('Uslugi', $uslugi);

        $this->set('customScript','UslugiKlient');
        $this->render('UslugiKlientEditForm');
    }

}