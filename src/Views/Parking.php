<?php
/**
 * Created by PhpStorm.
 * User: Damian
 * Date: 2018-03-22
 * Time: 21:08
 */

namespace Views;


class Parking extends View
{
    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Parking');
        $data = $model->getAll();
        $this->set('parkingi', $data['parkingi']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        
        $this->set('customScript', array('datatables.min','table'));
        

        $model = $this->getModel('ZbiorModeli');
        $data = $model->getAll2();
        $this->set('samochody', $data['ZbiorModeli']);
        
        
        $this->render('ParkingGetAll');
    }





    public function addform(){


        $model = $this->getModel('ZbiorModeli');
        $samochody = $model->getAllForSelect();
        $this->set('Samochody',$samochody);


        $this->render('ParkingAddForm');
    }

    public function editform($Parking){
        $this->set('id', $Parking[\Config\Database\DBConfig\Parking::$id]);
        $this->set('Id_Samochod', $Parking[\Config\Database\DBConfig\Parking::$Id_Samochod]);
        $this->set('Sztuki', $Parking[\Config\Database\DBConfig\Parking::$DostepneSztuki]);


        $model_samochod = $this->getModel('ZbiorModeli');
        $samochody = $model_samochod->getAllForSelect();
        $this->set('Samochody',$samochody);

        $this->render('ParkingEditForm');
    }

}