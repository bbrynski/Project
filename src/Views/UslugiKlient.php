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






    public function addform(){

        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);

        $model = $this->getModel('Uslugi');
        $data = $model->getAll();
        $this->set('uslugi', $data['uslugi']);


        $model = $this->getModel('Klient');
        $data = $model->getAll();
        $this->set('klienci', $data['klienci']);



        $this->render('UslugiKlientAddForm');
    }

    public function editform($UslugiKlient){
        $this->set('id', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$id]);
        $this->set('Id_Model', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$Id_Model]);
        $this->set('Id_Uslugi', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$Id_Uslugi]);
        $this->set('Id_Klient', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$Id_Klient]);
        $this->set('opis', $UslugiKlient[\Config\Database\DBConfig\UslugiKlient::$opis]);


        $this->set('Modele', $this->getModel('Samochod')->getAll()['samochody']);
        $this->set('uslugi', $this->getModel('Uslugi')->getAll()['uslugi']);
        $this->set('$klienci', $this->getModel('Klient')->getAll()['$klienci']);


        $this->set('customScript','UslugiKlient');
        $this->render('UslugiKlientEditForm');
    }

}