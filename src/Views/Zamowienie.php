<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-22
 * Time: 21:08
 */

namespace Views;


class Zamowienie extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Zamowienie');
        $data = $model->getAll();
        $this->set('zamowienia', $data['zamowienia']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        
        $this->set('customScript', array('datatables.min','table'));
        
        $model = $this->getModel('Klient');
        $data = $model->getAll();
        $this->set('klienci', $data['klienci']);
       
    
        $model = $this->getModel('Pracownik');
        $data = $model->getAll();
        $this->set('pracownicy', $data['pracownicy']);
        
        $model = $this->getModel('Samochod');
        $data = $model->getAll(3);
        $this->set('samochody', $data['samochody']);
        
        
        $this->render('ZamowienieGetAll');
    }

    public function Status()
    {
        $this->render('ZamowienieStatus');
    }

    public function sprawdz($numer)
    {
        $model = $this->getModel('Zamowienie');
        $data = $model->getOne($numer);
        $this->set('Zamowienie', $data['Zamowienie']);

        $this->set('numer', $numer);


        $this->render('Status');
    }


    public function addform(){

        //\Tools\Access::clearAll();
        $model = $this->getModel('Klient');
        $data = $model->getAll();
        $this->set('klienci', $data['klienci']);

        $model = $this->getModel('Pracownik');
        $data = $model->getAll();
        $this->set('pracownicy', $data['pracownicy']);

        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);


        $v= \Tools\Access::get('idmodel');
        if(isset($v)){
            $this->set('model', $v);
        }


        d(\Tools\Access::get('idmodel'));
        d(\Tools\Access::get('user'));
        $this->render('ZamowienieAddForm');
    }

    public function editform($Zamowienie){
        $this->set('id', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$id]);
        $this->set('Id_Klient', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$Id_Klient]);
        $this->set('Id_Pracownik', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$Id_Pracownik]);
        $this->set('Id_Model', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$Id_Model]);
        $this->set('DataZamow', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$DataZamow]);
        $this->set('NumerZamowienia', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$NumerZamowienia]);
        $this->set('StatusZamowienia', $Zamowienie[\Config\Database\DBConfig\Zamowienie::$StatusZamowienia]);


        $this->set('$klienci', $this->getModel('Klient')->getAll()['$klienci']);
        $this->set('pracownicy', $this->getModel('Pracownik')->getAll()['pracownicy']);
        $this->set('Modele', $this->getModel('Samochod')->getAll()['samochody']);
        $this->set('customScript','Zamowienie');
        $this->render('ZamowienieEditForm');
    }

}