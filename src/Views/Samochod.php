<?php

namespace Views;


class Samochod extends View
{

    public function getAll($data = null){
        if(isset($data['message']))
            $this->set('message',$data['message']);
        if(isset($data['error']))
            $this->set('error',$data['error']);
        $model = $this->getModel('Samochod');
        $data = $model->getAll();
        $this->set('samochody', $data['samochody']);
        if(isset($data['error']))
            $this->set('error', $data['error']);
        $this->render('ModelGetAll');
    }



    public function addform(){

        $model_silnik = $this->getModel('Silnik');
        $silniki=$model_silnik->getAllForSelect();
        $model_skrzynia = $this->getModel('Skrzynia');
        $skrzynie=$model_skrzynia->getAllForSelect();
        $model_naped=$this->getModel('Naped');
        $napedy=$model_naped->getAllForSelect();
        $model_lakier=$this->getModel('Lakier');
        $lakiery=$model_lakier->getAllForSelect();
        if(isset($_FILES['Foto']['name'])) {
            $zmienna = $_FILES['Foto']['name'];
            d($zmienna);
        }
        $this->set('Silnik',$silniki);
        $this->set('Skrzynia',$skrzynie);
        $this->set('Naped',$napedy);
        $this->set('Lakier',$lakiery);
        $this->render('ModelAddForm');
    }

        //$this->render('ModelGetAll');



}